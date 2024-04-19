<?php
        $posts = $result['data']['posts'];
        $topic = $result['data']['topic'];
?>
        <h1><?= $topic->getName()?></h1>
        <h2><?= $topic->getQuestion()?></h2>
        <p><a href="index.php?ctrl=security&action=login">Log in</a> to edit a post</p>
<div class="posts-container">

<?php
        if($posts == null){
                echo "<p>0 POST</p>";
        } else {

        foreach($posts as $post){
?>
        <p><?=$post->getContent()?></a></p>
        <p><?=$post->getCreationDate()?></p>
        <p><?=$post->getUser()->getUsername()?></a></p>

        <?php
        if(isset($_SESSION['user'])){
                
                if(App\Session::isAdmin()){
                        // var_dump($_SESSION['user']);die;
?>
                        <button><a href="index.php?ctrl=post&action=deletePost&id=<?=  $post->getId() ?>">Delete this post</a></button>
<?php
                } elseif(App\Session::getUser() == $post->getUser()){
?>
                        <button><a href="index.php?ctrl=post&action=updatePost&id=<?=  $post->getId() ?>">Update</a></button>
                        <button><a href="index.php?ctrl=post&action=deletePost&id=<?=  $post->getId() ?>">Delete</a></button>
<?php
                } else {
                        ?><button>Report this post</button><?php
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
                        <div class="form-add">

                                <h3>Edit a post</h3>
                
                                <form enctype="multipart/data" action="index.php?ctrl=post&action=addPost&id=<?=$id?>" method="post">
                
                                        <label for="content">Content</label>
                                        <textarea name="content" id="content"></textarea>
                
                                <input type="submit" name="submitPost">
                
                        </form>

                        </div>
                        <?php
                } else {
                        echo "Topic closed";
                }
        }
        