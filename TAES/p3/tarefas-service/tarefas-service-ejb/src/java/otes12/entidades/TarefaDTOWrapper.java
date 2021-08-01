package otes12.entidades;

import java.io.Serializable;
import java.util.List;
import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlElement;
import javax.xml.bind.annotation.XmlRootElement;

/**
 *
 * @author
 */
@XmlRootElement(name = "tarefas")
@XmlAccessorType(XmlAccessType.FIELD)
public class TarefaDTOWrapper implements Serializable {

    private static final long serialVersionUID = 1L;

    @XmlElement(name = "tarefas")
    private List<TarefaDTO> tarefas;

    public TarefaDTOWrapper() {

    }

    public List<TarefaDTO> getTarefas() {
        return tarefas;
    }

    public void setTarefas(List<TarefaDTO> tarefas) {
        this.tarefas = tarefas;
    }
}
