<?php 
    $topics = $result['data']['topics'];
    $posts = $result['data']['posts'];
?>

    <h2>Topics crée par cet utilisateur </h2>

    <div >

        <?php

        if($topics == NULL){
            echo "0 topic";
        } else {
            foreach($topics as $topic){
                echo "<p>".$topic->getName()."</p>";
                echo "<p>".$topic->getCreationDate()."</p>";
                echo "<p>".$topic->getUser()."</p>";
            }
        }
?>

    </div>
    <h3>Posts crée par cet utilisateur</h3>

    <div >

        <?php

        if($posts == NULL){
        ?>
            <p>Cet utilisateur n'a encore rien poster</p>

        <?php
        } else {
            foreach($posts as $post){
                echo "<p>".$post->getContent()."</p>";
                echo "<p>".$post->getCreationDate()."</p>";
                echo "<p>".$post->getUser()."</p>";
            }
        }
            ?>
    <button><a href='index.php?ctrl=admin&action=listUsers'>Retour à utilisateur</a></button>
    </div>