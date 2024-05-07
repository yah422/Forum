<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics'];
    
?>

<h1 id="listTopic">Liste des topics</h1>

<?php
if($topics == null){
    echo " ";
} else {
    ?>
<div id="wrapListTopic">
    <?php
    foreach($topics as $topic ){ ?>

       <a href="index.php?ctrl=post&action=listPostsByTopics&id=<?= $topic->getId() ?>"> 
            <div id="cardTopic">
                <h2><?=$topic->getName()?></h2>
                <p><?=$topic->getQuestion()?></p>
                <p><?=$topic->getCreationDate()?></p>
            </div> 
        </a>

<?php }
}?>

<section id="sectionTopicChangement">
<?php
    //Formulaire d'ajout de topic
    if(isset($_SESSION['user'])){

        if($topics == null){

            echo "0 topic yet";
        ?>
        <div class="form-add">

            <form action="index.php?ctrl=topic&action=addTopic&id=<?= $id ?>" method="post" enctype="multipart/form-data">

            <label for="name"> Nom </label>
            <input type="text" name="name" id="name">

            <label for="question"> Question </label>
            <textarea name="question" id="question"></textarea>

            <input type="submit" name="submitTopic">
            
        </form>

        </div>
        <?php
        }else {
            ?>
            </div>

<div id="form-addTopic">
    <h3> Ajout d'un topic </h3>
    
            <form id="TopicChange" action="index.php?ctrl=topic&action=addTopic&id=<?= $id ?>" method="post" enctype="multipart/form-data">
    
                <label for="name"> Nom </label>
                <input type="text" name="name" id="name">
    
                <label for="question"> Question </label>
                <textarea name="question" id="question"></textarea>
    <br>
                <input type="submit" name="submitTopic">
                
            </form>

        </div>

    <?php
    }
}?>
</section>