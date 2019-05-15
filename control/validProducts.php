<?php
	session_start();
	
	include('Connect.php');

	$productId = "";

	if(isset($_POST) && !empty($_POST)){

		$userId = $_SESSION['user']['id'];
		$productsId = $_POST['products_id'];
		$quantities = $_POST['quantities'];
		$prices = $_POST['prices'];
		

		$db = Database::connect();
// Créer nouveau numéro de commande -- récup_id $cmd_id
		$cmdStatement = "SELECT IFNULL(MAX(cmd_id),0) AS MaxCmd_id FROM receipt";
		$statement = $db->prepare($cmdStatement);
		$statement->execute();
		$result = $statement->fetch();

		$cmd_id = $result['MaxCmd_id'] + 1;
		$total = 0;

//Insérer dans la DB la liste de produits rattachée à la commande
		foreach($prices as $price){
			$total += $price;
		}

		foreach ($productsId as $key =>  $id) {

			$listValue[] = $cmd_id.", ".$quantities[$key] .", ".$userId.", ". $id.",\"". date("Y-m-d H:i:s")."\"" . "," . $prices[$key] . "," . $total;

		}
		
		
		$sql="INSERT INTO receipt (cmd_id,product_quantity,user_id,product_id,order_date,price,totalPrice) VALUES (". implode('),(', $listValue) . ")";

		$statement = $db->prepare($sql);
		$statement->execute();

		unset($_SESSION['cart']);
		

		header("Location: ../home/homepage.php?id=$userId");

	} else {

		die("erreur");	
	}
?>