<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;

class HomeController extends AbstractController implements ControllerInterface{

    public function index(){

    }

    //Accessible depuis le layout dans la section 'Users' réservée aux Admin
    public function listUsers(){

        $this->restrictTo("ROLE_ADMIN");

        $userManager = new UserManager();
        
        $users =  $userManager->findAll(['registerDate', 'DESC']);

        return [
            "metaDescription" => "Liste Utilisateurs",
            "view" => VIEW_DIR."security/listUsers.php",
            "data" => [
                "users" => $users
            ]
        ];
    }
}