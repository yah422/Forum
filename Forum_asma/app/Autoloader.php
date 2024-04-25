<?php
namespace App;

// Autoloader.php : permet un auto-chargement des classes du projet (appelé dans index.php)
class Autoloader{

    // Fonction pour enregistrer l'autoloader
    public static function register(){
        // Utilisation de spl_autoload_register pour enregistrer la fonction autoload
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    // Fonction pour charger automatiquement les classes
    public static function autoload($class){

        //$class = Model\Managers\TopicManager (FullyQualifiedClassName)
        //namespace = Model\Managers, nom de la classe = TopicManager

        // on explose notre variable $class par \
        $parts = preg_split('#\\\#', $class);
        //$parts = ['Model', 'Managers', 'TopicManager']

        // on extrait le dernier element 
        $className = array_pop($parts);
        //$className = TopicManager

        // on créé le chemin vers la classe
        // on utilise DS car plus propre et meilleure portabilité entre les différents systèmes (windows/linux) 

        $path = strtolower(implode(DS, $parts));
        //$path = 'model/manager'
        $file = $className.'.php';
        //$file = TopicManager.php

        // Chemin complet vers le fichier de la classe
        $filepath = BASE_DIR.$path.DS.$file;
        //$filepath = model/managers/TopicManager.php

        // Vérifie si le fichier de la classe existe, puis le require si c'est le cas
        if(file_exists($filepath)){
            require $filepath;
        }
    }
}
