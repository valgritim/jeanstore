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
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbar-static/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/spacelab/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../css/style.css">
  

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   

    <!-- Custom styles for this template -->

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="../images/JeansStore_logo.png" alt="Logo JeansStore" class="img-fluid mr-3" id="logo">
    <a class="navbar-brand" href="#">JeansStore</a>
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
                <li class="nav-item">
                  <a class="nav-link text-custom-white" href="../control/disconnect.php">
                    Déconnexion
                  </a>
                 
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
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
