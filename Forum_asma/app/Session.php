<?php
namespace App;

// ^^ Session.php : fournit les méthodes relatives à la session (messages flash et gestion des utilisateurs) 
// ^^ La méthode suivante permet de vérifier qu'un utilisateur est bien connecté :


class Session{

    private static $categories = ['error', 'success'];

    /**
    *   ajoute un message en session, dans la catégorie $categ
    */
    public static function addFlash($categ, $msg){
        $_SESSION[$categ] = $msg;
    }

    /**
    *   renvoie un message de la catégorie $categ, s'il y en a !
    */
    public static function getFlash($categ){
        
        if(isset($_SESSION[$categ])){
            $msg = $_SESSION[$categ];  
            unset($_SESSION[$categ]);
        }
        else $msg = "";
        
        return $msg;
    }

    /**
    *   met un user dans la session (pour le maintenir connecté)
    */
    // public function users(){

    //     $this->restrictTo("ROLE_USER");

    //     $manager = new UserManager();
    //     $users = $manager->findAll(['register_date', 'DESC']);

    //     return [
    //         "view" => VIEW_DIR."security/users.php",
    //         "meta_description" => "Liste des utilisateurs du forum",
    //         "data" => [ 
    //             "users" => $users 
    //         ]
    //     ];
    // }


    public static function setUser($user){
        $_SESSION["user"] = $user;
    }


    public static function getUser(){
        return (isset($_SESSION['user'])) ? $_SESSION['user'] : false;
    }


    public static function isAdmin(){
        // attention de bien définir la méthode "hasRole" dans l'entité User en fonction de la façon dont sont gérés les rôles en base de données
        if(self::getUser() && self::getUser()->hasRole("ROLE_ADMIN")){
            return true;
        }
        return false;
    }
}