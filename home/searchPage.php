<?php

	session_start();
	include('../partials/header.php');
    

?>

<div class="container">
	
	
		<h1 class="my-5">Les résultats de votre recherche :</h1>
		<div class="row">
	<?php
		$db = Database::connect();

		if(isset($_POST) && !empty($_POST)){

			$research = checkInput($_POST['research']);
			

			$statement = $db->prepare('SELECT * FROM product WHERE product_name LIKE "%' . $research . '%"');
			$statement->execute();			
			$result = $statement->rowCount($statement);
			
			while ($item = $statement->fetch()){ ?>
					<br>
					<div class="col-4">
						
	                    <div class="card mb-3" style="max-width: 18rem;">
	                        <div class="card-body">
	                            <h5 class="card-title text-center font-weight-bold"><?php echo $item['product_brand']; ?></h5>
	                        </div>
	                        <img class="mx-auto d-block"style="height: 300px; width: 70%; display: block;" src="../images/<?php echo $item['caption']; ?>" alt="Card image">
	                        <div class="card-body">
	                            <p class="card-text text-center"><?php echo $item['product_name'] ; ?></p>
	                        </div>
	                        <ul class="list-group list-group-flush">
	                            <li class="list-group-item">Taille : <?php echo $item['size']; ?></li>
	                            <li class="list-group-item">Prix : <?php echo $item['price']; ?> &euro;</li>
	                            <li class="list-group-item">Quantité en stock : <?php echo $item['quantity']; ?></li>
	                        </ul>
	                        <div class="card-body">
	                            <a href="product.php?id=<?php echo $item['id']; ?>" class="card-link btn btn-primary"><i class="fas fa-eye"></i> Voir le produit</a>
	                        </div>
	                    </div>
		        	</div>
		        
			<?php	} } ?>
			 <h3 class="mt-5"><?php echo $result; ?> produit(s) correspondant(s)</h3>
	</div>
</div>
<?php require '../partials/footer.php';
?>