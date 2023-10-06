<?php
class Login extends Database
{
    public function getUser($username, $password): void
    {
        $query = "SELECT id, username, password FROM user WHERE username = :username OR email = :email;";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $username);
        try {
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                header("location: ../view/login.php?error=usernotfound");
                exit();
            }
            // check password
            if (!password_verify($password, $user["password"])) {
                header("location: ../view/login.php?error=wrongpassword");
                exit();
            }

            session_start();
            $_SESSION["id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
        } catch (PDOException $e) {
            header("location: ../view/login.php?error=stmtfailed");
            exit();
        }
    }
}