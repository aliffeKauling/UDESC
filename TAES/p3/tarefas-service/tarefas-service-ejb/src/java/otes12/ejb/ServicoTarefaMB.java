package otes12.ejb;

import java.util.logging.Level;
import java.util.logging.Logger;
import javax.ejb.ActivationConfigProperty;
import javax.ejb.MessageDriven;
import javax.jms.JMSException;
import javax.jms.Message;
import javax.jms.MessageListener;
import javax.jms.ObjectMessage;
import otes12.entidades.TarefaDTO;

/**
 *
 * @author
 */
@MessageDriven(mappedName = "ServicoTarefaMB", activationConfig = {
    @ActivationConfigProperty(propertyName = "destinationLookup", propertyValue = "java:/jboss/jms/topic/ServicoTarefaMBDest"),
    @ActivationConfigProperty(propertyName = "subscriptionDurability", propertyValue = "durable"),
    @ActivationConfigProperty(propertyName = "destinationType", propertyValue = "javax.jms.Topic"),
    @ActivationConfigProperty(propertyName = "connectionFactoryLookup", propertyValue = "java:/ConnectionFactory")
})
public class ServicoTarefaMB implements MessageListener {

    public ServicoTarefaMB() {
    }

    @Override
    public void onMessage(Message message) {
        try {
            Object object = ((ObjectMessage) message).getObject();
            TarefaDTO tarefaDTO = (TarefaDTO) object;
            //Ideal seria rodar cada componente (microserviço) em servidores diferentes, mas para testes aqui emitimos uma mensagem do componente principal. 
            //O recurso de broker JMS permite esse tipo de separação em microserviços facilmente e de forma bastante organizada.
            System.out.println("---------------------------------------------------->\n");
            System.out.println("UMA TAREFA FOI CRIADA NO MICROSERVICO PRINCIPAL");
            System.out.println("ID: " + tarefaDTO.getId());
            System.out.println("TITULO: " + tarefaDTO.getTitulo());
            System.out.println("COMPLETADA: " + "Nao");
            System.out.println("<-----------------------------------------------------\n\n");
        } catch (JMSException ex) {
            Logger.getLogger(ServicoTarefaMB.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

}
