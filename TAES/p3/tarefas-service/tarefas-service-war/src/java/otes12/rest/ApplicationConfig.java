package otes12.rest;

import java.util.Set;
import javax.ws.rs.core.Application;

/**
 *
 * @author
 */
@javax.ws.rs.ApplicationPath("otes12")
public class ApplicationConfig extends Application {

    @Override
    public Set<Class<?>> getClasses() {
        Set<Class<?>> resources = new java.util.HashSet<>();
        addRestResourceClasses(resources);
        return resources;
    }

    private void addRestResourceClasses(Set<Class<?>> resources) {
        resources.add(otes12.rest.TarefasResource.class);
    }

}
