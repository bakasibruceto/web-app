<?php

class Login extends DBHandle{
    public function Login ($user, $pass, $sqlGetAccountType){
        if(empty ($_POST["username"])||empty ($_POST["username"])){
            $e = "error";
        }
        else{
            for($i = 0; $i < 3; $i++){
                $sql = "SELECT * FROM $sqlGetAccountType [$i] WHERE username = :username AND password = :password";
                
            }
            
        }

       
            
        
    }
}