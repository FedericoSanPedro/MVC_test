<?php

use models\Account as account;

namespace Controllers;

class AccountController{
    private $email;
    private $connection;
    private static $instance = null;

    function __construct(){
        $this->email = new email();
    }

    public static function GetInstance(){
        if(self::$instance == null){
            self::$instance = new AccountController();
        }
        return self::$instance;
    }

    public function verify($email, $password){
        $sql = "SELECT * from accounts where email=:email;";

        $parameters['email'] = $email;

        $this->connection = Connection::GetInstance();

        $data = false;

        $result = $this->connection->Execute($sql,$parameter);

        if($result){
            $data = true;
        }
        
        if($data == true){
            $accountAux = new Account();
        }


    }

}

?>