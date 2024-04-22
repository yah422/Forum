<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\PostManager;
    use Model\Managers\UserManager;

    class UserController extends AbstractController implements ControllerInterface{

        public function index(){
            
        }

        public function listTopicsAndPostsByUser($id){

            $topicManager = new TopicManager;
            $postManager = new PostManager;
            // $userManager = new UserManager;
            
            
            return [
                "view" => VIEW_DIR."forum/listTopicsAndPostsUser.php",
                "data" => [
                    "topics" => $topicManager->listTopicsByUser($id),
                    "posts" =>$postManager->listPostsByUser($id)
                    // "users" =>$userManager->listUsers($id)
                    ]
            ];
        }

            // public function userProfile($id){

            //     $userManager = new UserManager;
            //     $topicManager = new TopicManager;
            //     $postManager = new PostManager;
                
            //     $topics = $topicManager->listTopicsByUser($id);
            //     $posts = $postManager->listPostsByUser($id);

            //     return [
            //         "view" => VIEW_DIR."forum/profile.php",
            //         "data" => [
            //             "topics" => $topics,
            //             "posts" => $posts
            //         ]
            //     ];

            // }
}