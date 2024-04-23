<?php 
    $topics = $result['data']['topics'];
    $posts = $result['data']['posts'];
?>

    <h2 class="titreH">Topics crée par cet utilisateur </h2>

    <div class="divTopPost">

        <?php

        if($topics == NULL){
            echo "0 topic";
        } else {
            foreach($topics as $topic){
                echo "<p>".$topic->getName()."</p>";
                echo "<p>".$topic->getCreationDate()."</p>";?> <br><?php
            }
        }
?>

    </div>
    <h2 class="titreH">Posts crée par cet utilisateur</h2>

    <div class="divTopPost">

        <?php

        if($posts == NULL){
        ?>
            <p>Cet utilisateur n'a encore rien poster</p>

        <?php
        } else {
            foreach($posts as $post){
                echo "<p>".$post->getContent()."</p>";
                echo "<p>".$post->getCreationDate()."</p>";?> <br><?php
            }
        }
            ?>
    </div>    
    <button id="btC"><a href='index.php?ctrl=forum&action=index'> Retour à la liste des catégories </a></button>
