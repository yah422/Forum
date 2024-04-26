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
    private $username;
    private $password;
    private $registerDate;
    private $role;
    private $email;

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

    // GET ET SET DE USERNAME
    public function getUsername(){
        return $this->username;
    }
    public function setUsername($username){
    $this->username = $username;
        
    return $this;
    }

    // GET ET SET DE PASSWORD
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
        return $this;
    }

    // GET ET SET DE REGISTER DATE
    public function getRegisterDate(){
        return $this->registerDate;
    }
    public function setRegisterDate($registerDate): self{
        $this->registerDate = $registerDate;

        return $this;
    }

    // GET ET SET DE ROLE
    public function getRole(){
        return $this->role;
    }
    public function setRole($role): self{
        $this->role = $role;

        return $this;
    }

    // CREATION DE LA FUNCTION HAS ROLE
    public function hasRole($role){
        if( $this->role == $role){
            return true;

    } else {

            return false;

        };
    }

    //  METHODE TOO STRING POUR USERNAME
    public function __toString(){
        return $this->username;
    }

    // GET ET SET DE EMAIL
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email): self{
        $this->email = $email;

        return $this;
    }
}