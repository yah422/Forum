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
                            // regex de restriction de mot de passe 
                            if($password == $confirmPassword){
                                $uppercase = preg_match('@[A-Z]@', $password);
                                $lowercase = preg_match('@[a-z]@', $password);
                                $number    = preg_match('@[0-9]@', $password);

                                if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
                                // tell the user something went wrong
                                echo "Le mot de passe doit contenir au moins 8 caractères, une majuscule et un chiffre";
                                
                                //on hash le password (password_hash)
                                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                                // var_dump($passwordHash);
                                //on ajoute l'user en bdd (pas besoin d'id car autoincrement)
                                $userManager->add(["username" => $username, "email" =>$email, "password" => $passwordHash]);

                                $msg = "Session crée !";
                                Session::addFlash('succès', $msg);

                                //on redirige vers le formulaire de login dans la foulée
                                $this->redirectTo('security', 'login');
                            }} else {                                
                                
                                $msg = "Mot de passe invalide !";
                                Session::addFlash('erreur', $msg);

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
                    //  var_dump($password);die;
                        //on stocke l'user en Session (setUser dans App\Session)
                        Session::setUser($user);
                        
                        if(isset($_SESSION["user"])){

                            $msg = "Vous êtes connecter !";
                            Session::addFlash('succès', $msg);

                            $userId = $user->getId();
                            
                            $this->redirectTo('forum', $userId);
                                                 
                        }        
                    } else {

                        $msg = "Mot de passe ou email invalide";
                        Session::addFlash('erreur', $msg);

                        $this->redirectTo('forum');

                    }
                } 
                else{
                
                $msg = "Mot de passe ou email invalide";
                Session::addFlash('erreur', $msg);
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
            $msg = "Déconnecter";
            Session::addFlash('erreur', $msg);

            $this->redirectTo('forum');
            // header("Location: index.php?ctrl=home&action=home");
                
        }
    }
}