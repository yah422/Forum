<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, 
    c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. 
    En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class User extends Entity{

    private $id;
    private $nickName;

    // METHODE CONSTRUCT DE USER
    public function __construct($data){         
        $this->hydrate($data);        
    }

    // GET ET SET DE L'ID USER
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    // GET ET SET DU PSEUDO USER
    public function getNickName(){
        return $this->nickName;
    }
    public function setNickName($nickName){
        $this->nickName = $nickName;

        return $this;
    }

    // METHODE TOOSTRING POUR L'AFFICHAGE
    public function __toString() {
        return $this->nickName;
    }
}