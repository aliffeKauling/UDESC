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
public class ServicoTarefaConsume implements MessageListener {

    public ServicoTarefaConsume() {
    }

    @Override
    public void onMessage(Message message) {
        try {
            Object object = ((ObjectMessage) message).getObject();
            TarefaDTO tarefaDTO = (TarefaDTO) object;

            Thread.sleep(10000); // Aguarda 10 segundos, pois como estamos rodando na mesma instancia de servidor, as mensagens de log no console podem se sobrepor.

            //Ideal seria rodar cada componente (microserviço) em servidores diferentes, mas para testes aqui emitimos uma mensagem do componente que acessa o microservico principal. 
            //A partir daqui onde recebemos o objeto desacoplado, podemos fazer qualquer coisa...delegar esse objeto para um outro serviço, persistencia de dados etc...
            System.out.println("<-----------------------------------------------------\n");
            System.out.println("UMA TAREFA FOI RECEBIDA NO MICROSERVICO LOCAL");
            System.out.println("ID: " + tarefaDTO.getId());
            System.out.println("TITULO: " + tarefaDTO.getTitulo());
            System.out.println("COMPLETADA: " + "Nao");
            System.out.println("------------------------------------------------------>\n\n");
        } catch (JMSException | InterruptedException ex) {
            Logger.getLogger(ServicoTarefaConsume.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
