package com.unioncorpdemo.exemplo;

import java.util.HashMap;
import java.util.Map;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RestController;

@SpringBootApplication
@RestController
public class UnioncorpdemoApplication {

    public static void main(String[] args) {
        SpringApplication.run(UnioncorpdemoApplication.class, args);
    }

    @GetMapping("/esquemajson")
    public ForgotPasswordRequest getSchemaJson() {

        ForgotPasswordRequest forgotPasswordRequest = new ForgotPasswordRequest();
        forgotPasswordRequest.setEmail("bob@livemail.com");
        return forgotPasswordRequest;
    }

    @PostMapping("/api/forgot-password-exposicao-dados")
    public ResponseEntity<Object> handlePasswordResetLinkExposicaoDados(@RequestBody ForgotPasswordRequest forgotPasswordRequest) {

        String email = forgotPasswordRequest.getEmail();
        boolean isValidEmail = EmailValidator.validateEmail(email);

        if (isValidEmail) {
            LinkGeneratorResponse response = ResentLinkGenerator.generateResetLinkFor(email);
            Emailnotification.sendResetLinkTo(email, response.getResetLink());
            return new ResponseEntity<>(response, HttpStatus.OK);
        } else {
            return new ResponseEntity<>(null, HttpStatus.OK);
        }

    }

    @PostMapping("/api/forgot-password")
    public ResponseEntity<Object> handlePasswordResetLink(@RequestBody ForgotPasswordRequest forgotPasswordRequest) {

        String email = forgotPasswordRequest.getEmail();
        boolean isValidEmail = EmailValidator.validateEmail(email);

        if (isValidEmail) {
            LinkGeneratorResponse response = ResentLinkGenerator.generateResetLinkFor(email);
            Emailnotification.sendResetLinkTo(email, response.getResetLink());
        }
        Map<String, Object> responseAttributes = new HashMap<>();
        responseAttributes.put("message", "Please check your email  inbox to continue the reset password process");
        return new ResponseEntity<>(responseAttributes, HttpStatus.OK);
    }

}
