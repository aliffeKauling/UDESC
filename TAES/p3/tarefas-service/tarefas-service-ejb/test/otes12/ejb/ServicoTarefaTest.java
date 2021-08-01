package otes12.ejb;

import javax.ejb.embeddable.EJBContainer;
import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.AfterAll;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.BeforeAll;
import org.junit.jupiter.api.Test;
import static org.junit.jupiter.api.Assertions.*;
import otes12.entidades.TarefaDTO;

/**
 *
 * @author
 */
public class ServicoTarefaTest {

    public ServicoTarefaTest() {
    }

    @BeforeAll
    public static void setUpClass() {
    }

    @AfterAll
    public static void tearDownClass() {
    }

    @BeforeEach
    public void setUp() {
    }

    @AfterEach
    public void tearDown() {
    }

    @Test
    public void testCriaTarefa() throws Exception {
        System.out.println("criaTarefa");
        String titulo = "";
        EJBContainer container = javax.ejb.embeddable.EJBContainer.createEJBContainer();
        ServicoTarefaLocal instance = (ServicoTarefaLocal) container.getContext().lookup("java:global/classes/ServicoTarefa");
        TarefaDTO expResult = null;
        TarefaDTO result = instance.criaTarefa(titulo);
        assertEquals(expResult, result);
        container.close();
        fail("O caso de teste é um protótipo. ");
    }

    @Test
    public void testAtualizaTarefa() throws Exception {
        System.out.println("atualizaTarefa");
        Long id = null;
        String titulo = "";
        boolean completa = false;
        EJBContainer container = javax.ejb.embeddable.EJBContainer.createEJBContainer();
        ServicoTarefaLocal instance = (ServicoTarefaLocal) container.getContext().lookup("java:global/classes/ServicoTarefa");
        boolean expResult = false;
        boolean result = instance.atualizaTarefa(id, titulo, completa);
        assertEquals(expResult, result);
        container.close();
        fail("O caso de teste é um protótipo. ");
    }

    @Test
    public void testExcluiTarefa() throws Exception {
        System.out.println("excluiTarefa");
        Long id = null;
        EJBContainer container = javax.ejb.embeddable.EJBContainer.createEJBContainer();
        ServicoTarefaLocal instance = (ServicoTarefaLocal) container.getContext().lookup("java:global/classes/ServicoTarefa");
        boolean expResult = false;
        boolean result = instance.excluiTarefa(id);
        assertEquals(expResult, result);
        container.close();
        fail("O caso de teste é um protótipo. ");
    }

}
