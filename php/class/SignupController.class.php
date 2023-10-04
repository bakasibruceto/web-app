<?php

class SignupController extends Signup
{
    private $username;
    private $email;
    private $password;
    // private $repassword;

    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        // $this->repassword = $repassword;
    }

    public function signupUser() {

        $this->setUser($this->username, $this->email, $this->password);

    }

    //Add Error Handlers
    
}
