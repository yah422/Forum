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
<?php
foreach($topics as $topic ){ ?>

    <div id="cardTopic">
        <h2><a href="index.php?ctrl=post&action=listPostsByTopics&id=<?= $topic->getId() ?>"><?=$topic->getName()?></a></h2>
        <p><?=$topic->getQuestion()?></p>
        <p><?=$topic->getCreationDate()?></p>
    </div> 
<?php }
}