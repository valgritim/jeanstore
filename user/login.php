<?php
    session_start();
    include("../partials/header.php");
	
?>

    <div class="container">
        <h1 class="my-5 text-dark h2"><img src="../images/sherif.png" alt="sherif" id="sherif"> Vous êtes déjà inscrit ? Connectez-vous !</h1>
        <?php
            if (isset($_SESSION["errors"]["user_logError"]) && !empty($_SESSION["errors"]["user_logError"])){
                $error = $_SESSION["errors"]["user_logError"];
                echo '<div class = "alert alert-warning mb-3">' . $error . '</div>';
            }
        ?>

        <form method="post" action="../control/login.php" class="bg bg-light p-5 rounded">
            <fieldset>
                <legend class="mb-3">Connexion</legend>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Valider</button>
            </fieldset>
        </form>
    </div>

<?php
    include('../partials/footerOther.php');
?>