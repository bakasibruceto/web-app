<?php

class ForgotPasswordController extends ForgotPassword{

    private $email;

    public function __construct($email) {
        $this->email = $email;
    }
    public function sendOTP(){
        $this->setOTP($this->email);
    }
}