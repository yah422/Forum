<?php //Tous les Managers (dossier Model) hériteront de la classe Manager (dossier App) pour bénéficier des méthodes pré-établies :
// findAll, findOneById, ...

namespace Model\Managers;

use App\Manager;
use App\DAO;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;

class UserManager extends Manager{

    protected $className = "Model\Entities\User";
    protected $tableName = "user";

    public function __construct(){
        parent::connect();
    }

    //Retrouver le password grâce à l'email
    public function retrievePassword($email){

        $sql = "SELECT password FROM ".$this->tableName." WHERE ".$this->tableName.".email = :email";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['email' => $email], false),
            $this->className
        );

    }

    //Retrouver un user grâce à son email
    public function findOneByEmail($email){

        $sql = "SELECT * FROM ".$this->tableName." WHERE ".$this->tableName.".email = :email";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['email' => $email], false),
            $this->className
        );
    }

    public function findOneByUser($user){

        $sql = "SELECT * FROM ".$this->tableName." WHERE  ".$this->tableName.".username = :username";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['username' => $user], false), 
            $this->className
        );
    }
}