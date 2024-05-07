<?php

?>
<div id="container">
<div class="connexion">
    <h1> INSCRIPTION </h1>

    <form id="inscription" enctype=mutlitpart/form-data action="index.php?ctrl=security&action=registration" method="post">
        
        <label class="nameLabel" for="username">Pseudonyme</label>
        <input class="inputInscription" type="text" name="username" required>
<br>
        <label class="nameLabel" for="email">Email</label>
        <input class="inputInscription" type="email" name="email" required>
<br>
        <label class="nameLabel" for="password">Mot De Passe</label>
        <input class="inputInscription" type="password" name="password" required>
<br>
        <label class="nameLabel" for="confirmPassword">Confirmation Mot De Passe</label>
        <input class="inputInscription" type="password" name="confirmPassword" required>
<br>
<br>
        <input id="inputSubmitInscription" type="submit" value="S'inscrire" name="submitRegistration">

    </form>

</div>  

<div id="Connexion">
    <a href="index.php?ctrl=security&action=login">
        <p>Vous avez déjà un compte ? &nbsp; &nbsp;</p>
        <p>  &nbsp; &nbsp; Se connecter</p> 
    </a> 
</div>
</div>