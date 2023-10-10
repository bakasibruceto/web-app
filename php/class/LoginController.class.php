<?php
class LoginController extends Login
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function loginUser() {
        if(!$this->emptyInput()){
            header("location: ../view/login.php?error=emptyinput");
            exit();
        }
        // from login class
        $this->getUser($this->username, $this->password);
      
        exit();
    }

    // Error Handlers
    private function emptyInput(){
        return !empty($this->username) && !empty($this->password);
    }

}
