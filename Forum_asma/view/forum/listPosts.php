<?php
        $posts = $result['data']['posts'];
        $topic = $result['data']['topic'];
        $users = $result['data']['users'];
?>

<div id="titreTopic">
    <h1 id="h1Topic"><?= $topic->getName()?></h1>
    <h2><?= $topic->getQuestion()?></h2>
    
</div>        

<p id="log"><a href="index.php?ctrl=security&action=login">Se connecter pour modifier un post</a></p>

<div id="postsWrap">
        

    <?php
        if($posts == null){
                echo "<p>PAS DE POST</p>";
        } else {

            foreach($posts as $post){
        ?>
        <div id="wrapContentEtUser">
                <div class="content">
                        <p><?=$post->getContent()?></p>
                </div>
                <div class="InfosUsers">
                        <p><?=$post->getCreationDate()?></p>
                        <p><a href="index.php?ctrl=user&action=listTopicsAndPostsByUser&id=<?= $post->getUser()->getId()?>"><?=$post->getUser()->getUserName()?></a></p><br>
                </div>
        </div>
            <?php
                if(isset($_SESSION['user'])){
                    
                    if(App\Session::isAdmin()){
                        //     var_dump($_SESSION['user']);die;
        ?>
                        <button><a href="index.php?ctrl=post&action=deletePost&id=<?=  $post->getId() ?>"> Supprimer ce post </a></button>
            <?php
                    } elseif(App\Session::getUser() == $post->getUser()){
            ?>
                <div id="updateSupp">
                        &nbsp;&nbsp;<button><a href="index.php?ctrl=post&action=updatePost&id=<?=  $post->getId() ?>">&nbsp; Modifier &nbsp;</a></button>
                        &nbsp;&nbsp;&nbsp;
                        <a href="index.php?ctrl=post&action=deletePost&id=<?=  $post->getId() ?>">&nbsp; <input type="submit" name="action" id="Delete" value=" Supprimer " onClick="return confirm('Vous êtes sûre de vouloir supprimer ?')?this.form.action='<?php echo $_SERVER['PHP_SELF'] ?>':false;">&nbsp;</a></button>
                </div>
                
                <?php
                    } else {
                            ?> <?php
                    }
                }
            }
        }
    ?>

</div>

<?php
        if(isset($_SESSION['user'])){

                if($topic->getClosed() !== 1){

                        ?>              
                        <div id="form-add">

                                <h3>Modifier un post</h3>
                <br>
                                <form id="formContent" enctype="multipart/data" action="index.php?ctrl=post&action=addPost&id=<?=$id?>" method="post">
                
                                         <label for="content"> Contenu </label>
                                        <textarea name="content" id="content"></textarea>
                <br>
                                <input id="envoyerSubmit" type="submit" name="submitPost" value="Poster">
                
                        </form>

                        </div>
                        <?php
                } else {
                        echo "Topic fermé";
                }
        }?>
