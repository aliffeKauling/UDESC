package com.unioncorpdemo.exemplo;

public class ResentLinkGenerator {

    //Aqui não é realizada nenhuma geração de link. Uso de dados fixos para teste.
    public static LinkGeneratorResponse generateResetLinkFor(String email) {

        LinkGeneratorResponse link = new LinkGeneratorResponse();
        link.setResetLink("https://api.designdeck.com/account/reset-password?token=d509c6f0-e8b2-4297-9a2f-54f842bc8412");
        link.setEmail(email);
        link.setUsername("boby975");
        return link;

    }
}
