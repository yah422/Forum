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
        private $closed;
        private $name;
        private $question;
        private $user;
        private $creationDate;

 // METHODE CONSTRUCT DE TOPIC
        public function __construct($data){         
            $this->hydrate($data);        
        }
 
// GET ET SET DE L'ID
        public function getId()
        {
                return $this->id;
        }
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }


// GET ET SET DE CLOSED
    public function getClosed()
    {
            return $this->closed;
    }
    public function setClosed($closed)
    {
            $this->closed = $closed;

            return $this;
    }

// GET ET SET DU NAME
    public function getName()
    {
            return $this->name;
    }
    public function setName($name)
    {
            $this->name = $name;

            return $this;
    }

// GET ET SET DE QUESTION
    public function getQuestion()
    {
            return $this->question;
    }
    public function setQuestion($question)
    {
            $this->question = $question;

            return $this;
    }

//  GET ET SET DU USER
    public function getUser()
    {
            return $this->user;
    }
    public function setUser($user)
    {
            $this->user = $user;

            return $this;
    }

// GET ET SET DE CREATIONDATE
    public function getCreationDate(){
        $formattedDate = $this->creationDate->format("d/m/Y, H:i:s");
        return $formattedDate;
    }
    public function setCreationDate($date){
        $this->creationDate = new \DateTime($date);
        return $this;
    }

}