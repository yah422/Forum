<?php

    namespace Model\Entities;

    use App\Entity;

    final class Post extends Entity{

        private $id;
        private $content;
        private $creationDate;
        private $user;
        private $topic;
        
    //  CONSTRUCT
        public function __construct($data){         
            $this->hydrate($data);        
        }
            
    // GET ET SET DE ID
        public function getId()
        {
            return $this->id;
        } 
        public function setId($id)
        {
            $this->id = $id;
            
            return $this;
        }

    //  GET ET SET DE CONTENT
        public function getContent()
        {
            return $this->content;
        }
        public function setContent($content)
        {
            $this->content = $content;
            
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

    // GET ET SET DE USER
        public function getUser(){

            return $this->user;
        }

        public function setUser($user){

            $this->user = $user;

            return $this;
        }

    // GET ET SET DE TOPIC
        public function getTopic(){

            return $this->topic;
        }
        public function setTopic($topic){

            $this->topic = $topic;

            return $this;
        }
    }