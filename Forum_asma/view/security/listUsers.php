<?php 
$users = $result['data']['users'];
?>

    <h1> Utilisateurs : </h1>
<?php

    foreach($users as $user){

?>  
    <div id="divUsersList">
        <p>Pseudonyme : &nbsp;<b> <?= $user->getUsername()?></b></p>
        <p>Email : &nbsp;<?= $user->getemail()?></p>
        <p>Date d'inscription : &nbsp;<i><?= $user->getRegisterDate()?></i></p>
        <br>
        <button><a id="aListUser" href="index.php?ctrl=user&action=listTopicsAndPostsByUser&id=<?= $user->getId()?>">Topics et Posts</a></button>
    </div>

    <?php }