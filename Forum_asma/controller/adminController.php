<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;

class HomeController extends AbstractController implements ControllerInterface{

    public function index(){

    }

    // Accessible depuis le layout dans la section 'Users' réservée aux administrateurs
    public function listUsers(){

        // Restreint l'accès à cette fonctionnalité aux utilisateurs avec le rôle 'ROLE_ADMIN'
        $this->restrictTo("ROLE_ADMIN");

        // Instancie le gestionnaire d'utilisateurs
        $userManager = new UserManager();
        
        // Récupère tous les utilisateurs triés par date d'inscription décroissante
        $users =  $userManager->findAll(['registerDate', 'DESC']);

        // Retourne les données nécessaires à la vue 'security/listUsers.php'
        return [
            "metaDescription" => "Liste Utilisateurs",
            "view" => VIEW_DIR."security/listUsers.php",
            "data" => [
                "users" => $users
            ]
        ];
    }

    // Bannit un utilisateur
    public function ban($id){

        // Instancie le gestionnaire d'utilisateurs
        $userManager = new UserManager();

        // Bannit l'utilisateur
        $ban = $userManager->ban($id);

        // Redirige vers la liste des utilisateurs
        $this->redirectTo('admin', 'listUsers');

        // Retourne les données nécessaires à la vue 'security/listUsers.php'
        return [
            "metaDescription" => "Users List",
            "view" => VIEW_DIR."security/listUsers.php"
        ];
    }
    
    // Débannit un utilisateur
    public function deban($id){

        // Instancie le gestionnaire d'utilisateurs
        $userManager = new UserManager();

        // Débannit l'utilisateur
        $deban = $userManager->deban($id);

        // Redirige vers la liste des utilisateurs
        $this->redirectTo('admin', 'listUsers');
        
        // Retourne les données nécessaires à la vue 'security/listUsers.php'
        return [
            "metaDescription" => "Users List",
            "view" => VIEW_DIR."security/listUsers.php"
        ];
    }

}