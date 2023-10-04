<?php

class Signup extends Database
{

    public function setUser($username, $email, $password)
    {
        
        $query = "INSERT INTO user (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt) {
            return false;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $hashedPassword);


        if ($stmt->execute()) {            
            return true;
        } else {           
            return false;
        }
    }


    // public function checkuser($username, $email)
    // {
    //     $stmt = $this->connect()->prepare('SELECT username FROM user WHERE username = ? OR email = ?;');

    //     if (!$stmt->execute(array($username, $email))) {
    //         header("location: ../../index.php?error=stmtfailed");
    //         exit();
    //     }

    //     if ($stmt->rowCount() > 0) {
    //         return false;
    //     } else {
    //         return true;
    //     }
    // }
}
