<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\UserManager;

    class SecurityController extends AbstractController implements ControllerInterface{

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

                                $msg = "Session created !";
                                Session::addFlash('success', $msg);

                                //on redirige vers le formulaire de login dans la foulée
                                $this->redirectTo('security', 'login');
                            } else {                                
                                
                                $msg = "Invalid password !";
                                Session::addFlash('error', $msg);

                                $this->redirectTo('security', 'registration');
                            }
                        }
                    }
                }
            }
            return [
                "metaDescription" => "Registration",
                    "view" => VIEW_DIR."security/registration.php", //Interaction avec la vue
            ];
        }

    public function login(){
            
        $userManager = new UserManager();

        if(isset($_POST["submitLogin"])){

            //on filtre les champs de saisie
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($email && $password){
            //on recherche le mot de passe associé à l'adresse mail
                $dbPass = $userManager->retrievePassword($email);

                if($dbPass){

                    //récupération du mot de
                    $hash = $dbPass->getPassword();
                    //on recherche l'utilisateur rattaché à l'adresse mail
                    $user = $userManager->findOneByEmail($email);

                    //on vérifie que les mots de passe concordent (password_verify)
                    if(password_verify($password, $hash)){

                        //on stocke l'user en Session (setUser dans App\Session)
                        Session::setUser($user);
                        
                        if(isset($_SESSION["user"])){

                            $msg = "You are connected !";
                            Session::addFlash('success', $msg);

                            $userId = $user->getId();
                            
                            $this->redirectTo('forum', $userId);
                          
                        }        
                    } else {

                        $msg = "Invalid email or password";
                        Session::addFlash('error', $msg);

                        $this->redirectTo('forum');

                    }
                } 
                else{
                
                $msg = "Invalid email or password";
                Session::addFlash('error', $msg);
                $this->redirectTo('forum');
                }

            }
        }
        return [
                "view" => VIEW_DIR."security/login.php", 
        ];
    }

    public function logout(){

        if(isset($_SESSION["user"])){

            unset($_SESSION['user']);
            $msg = "Disconnected";
            Session::addFlash('error', $msg);

            $this->redirectTo('forum');
            // header("Location: index.php?ctrl=home&action=home");
                
        }
    }
}