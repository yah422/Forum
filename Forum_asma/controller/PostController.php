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
                    "view" => VIEW_DIR."forum/listPosts.php",
                    "data" => [
                    "posts" => $postManager->postsByTopic($id),
                    "topic" => $topic,
                    "users" => $users
                    ]
                ];
            }
        }

        // ajout d'un post par l'id
        public function addPost($id){
            $postManager = new PostManager();
            $userId = Session::getUser()->getId();
            // ajout condition dans le if pour éviter que la page ne crash 
            if(isset($_POST['submitPost'])){
                $content = filter_input(INPUT_POST, "content", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                if($content){
                    $postManager->add(["content" => $content, "topic_id" => $id, "user_id" => $userId]);
                    $msg = "Post ajouté";
                    Session::addFlash('success', $msg);
                    header("Location: index.php?ctrl=post&action=listPostsByTopics&id=$id");
                    exit; // Ajout pour arrêter l'exécution du script après la redirection
                } else {
                    $msg = "Le contenu du post est vide";
                    Session::addFlash('error', $msg);
                }
            }
            
            // Cette partie du code sera toujours exécutée, même si la condition isset($_POST['submitPost']) est fausse
            return [
                "view" => VIEW_DIR. "forum/listPosts.php"
            ];
        }
        
        
        public function updatePost($id){

            $postManager = new PostManager();
            
            
            if(isset($_POST['submitUpdatePost'])){
                
                $content = filter_input(INPUT_POST, "content", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                if($content){

                    $postManager->updatePost($id, $content);

                    $msg = "Post modifier !";
                    Session::addFlash('success', $msg);
                    
                    $this->redirectTo('forum');
                    
                }
            }
                return [
                    "view" => VIEW_DIR."forum/updatePost.php",
                    "data" => [
                        "post" => $postManager->findOneById($id),
                        
                    ]
            ];
        }

        public function deletePost($id){

            $postManager = new PostManager();

            $postManager->delete($id);

            $msg = "Votre Post a été supprimé";
            Session::addFlash('error', $msg);

            $this->redirectTo('forum');
            // $this->redirectTo('post', 'listPostsByTopics', $id);
        }

    }