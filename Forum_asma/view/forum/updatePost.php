<?php
// Récupération des données du post à modifier
$post = $result["data"]['post'];
?>

<!-- Section pour la modification du post -->
<section id="wrapperUpdatePost">
    <!-- Titre de la section -->
    <h3><a id="h3update"> MODIFICATION POST </a></h3>

    <!-- Affichage du contenu du post à modifier -->
    <div class="lastPost">
        <p><?= $post->getContent() ?></p>
    </div>

    <!-- Formulaire de modification du post -->
    <form id="modifForm" action="index.php?ctrl=post&action=updatePost&id=<?=  $post->getId() ?>" method="post" enctype="multipart/form-data">
        <!-- Champ pour le nouveau contenu du post -->
        <label for="content">Contenu</label>
        <textarea name="content" id="content"><?= $post->getContent() ?></textarea>
        <br>
        <!-- Bouton de soumission pour la modification -->
        <input value="Modifier" id="updateSubmit" href="index.php?ctrl=topic&action=updatePost&id=<?=  $post->getId() ?>" type="submit" name="submitUpdatePost">
    </form>
</section>
