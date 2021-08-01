package otes12.rest;

import java.util.logging.Level;
import java.util.logging.Logger;
import javax.naming.InitialContext;
import javax.naming.NamingException;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;
import otes12.ejb.ServicoTarefaLocal;
import otes12.entidades.TarefaDTO;

/**
 * REST Web Service
 *
 * @author
 */
@Path("tarefas")
public class TarefasResource {

    private ServicoTarefaLocal servicoTarefa = lookupServicoTarefaLocal();

    @Context
    private UriInfo context;

    public TarefasResource() {
    }

    @POST
    @Path("criar")
    @Consumes(MediaType.TEXT_PLAIN)
    @Produces(MediaType.APPLICATION_JSON)
    public Response criaTarefa(String titulo) {

        TarefaDTO tarefaDTO = servicoTarefa.criaTarefa(titulo);
        if (tarefaDTO != null) {
            return Response.status(Response.Status.CREATED).entity(tarefaDTO).build();
        } else {
            return Response.status(Response.Status.NOT_MODIFIED).entity("Ocorreu um erro inesperado. A tarefa não foi criada.").build();
        }
    }

    private ServicoTarefaLocal lookupServicoTarefaLocal() {
        try {
            javax.naming.Context c = new InitialContext();
            return (ServicoTarefaLocal) c.lookup("java:global/tarefas-service/tarefas-service-ejb/ServicoTarefa!otes12.ejb.ServicoTarefaLocal");
        } catch (NamingException ne) {
            Logger.getLogger(getClass().getName()).log(Level.SEVERE, "exception caught", ne);
            throw new RuntimeException(ne);
        }
    }
}
