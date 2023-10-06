<?php
class Login extends Database
{

    public function getUser($username, $password)
    {

        $query = "SELECT password FROM user WHERE username = :username OR email = :email;";
        $stmt = $this->connect()->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $username);
        $stmt->bindParam(":password", $hashedPassword);

        if (!$stmt->execute()) {
            header("location: ../view/login.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            header("location: ../view/login.php?error=usernotfound");
            exit();
        }

        $hashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $hashed[0]["password"]);

        if ($checkPassword == false) {
            header("location: ../view/login.php?error=wrongpassword");
            exit();

        } elseif ($checkPassword == true) {
            $query = "SELECT password FROM user WHERE username = :username OR email = :email;";
            $stmt = $this->connect()->prepare($query);

            if (!$stmt->execute()) {
                header("location: ../view/login.php?error=stmtfailed");
                exit();
            }
            if ($stmt->rowCount() == 0) {
                header("location: ../view/login.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["id"] = $user[0]["id"];
            $_SESSION["username"] = $user[0]["username"];
        }
    }



}