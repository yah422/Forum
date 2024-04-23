<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class TopicManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Topic";
    protected $tableName = "topic";

    public function __construct(){
        parent::connect();
    }

    // récupérer tous les post d'un topic spécifique (par son id)
    public function topicsByCategory($id) {

        $sql = "SELECT * 
                FROM ".$this->tableName." t 
                WHERE t.category_id = :id";
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }

    public function listTopicsByUser($id){
        
        $sql = "SELECT *
                FROM ".$this->tableName."t
                WHERE t.user_id = :id";
        // la requête renvoie plusieurs enregistrements --> getMultiplesResults
        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]),
            $this->className
        );

    }
}