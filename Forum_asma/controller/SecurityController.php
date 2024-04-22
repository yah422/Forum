<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;

class SecurityController extends AbstractController implements ControllerInterface{
    // contiendra les méthodes liées à l'authentification : register, login et logout
        public function index(){
          
        }
    public function register () {

            
        if(isset($_POST["submitRegistration"])){

            //on filtre les champs de saisie
            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $confirmPassword = filter_input(INPUT_POST, "confirmPassword", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            
        }
    }
    
    public function login () {}
    public function logout () {}
}