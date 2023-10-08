<?php

class Signup extends Database
{

    public function setUser($username, $email, $password)
    {

        $query = "INSERT INTO account (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt) {
            return false;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $hashedPassword);


        return $stmt->execute();
    }

    protected function checkUser($username, $email)
    {
        // Check if user exists
        $query = "SELECT username FROM account WHERE username = :username OR email = :email;";
        $stmt = $this->connect()->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);

        if (!$stmt->execute()) {
            header("location: ../../view/Signup.php=stmtfailed");
            exit();
        }

        return $stmt->rowCount() === 0;
    }




}