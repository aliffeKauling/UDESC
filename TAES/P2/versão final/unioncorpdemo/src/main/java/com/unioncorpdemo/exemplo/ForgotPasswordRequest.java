package com.unioncorpdemo.exemplo;

import java.io.Serializable;

public class ForgotPasswordRequest implements Serializable {

    private String email;

    public ForgotPasswordRequest() {

    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }
}
