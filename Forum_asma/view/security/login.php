<?php

?>

<div id="container">
<div class="connexion">
    <h1> CONNEXION AU FORUM </h1>

    <form id="connexionForm" enctype=mutlitpart/form-data action="index.php?ctrl=security&action=login" method="post">

        <label class="labelConnect" for="email">Email</label>
        <input class="inputConnexion" type="email" name="email" required>
<br>
        <label class="labelConnect" for="password">Mot De Passe</label>
        <input class="inputConnexion" type="password" name="password" required>
<br>
<br>
        <input id="inputSubmit" type="submit" value="Se connecter" name="submitLogin">

    </form>

</div>  

<div id="Connexion">
    <a href="index.php?ctrl=security&action=registration">
        <p>Vous n'avez encore un compte ? &nbsp; &nbsp;</p>
        <p>  &nbsp; &nbsp; S'inscrire</p> 
    </a> 
</div>
</div>