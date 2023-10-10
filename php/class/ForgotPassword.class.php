<?php 
class ForgotPassword extends Database{
    private $email;

    public function __construct($email) {
        $this->email = $email;
    }

    public function setOTP($email)
    {
        $pdo = $this->connect();

        // First, retrieve the user's account ID based on their email
        $query = "SELECT id FROM account WHERE email = :email;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email", $email);

        if (!$stmt->execute()) {
            // Handle the execution error here (e.g., throw an exception or log an error)
            return false;
        }

        // Fetch the account ID
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            // The user with the provided email does not exist
            return false;
        }

        $account_id = $result['id'];

        // Start a session and store the account ID
        // session_start();
        // $_SESSION["id"] = $account_id;

        // Generate a random OTP
        // $otp = "";
        // $generator = "123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        // for ($i = 0; $i < 6; $i++) {
        //     $otp .= substr($generator, rand() % strlen($generator), 1);
        // }

        $token = bin2hex(random_bytes(32));

        // Insert the OTP into the "otp" table associated with the account
        $insertQuery = "INSERT INTO otp (otp_code, account_id) VALUES (:otp, :account_id);";
        $insertStmt = $pdo->prepare($insertQuery);
        $insertStmt->bindParam(":otp", $token);
        $insertStmt->bindParam(":account_id", $account_id);

        if (!$insertStmt->execute()) {
            // Handle the execution error here (e.g., throw an exception or log an error)
            return false;
        }

        return true;
    }

    public function checkEmail($email)
    {
        $pdo = $this->connect();

        // Corrected query: SELECT account where email = :email; to SELECT * FROM account WHERE email = :email;
        $query = "SELECT * FROM account WHERE email = :email;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email", $email);

        if (!$stmt->execute()) {
            // Handle the execution error here (e.g., throw an exception or log an error)
            return false;
        }

        return $stmt->rowCount() === 0;
    }
}

    
