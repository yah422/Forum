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

            
            $topics = $topicManager -> findOneById($id);

            $post = $postManager -> PostsByTopics($id);



        }
    }