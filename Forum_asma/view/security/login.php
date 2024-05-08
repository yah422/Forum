<?php
// Section de connexion au forum

?>

<!-- Conteneur principal -->
<div id="container">
    <!-- Formulaire de connexion -->
    <div class="connexion">
        <!-- Titre de la section -->
        <h1> CONNEXION AU FORUM </h1>

        <!-- Formulaire de connexion -->
        <form id="connexionForm" enctype="multipart/form-data" action="index.php?ctrl=security&action=login" method="post">

            <!-- Champ pour l'email -->
            <label class="labelConnect" for="email">Email</label>
            <input class="inputConnexion" type="email" name="email" required>
            <br>
            <!-- Champ pour le mot de passe -->
            <label class="labelConnect" for="password">Mot De Passe</label>
            <input class="inputConnexion" type="password" name="password" required>
            <br>
            <br>
            <!-- Bouton de soumission du formulaire -->
            <input id="inputSubmitInscription" type="submit" value="Se connecter" name="submitLogin">

        </form>

    </div>

    <!-- Lien vers la page d'inscription -->
    <div id="Connexion">
        <a href="index.php?ctrl=security&action=registration">
            <p>Vous n'avez pas encore de compte ? &nbsp; &nbsp;</p>
            <p>  &nbsp; &nbsp; S'inscrire</p> 
        </a> 
    </div>
</div>
<?php 
// var_dump($_SESSION["user"]);
