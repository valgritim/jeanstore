<?php
	session_start();

	
	include("Connect.php");
//Initialisation de la variable de session du panier

	if(!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
	}

//Ajout de produits dans le panier

	if(isset($_GET['id'])){

		$db = Database::connect();
		$id = $_GET['id'];
		$statement = $db->prepare('SELECT * FROM product WHERE id = :id');

		$statement->bindParam(':id', $id);
		$statement->execute();

		$result = $statement->rowCount();		
		
		if($result != 1){

			die("Ce produit n'existe pas");

		} else {

			$product = $statement->fetch();

			$_SESSION['cart'][$product['id']] = $product['id'];
			$id = $product['id'];

			$_SESSION['message'] = 'Le produit a bien été ajouté à votre panier !';

			header("Location: http://valeriebaron.website/cvEnLigne/jeanStore/home/product.php?id=$id");

		}	


	} else {

		$_SESSION['message'] = "Vous n'avez sélectionné aucun produit !";

		header("Location: ../home/product.php?cart=noselection");
			
	}