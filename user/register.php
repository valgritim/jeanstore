<?php
    session_start();
    include("../partials/header.php");
	
?>

<div class="container">
    <h1 class="my-5 text-dark h2"><img src="../images/gun.png" alt="gun image" id="gun"> Pas encore inscrit ? Créez votre compte !</h1>

    <form method="post" action="../control/register.php" class="bg bg-light p-5 rounded">
        <fieldset>
            <legend class="mb-3">Formulaire d'inscription</legend>
            <div class="form-group">
                <label for="firstname" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="firtsname" name="firstname" placeholder="Entrez votre prénom" required>
            </div>
            <div class="form-group">
                <label for="lastname">Nom</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Entrez votre nom" required>

            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
            </div>
            <div class="form-group">
                <label for="address">Adresse</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Entrez votre adresse" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Valider</button>
        </fieldset>
    </form>
</div>

<?php
    include('../partials/footerOther.php');
?>