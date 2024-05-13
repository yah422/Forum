<?php 
$users = $result['data']['users'];
?>

    <h1> Utilisateurs : </h1>
<?php

    foreach($users as $user){

?>  
    <div id="divUsersList">
        <p>Pseudonyme : <b> <?= $user->getUsername()?></b></p>
        <p>Email : <?= $user->getemail()?></p>
        <p>Date d'inscription : <i><?= $user->getRegisterDate()?></i></p>

        <button><a id="aListUser" href="index.php?ctrl=user&action=listTopicsAndPostsByUser&id=<?= $user->getId()?>">Topics et Posts</a></button>
    </div>

    <?php }