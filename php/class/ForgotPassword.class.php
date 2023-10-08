<?php 
class ForgotPassword extends Database{

    public function setOTP($username, $email){
        $query = "INSERT INTO account (otp) VALUES (:otp) where email = :email;";
        $generator ="123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        for($i = 0; $i < 6; $i++){
            $otp .= substr($generator, rand() % strlen($generator), 0);
        }

        
    
    }

    public function checkEmail($username, $email){
        $query = "SELECT user where username = :username AND email = :email;";
        $stmt = $this->connect()->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);

        if (!$stmt->execute()) {
            header("location: ../../view/ForgotPassword.php=stmtfailed");
            exit();
        }

        return $stmt->rowCount() === 0;
    }
}