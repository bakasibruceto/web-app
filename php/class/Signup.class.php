<?php

class Signup extends Database
{

    public function setUser($username, $email, $password)
    {
        $pdo = $this->connect();
        $query = "INSERT INTO account (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $pdo->prepare($query);

        if (!$stmt) {
            return false;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Bind values to 'account'
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $hashedPassword);
        
        // Query for the 'account' table
        if (!$stmt->execute()) {
            return false;
        }

        // Get the last inserted ID 
        $lastInsertId = $pdo->lastInsertId();

        // Insert user into the 'user' table 
        $query = "INSERT INTO user (account_id) VALUES (:account_id)";
        $stmt = $pdo->prepare($query);

        // Bind 'account_id' to stmt
        $stmt->bindParam(":account_id", $lastInsertId);

        // Query for the 'user' table
        if (!$stmt->execute()) {
            return false;
        }

        // Insert user into the 'otp' table 
        $query = "INSERT INTO otp (account_id) VALUES (:account_id)";
        $stmt = $pdo->prepare($query);

        // Bind the 'account_id' to the stmt
        $stmt->bindParam(":account_id", $lastInsertId);

        // Query for the 'otp' table
        if (!$stmt->execute()) {
            return false;
        }

        return true;
    }


    protected function checkUser($username, $email)
    {
        // Check if user exists
        $query = "SELECT username FROM account WHERE username = :username OR email = :email;";
        $stmt = $this->connect()->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);

        if (!$stmt->execute()) {
            header("location: ../../view/Signup.php?=stmtfailed");
            exit();
        }

        return $stmt->rowCount() === 0;
    }
}