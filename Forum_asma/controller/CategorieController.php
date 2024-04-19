<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\CategoryManager;

    class CategorieController extends AbstractController implements ControllerInterface{

        public function index(){
        }       

        public function listCategories(){

            $categoryManager = new CategoryManager();
    
            return [
                "meta_description" => "Liste Catégories",
                "view" => VIEW_DIR."forum/listCategories.php", //Comment le controller interagit avec la vue
                "data" => [
                    "category" =>  $categoryManager->findAll(["categoryName", "ASC"]) //la méthode "findAll" est une méthode générique qui provient de l'AbstractController (dont hérite chaque controller de l'application, il ne faut pas la modifier) Seuls sont à modifier les attributs dans le tableau en fonction des besoins.
                ]
            ];   
        }
    }