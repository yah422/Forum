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

        // ajouter un topic
        public function addTopic($id){
            $topicManager = new TopicManager();
            $userManager = new UserManager();
        
            $userId = Session::getUser()->getId();
        
            if(isset($_SESSION['user'])){
                
                if(isset($_POST['submitTopic'])){
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $question = filter_input(INPUT_POST, "question", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
                    if($name && $question){
                        $topicManager->add(["name" => $name, "question" =>$question, "category_id" => $id, "user_id" => $userId]);
        
                        $msg = "Topic ajouté !";
                        Session::addFlash('success', $msg);
                        // header("Location: index.php?ctrl=topic&action=addTopic");
                        $this->redirectTo("topic", "addTopic");
        
                        // Pas besoin de l'id_topic puisque c'est en auto increment dans la base de données, l'id en cours est celui de la categorie, creationDate a déjà une valeur par défaut
                        return [
                            "view" => VIEW_DIR. "forum/listTopics.php"
                        ];
                    }
                }
            }
        }
        
        // modifier un Topic
        public function updateTopic($id){

            $topicManager = new TopicManager();

            if(isset($_POST['updateTopic'])){
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $question = filter_input(INPUT_POST, "question", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                if($name && $question){
                    
                    $topicManager->updateTopic($id, $name, $question);

                    $msg = "Topic modifier !";
                    Session::addFlash('success', $msg);
                    
                    $this->redirectTo('forum');
                } else {

                    $msg = "Error !";
                    Session::addFlash('error', $msg);
                    
                    $this->redirectTo('forum');
                }
            }
                return [
                        "view" => VIEW_DIR."forum/updateTopic.php", //Interaction avec la vue
                        "data" => [
                            "topics" => $topicManager->findOneById($id)
                        ]
                ];
        }


    }