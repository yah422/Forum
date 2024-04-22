<?php $users = $result['data']['users'];?>

    <h1>Users :</h1>
<?php

    foreach($users as $user){

?>
        <p>Username :<b> <?= $user->getUsername()?></b></p>
        <p>Email : <?= $user->getemail()?></p>
        <p>Register Date : <i><?= $user->getRegisterDate()?></i></p>

        <button><a href="index.php?ctrl=user&action=listTopicsAndPostsByUser&id=<?= $user->getId()?>">See topics and posts</a></button>
    
    <?php }