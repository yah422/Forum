<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;

class SecurityController extends AbstractController implements ControllerInterface{
    // contiendra les méthodes liées à l'authentification : register, login et logout
    public function index(){
        
    }

    public function registration(){
            
        if(isset($_POST["submitRegistration"])){

            //on filtre les champs de saisie
            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $confirmPassword = filter_input(INPUT_POST, "confirmPassword", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($username && $email && $password){

                $userManager = new UserManager();

                //on vérifie que l'utilisateur n'existe pas (mail)
                if(!$userManager->findOneByEmail($email)){

                    //on vérifie que le pseudo n'existe pas
                     if(!$userManager->findOneByUser($username)){

                        //on vérifie que les 2 passwords correspondent
                        if($password == $confirmPassword){

                            //on hash le password (password_hash)
                            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                            // var_dump($passwordHash);
                            //on ajoute l'user en bdd (pas besoin d'id car autoincrement)
                            $userManager->add(["username" => $username, "email" =>$email, "password" => $passwordHash]);

                            $msg = "Compte crée !";
                            Session::addFlash('succés', $msg);

                            //on redirige vers le formulaire de login dans la foulée
                            $this->redirectTo('security', 'login');
                        } else {                                
                            
                            $msg = "Mot de passe invalide !";
                            Session::addFlash('erreur', $msg);

                            $this->redirectTo('security', 'registration');
                        }
                    }
                }
            }
        }
        return [
            "metaDescription" => "Inscription",
            "view" => VIEW_DIR."security/registration.php", //Interaction avec la vue
        ];
    }
    
    public function login () {}
    public function logout () {}
} 