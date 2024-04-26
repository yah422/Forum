<?php
    $topics = $result['data']['topics'];
    $posts = $result['data']['posts'];
?>
    <h1 id="h1profilName"> Votre Profil <?=  App\Session::getUser()->getUsername() ?> !</h1>
   
    <div class="partsProfil">
        <h2>Vos topics :</h2>

        <?php
        if(!isset($topics)){
            ?>
                <p>0 topic poster</p>
    </div>   
     <?php
    } else {
        foreach($topics as $topic){
        ?>

           <p><?= $topic->getName() ?></p>

        <?php
        }
    }
    ?>

    <br>

    <div class="partsProfil">

        <h3>Vos posts :</h3>

        <?php
            if(!isset($posts)){
        ?>
                <p>0 topic poster</p>

        <?php
        } else {
            foreach($posts as $post){
        ?>
            <p><?= $post->getContent() ?></p>
        <?php
            }
        }
        ?>
    </div> 