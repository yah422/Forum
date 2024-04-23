<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\CategoryManager;
    use Model\Managers\UserManager;
    use Model\Managers\PostManager;

    class PostController extends AbstractController implements ControllerInterface{

        public function index(){

        }

        public function listPostsByTopics($id){
            $postManager = new PostManager();
            $topicManager = new TopicManager();
            $userManager = new UserManager();

            $topic =  $topicManager->findOneById($id);
            $users =  $userManager->findAll(['registerDate', 'DESC']);

            if($topic) {
                return [
                    "metaDescription" => "Liste des posts par topic",
                    "view" => VIEW_DIR."forum/listPost.php",
                    "data" => [
                    "posts" => $postManager->postsByTopic($id),
                    "topic" => $topic,
                    "users" => $users
                    ]
                ];
            }
        }
    }