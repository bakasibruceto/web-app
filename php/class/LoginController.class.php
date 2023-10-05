<?

class LoginController extends Login
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->$password = $password;
    }

    public function userLogin (){
        //Check for Errors

        
        $this->setLogin($this->username, $this->password);
    }

    // Error Handlers
}
