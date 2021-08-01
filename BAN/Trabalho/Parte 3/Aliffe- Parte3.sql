/*
1 - Gatilho para impedir a inserção ou atualização de hospedes com o mesmo CPF.*/

CREATE TRIGGER mesmo_cpf BEFORE
insert ON hospede FOR EACH ROW EXECUTE PROCEDURE verifica_cpf();
CREATE FUNCTION verifica_cpf() RETURNS trigger as $$
DECLARE linhas_afetadas interenger DEFAUT 0;
BEGIN EXECUTE
select *
from hospede
where CPF = new.CPF;
GET DIAGNOSTICS linhas_afetadas = ROW_COUNT;
IF linhas_afetadas > 0 THEN RAISE EXCEPTION "Este CPF já está cadastrado para outro hospede";
END IF;
END;
$$ LANGUAGE plpgsql;

/*
2 - Trigger para atualizar automaticamente a chave estrangeira de código do funcionário que fez a reserva*/

CREATE OR REPLACE FUNCTION atualiza_id_funcionario() RETURNS trigger AS $$ begin IF NEW.codigo_f <> OLD.codigo_f THEN
UPDATE reserva
SET codigo_fun = new.codigo_f
where codigo_fun = old.codigo_f;
END IF;
return null;
end $$ LANGUAGE plpgsql CREATE TRIGGER atualiza_id_funcionario
AFTER
UPDATE ON recepcionista FOR EACH ROW EXECUTE PROCEDURE atualiza_id_funcionario();

/*
3 - Quando consome item, atualiza quantidade em Item em estoque no frigobar*/

create or replace function Consumo_quat_itens() returns trigger as BEGIN $$
UPDATE frigobar
SET quantidade_item = quantidade_item - NEW.quantidade_consumida
WHERE id_item = NEW.item;
END $$ Language plpgsql;
create trigger Consumo_quat_itens before
insert
    or
update on consumo for each row execute procedure Consumo_quat_itens();

/*
4 - Não permitir reserva para o mesmo dia.*/

create or replace function verificaReserva () returns trigger as $$ Begin if data_ini = new data_ini
    and id_hospedagem = new.id_hospedagem then raise exception 'Já existe reserva para esse dia e esse quarto';
end if;
return new;
end;
$$ Language plpgsql;
create trigger verificaReseva before
insert
    or
update on reserva_dia for each row execute procedure verificaReserva();

/*
5 - Garantir que não seja possível diminuir a quantidade de itens no frigobar.*/

CREATE OR REPLACE TRIGGER veri_quant BEFORE
UPDATE OF quantidade_item ON frigobar FOR EACH ROW
    WHEN (NEW.quantidade_item < OLD.quantidade_item) BEGIN RAISE_APPLICATION_ERROR (
        -20508,
        "Não é possível atualizar a quantidade do item para uma quantidade menor que a existente"
    );
END;
Language plpgsql;