package com.unioncorpdemo.exemplo;

import java.io.Serializable;

class LinkGeneratorResponse implements Serializable {

    private String resetLink;
    private String email;
    private String username;

    LinkGeneratorResponse() {

    }

    public String getResetLink() {
        return resetLink;
    }

    public void setResetLink(String resetLink) {
        this.resetLink = resetLink;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

}
