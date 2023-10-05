<?php

class SignupController extends Signup
{
    private $username;
    private $email;
    private $password;
    private $repassword;

    public function __construct($username, $email, $password, $repassword)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->repassword = $repassword;
    }

    public function signupUser() {
        if(!$this->emptyInput()){
            header("location: ../view/Signup.php?error=emptyinput");
            exit();
        }
        if(!$this->invalidUsername()){
            header("location: ../view/Signup.php?error=username");
            exit();
        }
        if(!$this->invalidEmail()){
            header("location: ../view/Signup.php?error=email");
            exit();
        }
        if(!$this->passwordMatch()){
            header("location: ../view/Signup.php?error=password");
            exit();
        }
        if(!$this->checkUserExist()){
            header("location: ../view/Signup.php?error=userExist");
            exit();
        }

        $this->setUser($this->username, $this->email, $this->password);

    }

    //Add Error Handlers
    private function emptyInput(){
        return !empty($this->username) && !empty($this->email) && !empty($this->password) && !empty($this->repassword);
    }
    
    private function invalidUsername(){
        return preg_match("/^[a-zA-Z0-9]*$/", $this->username);
    }
    
    private function invalidEmail(){
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    private function passwordMatch(){
        return $this->password === $this->repassword;
    }

    private function checkUserExist(){
        return $this->checkuser($this->username, $this->password);
    }   
}
