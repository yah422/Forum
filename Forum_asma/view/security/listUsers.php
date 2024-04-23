<?php 
$users = $result['data']['users'];
?>

    <h1> Utilisateurs : </h1>
<?php

    foreach($users as $user){

?>
        <p>Pseudonyme :<b> <?= $user->getUsername()?></b></p>
        <p>Email : <?= $user->getemail()?></p>
        <p>Date d'inscription : <i><?= $user->getRegisterDate()?></i></p>

        <button><a href="index.php?ctrl=user&action=listTopicsAndPostsByUser&id=<?= $user->getId()?>">Topics et Posts</a></button>
    
    <?php }