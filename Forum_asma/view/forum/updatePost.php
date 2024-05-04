<?php
//Modifier un post
    $post = $result["data"]['post'];
    // var_dump($post);
?>
<section id="wrapperUpdatePost">
    <h3><a id="h3update"> MODIFICATION POST </a></h3>

<!-- Nom du topic -->

<!-- Question -->

<!-- Afficher le contenu de l'ancien post -->
    <div class="lastPost">

        <p><?= $post->getContent() ?></p>

    </div>

        <form id="modifForm" action="index.php?ctrl=post&action=updatePost&id=<?=  $post->getId() ?>" method="post" enctype="multipart/form-data">

            <label for="content">Content</label>

            <textarea name="content" id="content"><?= $post->getContent() ?></textarea>
            <br>
            <input href="index.php?ctrl=topic&action=updatePost&id=<?=  $post->getId() ?>" type="submit" name="submitUpdatePost">
            
        </form>
</section>