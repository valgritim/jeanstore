<?php
	session_start();   
	
	include('../partials/header.php');
	
	unset($_SESSION["user"]["firstname"]);
?>

<div class="container mt-5">
    <div id="retour"><a href="../home/homepage.php">Retour vers la liste</a> </div>
     
	<div class="row">
		<div class="col-md-4">
			<div class="card my-5 ml-5" style="height: 500px;">
                <div class="card-body">
                	<?php
                		viewProduct();
                	?>
                    <h5 class="card-title text-center font-weight-bold"><?php echo $_SESSION['product']['product_brand'] ?></h5>
                </div>
                    <img class="mx-auto d-block"style="height: 350px; width: 70%; display: block;" src="../images/<?php echo $_SESSION['product']['caption'] ?>" alt="Card image">
                <div class="card-body">
                	
                    <p class="card-text text-center font-weight-bold"><?php echo $_SESSION['product']['product_name'] ?></p>
                </div>
                
                 
            </div>
        </div>
        <div class="col-md-6 ml-5" style="font-size: 18px;">
        	<div class="card my-5">
        		<div class="card-body">
	        		<ul class="list-group list-group-flush">
                        <li class="list-group-item"> <?php echo $_SESSION['product']['product_brand'] ?> ></li>
                        <li class="list-group-item">Référence : <?php echo $_SESSION['product']['id'] ?></li>
	                    <li class="list-group-item">Taille : <?php echo $_SESSION['product']['size'] ?></li>
	                    <li class="list-group-item">Prix : <?php echo $_SESSION['product']['price']?>&euro;</li>
	                    <li class="list-group-item ">Quantité en stock : <?php echo $_SESSION['product']['quantity']?></li>
	                </ul>
        		</div>
	        	<div class="card-body">
	                    <a href="../control/addToCart.php?id=<?php echo $_SESSION['product']['id'] ?>" class="card-link btn btn-primary float-right"><i class="fas fa-cart-arrow-down"></i> Ajouter au panier</a>
	            </div>
                
                <div class="card-footer">
                    <p><i class="fas fa-truck"></i> Livraison Standard gratuite</p>
                    <p><i class="fas fa-stopwatch"></i> Livraison Express 9,95 € <br>1-2 jours ouvrables en commandant avant 15h</p>
                    
                </div>
        	</div>        	
        </div>
	</div>
    <div class="row bg-light p-3">
        <div class="col-6">
            <h4>Matière et entretien</h4>
            <hr>
            <p>Composition: 99% coton, 1% élasthanne</p>
            <p>Matière: Denim</p>
            <p>Contient des éléments non-textiles d'origine animale: Oui</p>
            <p>Conseils d'entretien: Ne pas mettre au sèche-linge, lavage en machine à 30°C</p>
            <br>
            <p>Détails du produit</p><hr>
            <p>Taille: Normale</p>
            <p>Fermeture: Braguette à fermeture éclair</p>
            <p>Poches: Poches arrière, poches latérales<p>
        </div>

    </div>
</div>

<?php
	include('../partials/footer.php');
?>
