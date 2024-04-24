<?php

?>
<div class="connexion">
    <h1> INSCRIPTION </h1>

    <form id="inscription" enctype=mutlitpart/form-data action="index.php?ctrl=security&action=registration" method="post">
        
        <label for="username">Pseudonyme</label>
        <input type="text" name="username" required>

        <label for="email">Email</label>
        <input type="email" name="email" required>

        <label for="password">Mot De Passe</label>
        <input type="password" name="password" required>

        <label for="confirmPassword">Confirmation Mot De Passe</label>
        <input type="password" name="confirmPassword" required>

        <input type="submit" name="submitRegistration">

    </form>

    <p>Vous avez déjà un compte ? <a href="index.php?ctrl=security&action=login">Se connecter</a> !</p>
</div>