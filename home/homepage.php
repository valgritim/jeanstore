<?php
    session_start();
    include("../partials/header.php");
	
    
?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>JeansStore</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbar-static/">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/spacelab/bootstrap.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->

  </head>

  <body>


    <main role="main" class="container">
        <?php
            if (isset($_SESSION["user"]["firstname"]) && !empty($_SESSION["user"]["firstname"])){
                $user = $_SESSION["user"]["firstname"];
                echo '<div class = "alert alert-warning mt-4">Ravis de votre retour sur notre boutique de jeans, cher/chère  ' . $user . '!</div>';
            }
        ?>
      <div class="jumbotron mt-5 bg-light">
        <h1>La boutique de jeans en ligne</h1>

        <p class="lead">Nous vous proposons ici toutes les nouveautés, des jeans de la meilleure qualité. Stocks renouvelés régulièrement !</p>
       
      </div>

        <div class="container">
            <div class="row">
            <?php

                listAll();

            ?>
               </div> 
        </div>
    </main>

  <?php
    include("../partials/footer.php");
  ?>


  </body>
</html>
