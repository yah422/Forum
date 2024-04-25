<?php
namespace App;

/*
    En programmation orientée objet, une classe abstraite est une classe qui ne peut pas être instanciée directement. 
    Cela signifie que vous ne pouvez pas créer un objet directement à partir d'une classe abstraite.
    Les classes abstraites : 
    -- peuvent contenir à la fois des méthodes abstraites (méthodes sans implémentation) et des méthodes concrètes (méthodes avec implémentation).
    -- peuvent avoir des propriétés (variables) avec des valeurs par défaut.
    -- une classe peut étendre une seule classe abstraite.
    -- permettent de fournir une certaine implémentation de base.
*/

abstract class AbstractController{

    // Méthode index avec une implémentation vide
    public function index() {}

    // Méthode pour rediriger vers une autre page
    public function redirectTo($ctrl = null, $action = null, $id = null){

        // Construction de l'URL de redirection en fonction des paramètres
        $url = $ctrl ? "?ctrl=".$ctrl : "";
        $url.= $action ? "&action=".$action : "";
        $url.= $id ? "&id=".$id : "";

        // Redirection vers l'URL générée
        header("Location: $url");
        die();
    }

    // Méthode pour restreindre l'accès basée sur le rôle de l'utilisateur
    public function restrictTo($role){
        
        // Vérification si l'utilisateur n'est pas connecté ou n'a pas le rôle requis
        if(!Session::getUser() || !Session::getUser()->hasRole($role)){
            // Redirection vers la page de connexion
            $this->redirectTo("security", "login");
            
            // OU 
            // Donner accès à la méthode "users" uniquement aux utilisateurs qui ont le rôle ROLE_USER
            // public function users(){
            //  $this->restrictTo("ROLE_USER");
            // }
        }
        return;
    }

}
?>
