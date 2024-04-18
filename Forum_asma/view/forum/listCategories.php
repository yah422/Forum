<?php

$categories = $result["data"]['categories']; //récupère les données envoyées par le controller
    
?>
    <h1>Categories</h1>
    
    <?php
        
        foreach($categories as $category){
        ?>
        <div class="categories">
            <p><b><a href="index.php?ctrl=topic&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?=$category->getCategoryName()?></a></b></p>
                
        <?php

}

