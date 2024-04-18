<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, 
    c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. 
    En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class Topic extends Entity{

    private $id;
    private $title;
    private $user;
    private $category;
    private $creationDate;
    private $closed;

    // METHODE CONSTRUCT DE TOPIC
    public function __construct($data){         
        $this->hydrate($data);        
    }

    // GET ET SET DE L'ID
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    // GET ET SET DU TITRE
    public function getTitle(){
        return $this->title;
    } 
    public function setTitle($title){
        $this->title = $title;
        return $this;
    }

    // GET ET SET DU USER
    public function getUser(){
        return $this->user;
    }
    public function setUser($user){
        $this->user = $user;
        return $this;
    }

    // METHODE TOOSTRING POUR L'AFFICHAGE
    public function __toString(){
        return $this->title;
    }
}