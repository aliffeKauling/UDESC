package aliffe.service;

import aliffe.Venda;

/**
 *
 * @author
 */
public interface EstrategiaVenda {

    //Aqui a estrat�gia pode ser cria��o de uma nova venda, atualiza��o ou remo��o...depende do contexto. 
    public void executa(Venda venda);

}
