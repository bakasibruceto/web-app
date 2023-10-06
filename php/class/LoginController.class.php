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

        $this->getUser($this->username, $this->password);
        header("location: ../view/user/user.php");
        exit();
    }

    // Error Handlers
    private function emptyInput(){
        return !empty($this->username) && !empty($this->password);
    }
}
