<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\TopicManager;
use Model\Managers\CategoryManager;
use Model\Managers\UserManager;
use Model\Managers\PostManager;

class HomeController extends AbstractController implements ControllerInterface {

    // Méthode pour afficher la page d'accueil du forum
    public function index(){
        return [
            "view" => VIEW_DIR."home.php", // Vue à afficher
            "meta_description" => "Page d'accueil du forum" // Description pour le référencement
        ];
    }

    // Méthode pour afficher la liste des utilisateurs (accessible uniquement aux utilisateurs)
    public function users(){
        $this->restrictTo("ROLE_USER"); // Restreint l'accès aux utilisateurs

        // Instancie le gestionnaire d'utilisateurs
        $manager = new UserManager();

        // Récupère tous les utilisateurs triés par date d'inscription décroissante
        $users = $manager->findAll(['register_date', 'DESC']);

        // Retourne les données nécessaires à la vue 'security/listUsers.php'
        return [
            "view" => VIEW_DIR."security/listUsers.php", // Vue à afficher
            "meta_description" => "Liste des utilisateurs du forum", // Description pour le référencement
            "data" => [ // Données à passer à la vue
                "users" => $users // Liste des utilisateurs
            ]
        ];
    }
}
