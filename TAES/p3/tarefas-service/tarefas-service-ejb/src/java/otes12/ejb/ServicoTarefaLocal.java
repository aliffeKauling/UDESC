package otes12.ejb;

import javax.ejb.Local;
import otes12.entidades.TarefaDTO;

/**
 *
 * @author
 */
@Local
public interface ServicoTarefaLocal {

    public TarefaDTO criaTarefa(String titulo);

    public boolean atualizaTarefa(Long id, String titulo, boolean completa);

    public boolean excluiTarefa(Long id);

}
