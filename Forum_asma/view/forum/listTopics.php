<?php
    $category = $result["data"]['category']; 
    
    $topics = $result["data"]['topics'];
    
?>

<h1 id="listTopic">Liste des topics</h1>

<?php
if($topics == null){
    echo " ";
} else {
    ?>
<div id="wrapListTopic">
    <?php
    foreach($topics as $topic ){ ?>

       <a href="index.php?ctrl=post&action=listPostsByTopics&id=<?= $topic->getId() ?>"> 
            <div id="cardTopic">
                <h2><?=$topic->getName()?></h2>
                <p><?=$topic->getQuestion()?></p>
                <p><?=$topic->getCreationDate()?></p>
            </div> 
        </a>

<?php }
}?>
</div>