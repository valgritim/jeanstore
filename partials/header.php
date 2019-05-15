<?
    session_start();
include("../control/Connect.php");
    
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>JeansStore</title>
    <link rel="icon" type="image/png" href="../images/JeansStore_logo.png" />
    <link href="https://fonts.googleapis.com/css?family=Vast+Shadow" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbar-static/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/spacelab/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">    

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.js"></script>
    
    
        


</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <img src="../images/JeansStore_logo.png" alt="Logo JeansStore" class="img-fluid mr-3" id="logo">
    <a class="navbar-brand" href="../home/homepage.php">JeansStore</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../home/homepage.php"><i class="fas fa-home"></i> <span class="sr-only">(current)</span></a>
            </li>

            <?php 
                if(!isset($_SESSION['user'])){
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="../user/register.php"><i class="fas fa-pen"></i> S'inscrire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../user/login.php"><i class="fas fa-sign-in-alt"></i> Se connecter</a>
                </li>
            <?php } ?>
            <?php 
              if(isset($_SESSION['user'])){
            ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-custom-white" href="#" id="accountDropDown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Voir mon Compte
                  </a>
                  <div class="dropdown-menu" aria-labelledby="accountDropDown">
                    <a class="dropdown-item text-custom-white" href="../user/account.php?id=<?php echo $_SESSION['user']['id']?>">Mes commandes</a>
                    <a class="dropdown-item text-custom-white" href="../control/disconnect.php">Déconnexion</a>
                  </div>
                </li>
            <?php } ?>
            
            <li class="nav-item">
                    <a class="nav-link ml-5" href="../user/cart.php"><i class="fas fa-cart-arrow-down"></i> Voir le Panier</a>
            </li>
            <li class="nav-item mx-3 text-center text-white">
                <i> Produits</i><br>
                <span>
                    <?php 
                    include('../control/functions.php');
                        if (!empty($_SESSION['cart'])){
                        echo totalProducts();
                         } else {
                            echo "0";
                        }
                    ?>
                    </span>
                        
                    </span>
            </li>
            <li class="nav-item text-center text-white">
                <i>Montant total</i><br>
                <span>
                    <?php 
                        if (!empty($_SESSION['cart'])){
                        echo number_format(totalAmount(),2,',',' ');
                         } else {
                            echo "0";
                        }
                    ?>
                    &euro;</span>
            </li>
            <?php 
            
                  if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 2){
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="../admin/board.php"><i class="fas fa-pen"></i>Administrateur</a>
                </li>
            <?php } ?>
            
        </ul>
        <form class="form-inline my-2 my-lg-0" method="post" action="searchPage.php">
            <input class="form-control mr-sm-2" type="text" name="research" placeholder="Search" id="autocompletion">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Rechercher</button>
        </form>
    </div>
</nav>

