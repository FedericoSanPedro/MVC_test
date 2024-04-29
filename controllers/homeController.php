<?php 

namespace Controllers;

use controllers\AccountController as AccountController;

class HomeController {

    public function Index(){

        if (isset($_SESSION['account'])){

            $accountController = new AccountController();

            $accountController->viewAccount();

        }
        else{
            require_once(VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."login.php");
        }
    }
}
?>