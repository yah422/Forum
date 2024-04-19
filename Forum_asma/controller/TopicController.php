<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\CategoryManager;
    use Model\Managers\UserManager;

    class TopicController extends AbstractController implements ControllerInterface{

        public function index(){
            
        }
        
        public function listTopicsByCategory($id){

            $topicManager = new TopicManager();
            $categoryManager = new CategoryManager();
            
            $category = $categoryManager->findOneById($id);

            $topics = $topicManager->topicsByCategory($id);

            if($category){

                if (isset($_POST['submitTopic'])){

                header("Location: index.php?ctrl=topic&action=addTopic");
                    
                }
            } else {
                
                $msg = "Cette catégorie n'existe pas !";
                Session::addFlash('error', $msg);
                
                $this->redirectTo('forum');
            }
          
                return [
                        "view" => VIEW_DIR."forum/listTopics.php", //Interaction avec la vue
                        "meta_description" => "Liste des Topics",
                        "data" => [
                        "topics" => $topics,
                        "category" =>$category
                        ]
                ];
        }
    }