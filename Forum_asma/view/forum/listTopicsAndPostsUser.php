<?php 
    $topics = $result['data']['topics'];
    $posts = $result['data']['posts'];
?>

    <h2 class="titreH">Topics crée par cet utilisateur </h2>

    <div style="margin-left: 30px;">

        <?php

        if($topics == NULL){
            echo " 0 topic ";
        } else {
            foreach($topics as $topic){?>
            <div class="divTopPost"><?php
                echo "<p>".$topic->getName()."</p>";
                echo "<p>".$topic->getCreationDate()."</p>";?> <br>
            </div>
<?php
            }
        }
?>

    </div>
    <h2 class="titreH">Posts crée par cet utilisateur</h2>

    <div >

        <?php

        if($posts == NULL){
        ?>
            <p>Cet utilisateur n'a encore rien poster</p>

        <?php
        } else {
            foreach($posts as $post){?>
            <div class="divTopPost"><?php
                echo "<p>".$post->getContent()."</p>";
                echo "<p>".$post->getCreationDate()."</p>";?> <br>
            </div>
        <?php
            }
        }
            ?>
    </div>    
    <button id="btC"><a href='index.php?ctrl=forum&action=index'> Retour à la liste des catégories </a></button>
