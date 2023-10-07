<?php
class Login extends Database
{
    public function getUser($username, $password): void
    {
        $accountTypes = ["superadmin", "admin", "user"];
        $user = null;
        $accountType = null;

        foreach ($accountTypes as $role) {
            $query = "SELECT id, username, password FROM account WHERE (username = :username OR email = :email) AND role = :role LIMIT 1;";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":email", $username);
            $stmt->bindParam(":role", $role);

            try {
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    $accountType = $role;
                    break; // Exit the loop if a user is found
                }
            } catch (PDOException $e) {
                header("location: ../view/login.php?error=stmtfailed");
                exit();
            }
        }

        if (!$user) {
            header("location: ../view/login.php?error=usernotfound");
            exit();
        }

        if (!password_verify($password, $user["password"])) {
            header("location: ../view/login.php?error=wrongpassword");
            exit();
        }

        session_start();
        $_SESSION["id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        header("location: ../view/$accountType/$accountType.php");
    }
}
