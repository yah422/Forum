<?php

$categories = $result["data"]['categories']; //récupère les données envoyées par le controller
    
?>
    <h1>Categories</h1>
        <?php
            
            foreach($categories as $category){
            ?>
            <a href="index.php?ctrl=topic&action=listTopicsByCategory&id=<?= $category->getId() ?>"> 
                <div class="categories">
                    <p><b><?=$category->getCategoryName()?></b></p>
                </div> 
            </a>
            <?php
            }
   


