package otes12.ejb;

import java.io.Serializable;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.annotation.Resource;
import javax.ejb.Stateless;
import javax.inject.Inject;
import javax.jms.JMSConnectionFactory;
import javax.jms.JMSContext;
import javax.jms.JMSException;
import javax.jms.ObjectMessage;
import javax.jms.Topic;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;
import otes12.entidades.Tarefa;
import otes12.entidades.TarefaDTO;

/**
 *
 * @author
 */
@Stateless
public class ServicoTarefa implements ServicoTarefaLocal {

    @PersistenceContext(unitName = "otes12")
    private EntityManager em;
    @Inject
    @JMSConnectionFactory("java:/ConnectionFactory")
    private JMSContext jmsContext;
    @Resource(lookup = "java:/jboss/jms/topic/ServicoTarefaMBDest")
    private Topic topico;

    @Override
    public TarefaDTO criaTarefa(String titulo) {

        TarefaDTO tarefaDTO = null;
        Tarefa tarefa = new Tarefa();
        tarefa.setTitulo(titulo);
        tarefa.setCompleta(false);
        em.persist(tarefa);

        if (tarefa.getId() != null) {
            tarefaDTO = new TarefaDTO();
            tarefaDTO.setTitulo(titulo);
            tarefaDTO.setCompleta(false);
            tarefaDTO.setId(tarefa.getId());
            ObjectMessage objectMessage = jmsContext.createObjectMessage();
            try {
                objectMessage.setObject((Serializable) tarefaDTO);
                jmsContext.createProducer().send(topico, objectMessage);
            } catch (JMSException ex) {
                Logger.getLogger(ServicoTarefa.class.getName()).log(Level.SEVERE, null, ex);
            }
        }

        return tarefaDTO;

    }

    @Override
    public boolean atualizaTarefa(Long id, String titulo, boolean completa) {

        boolean retorno = false;

        Tarefa tarefa = em.find(Tarefa.class, id);
        if (tarefa != null) {
            tarefa.setTitulo(titulo);
            tarefa.setCompleta(completa);
            retorno = true;
        }

        return retorno;
    }

    @Override
    public boolean excluiTarefa(Long id) {

        boolean retorno = false;

        Tarefa tarefa = em.find(Tarefa.class, id);
        if (tarefa != null) {
            em.remove(tarefa);
            retorno = true;
        }

        return retorno;
    }

}
