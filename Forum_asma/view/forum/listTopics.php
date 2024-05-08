<?php
// Récupération des données de la requête
$category = $result["data"]['category']; 
$topics = $result["data"]['topics'];
?>

<!-- Titre de la liste des topics -->
<h1 id="listTopic">Liste des topics</h1>

<?php
// Vérification si des topics existent
if($topics == null){
    echo " ";
} else {
    ?>
<div id="wrapListTopic">
    <?php
    // Parcours de chaque topic
    foreach($topics as $topic ){ ?>

       <!-- lien vers la liste des posts pour chaque topic -->
       <a href="index.php?ctrl=post&action=listPostsByTopics&id=<?= $topic->getId() ?>"> 
            <div id="cardTopic">
                <h2><?=$topic->getName()?></h2>
                <p><?=$topic->getQuestion()?></p>
                <p><?=$topic->getCreationDate()?></p>
            </div> 
        </a>

<?php }
}?>

<?php
    // Formulaire d'ajout de topic si l'utilisateur est connecté
    if(isset($_SESSION['user'])){

        if($topics == null){
            echo "0 topic yet";
        ?>

        <!-- Formulaire d'ajout de topic -->
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
        } else {
            ?>
            </div>

<div id="form-addTopic">
    <!-- Titre du formulaire d'ajout de topic -->
    <h3> Ajout d'un topic </h3>
    <br>
    
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

</div>
