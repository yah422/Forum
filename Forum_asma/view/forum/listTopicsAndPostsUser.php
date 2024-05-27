<?php 
    // Récupération des topics et des posts à partir des résultats de la requête.
    $topics = $result['data']['topics'];
    $posts = $result['data']['posts'];
?>

<h2 class="titreH">Topics créés par cet utilisateur</h2>

<div >
    <?php
    // Vérification si l'utilisateur a des topics
    if($topics == NULL){
        echo "0 topic"; // Affiche un message si l'utilisateur n'a pas de topics
    } else {
        // Boucle pour afficher chaque topic
        foreach($topics as $topic){ ?>
            <div class="divTopPost">
                <?php
                // Affiche le nom et la date de création du topic
                echo "<p>".$topic->getName()."</p>";
                echo "<p>".$topic->getCreationDate()."</p>";
                ?>
                <br>
            </div>
    <?php
        }
    }
    ?>
</div>

<h2 class="titreH">Posts créés par cet utilisateur</h2>

<div>
    <?php
    // Vérification si l'utilisateur a des posts
    if($posts == NULL){
    ?>
        <p>Cet utilisateur n'a encore rien posté</p> <!-- Affiche un message si l'utilisateur n'a pas de posts -->
    <?php
    } else {
        // Boucle pour afficher chaque post
        foreach($posts as $post){ ?>
            <div class="divTopPost">
                <?php
                // Affiche le contenu et la date de création du post
                echo "<p>".$post->getContent()."</p>";
                echo "<p>".$post->getCreationDate()."</p>";
                ?>
                <br>
            </div>
    <?php
        }
    }
    ?>
</div>

<!-- Bouton pour retourner à la liste des catégories -->
<button id="btC"><a href='index.php?ctrl=forum&action=index'>Retour à la liste des catégories</a></button>
