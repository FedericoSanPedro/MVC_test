<?php

namespace Controllers;

use models\Account as account;
use models\Person as person;

class AccountController{
    private $connection;
    private static $instance = null;

    function __construct(){
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
        
        $accountAux = new Account();

        if($data == true){
            $accountAux->setId($result[0]['accountId']);
            $accountAux->setEmail($result[0]['email']);
            $accountAux->setPassword($result[0]['password']);
        }

        if($accountAux->getPassword() == $password){
            $_SESSION["account"] = $accountAux;

            header("Location: viewAccount");
        }


    }


    public function register($message=''){
        require_once "views/add-person-email.php";
    }

    // terminar
    public function registerPerson($email){
        
        $sql = "SELECT * from accounts where email=:email;";

        $parameters['email'] = $email;

        $this->connection = Connection::GetInstance();

        $data = false;

        $result = $this->connection->Execute($sql,$parameter);

        $rta = true;
        $list = array();

        $api_url = 'https://jsonplaceholder.typicode.com/users';
        $response = file_get_contents($api_url);
        $api_array = json_decode($response, true);

        foreach($api_array as $value){
            $person = new Person();

            $person->setId($value["id"]);
            $person->setEmail($value["email"]);
            $person->setName($value["name"]);
            $person->setUsername($value["username"]);
            $person->setPhone($value["phone"]);
            $person->setWebsite($value["website"]);

            array_push($list, $person);
        }

        foreach($list as $per){
            if($email == $per->getEmail()){
                $rta = false;
            }
        }

        if($result){
            $data = true;
        }
        if($data == true){
            $this->register($message='El mail ya esta registrado en Base de Datos');
        }
        else if($rta = true){
            $this->register($message='El mail no esta registrado en la API');
        }
        else{
            $_SESSION["email"] = $email;
            header("Location: signup");
        }
    }

    public function create($password, $email){
        $account = new Account($email, $password);

        $sql = "INSERT into accounts(email, password) values (:email, :password)";

        $parameters[`email`] = $account->getEmail();
        $parameters[`password`] = $account->getPassword();

        $this->connection->ExecuteNonQuery($sql, $parameters);

        $_SESSION["account"] = $account;

        header("Location: viewAccount");

    }

    public function logOff(){
        unset($_SESSION[`account`]);

        session_destroy();

        header("Location: " . FRONT_ROOT . "index.php");

    }

    public function viewAccount(){
        $aux = null;
        $list = array();

        $api_url = 'https://jsonplaceholder.typicode.com/users';
        $response = file_get_contents($api_url);
        $api_array = json_decode($response, true);

        foreach($api_array as $value){
            $person = new Person();

            $person->setId($value["id"]);
            $person->setEmail($value["email"]);
            $person->setName($value["name"]);
            $person->setUsername($value["username"]);
            $person->setPhone($value["phone"]);
            $person->setWebsite($value["website"]);

            array_push($list, $person);
        }

        foreach($list as $per){
            if($_SESSION[`account`]->getEmail() == $per->getEmail()){
                $aux = $per;
            }
        }

        if(isset($_SESSION[`account`])){
            include ROOT . VIEWS_PATH . "view-account.php";
        }else{
            header("Location: login");
        }
        
    }

    public function logIn($message=''){
        require_once("views/login.php");
    }

}

?>