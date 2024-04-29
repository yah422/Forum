<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class PostManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Post";
    protected $tableName = "post";

    public function __construct(){
        parent::connect();
    }

     // récupérer tous les topics d'une catégorie spécifique (par son id)
     public function postsByTopic($id){

        $sql = "SELECT * FROM ".$this->tableName." WHERE topic_id = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id'=>$id]),
            $this->className
        );
    }

    // récupérer tous les posts d'un utilisateur spécifique (par son id)
    public function listPostsByUser($id){

        $sql = "SELECT * FROM ".$this->tableName." WHERE user_id = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id'=>$id]),
            $this->className
        );

    }
    // pouvoir modifier un post spécifique
    public function updatePost($id, $content){
        // var_dump($content); die;
        $sql = "UPDATE post
                SET content = :content
                WHERE id_post = :id";
                
        DAO::select($sql, [
            'content'=>$content,
            'id'=>$id,
        ]);
        
    }
}