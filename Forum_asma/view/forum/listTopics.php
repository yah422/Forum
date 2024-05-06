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

<div>
    
    <button style="background-color: #09143B;width: 200px;height: 100%;display: flex;flex-direction: row;align-content: center;justify-content: center;align-items: center;margin: 30px;border-radius: 15px;padding: 5px;"> 
        <a  href="index.php?ctrl=topic&action=ajoutTopic"> Ajouter un Topic </a>
    </button>
    <!-- !!!!!! ajouter une views qui doit etre cree avant et ensuite ajouter la redirection -->

</div>