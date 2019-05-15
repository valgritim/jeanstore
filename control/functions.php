 <?php
 /*session_start();*/
	

	function listAll(){

		$db = Database::connect();

		$statement = $db->query('SELECT * FROM product');

		while ($item = $statement->fetch()){

		// prend la premiere ligne du statement et le met dans le html, s'execute tant qu'il y a des lignes	
			echo '<div class="col-md-4">
                    <div class="card mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center font-weight-bold">' . $item['product_brand'] .'</h5>
                        </div>
                        <img class="mx-auto d-block"style="height: 300px; width: 70%; display: block;" src="../images/' . $item['caption'] . '" alt="Card image">
                        <div class="card-body">
                            <p class="card-text text-center">' . $item['product_name'] . '</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Taille : ' . $item['size'] . '</li>
                            <li class="list-group-item">Prix : ' . $item['price'] . '&euro;</li>
                            <li class="list-group-item">Quantité en stock : ' . $item['quantity'] . '</li>
                        </ul>
                        <div class="card-body">
                            <a href="product.php?id=' . $item['id'] .'" class="card-link btn btn-primary"><i class="fas fa-eye"></i> Voir le produit</a>
                        </div>
                    </div>
                </div>';
		}
		Database::disconnect();
	}

	function viewProduct(){

		$db = Database::connect();

		if(!empty($_GET['id'])){
    
    		$id = checkInput($_GET['id']);
    	}

			$statement = $db->prepare('SELECT * FROM product WHERE id = ?');

			// prepare la page produit avec tous les elements concernant le produit sélectionné par son id, afin de remplir la card
			$statement->execute(array($id));

			
			$item = $statement->fetch();

			$_SESSION['product']['id'] = $item['id'];
			$_SESSION['product']['product_name'] = $item['product_name'];
			$_SESSION['product']['product_brand'] = $item['product_brand'];
			$_SESSION['product']['price'] = $item['price'];
			$_SESSION['product']['size'] = $item['size'];
			$_SESSION['product']['caption'] = $item['caption'];
			$_SESSION['product']['quantity'] = $item['quantity'];

			Database::disconnect();
	}


	function checkInput($data){
    
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    
	}

	function getOrders(){

		$db = Database::connect();
		

		$statement = $db->prepare('SELECT * FROM receipt LEFT JOIN user ON receipt.user_id = user.id GROUP BY cmd_id');
		$statement->execute();
	

		while($item = $statement->fetch()) { 

			echo '<tr>
					<td>' . $item['order_date'] .'</td>
					<td>' . $item['cmd_id'] . '</td>
					<td>' . $item['lastname'] . '</td>
					<td>' . $item['firstname'] . '</td>
					<td>' . number_format($item['totalPrice'],2,',',' ') . '&euro;</td>
					<td>';
			echo '<a href="../createPdf/index.php?id='. $item['cmd_id'] . '"" type="button" class="btn btn-primary">Editer la facture</a></td>';
			
		};
		$_SESSION['user']['id'] = $item['id'];
		

		Database::disconnect();
	}

	function totalAmount(){

		$total = 0;
		$ids = array_keys($_SESSION['cart']);
        $db = Database::connect();

        if(empty($ids)){

        	$total = 0;
        } else {
        	$statement = $db->prepare('SELECT id, price FROM product WHERE id IN (' . implode(',', $ids) . ')');
            $statement->execute();

            while($product = $statement->fetch()){ 
            	$total += $product['price'];  
            }
            return $total;
        }                
     	Database::disconnect();   
	}

	function totalProducts(){


		$ids = array_keys($_SESSION['cart']);
		$count = count($ids);
		
		return $count;
	}

	function searchItems(){

		$db = Database::connect();

		if(isset($_POST) && !empty($_POST)){

			$research = checkInput($_POST('research'));
			print_r($research);
			exit();

			$statement = $db->prepare('SELECT * FROM product WHERE product_name LIKE "%' . $research . '%"');
			$statement->execute();
			

			while ($item = $statement->fetch()){

			// prend la premiere ligne du statement et le met dans le html, s'execute tant qu'il y a des lignes	
				echo '<div class="col-4">
	                    <div class="card mb-3" style="max-width: 18rem;">
	                        <div class="card-body">
	                            <h5 class="card-title text-center font-weight-bold">' . $item['product_brand'] .'</h5>
	                        </div>
	                        <img class="mx-auto d-block"style="height: 300px; width: 70%; display: block;" src="../images/' . $item['caption'] . '" alt="Card image">
	                        <div class="card-body">
	                            <p class="card-text text-center">' . $item['product_name'] . '</p>
	                        </div>
	                        <ul class="list-group list-group-flush">
	                            <li class="list-group-item">Taille : ' . $item['size'] . '</li>
	                            <li class="list-group-item">Prix : ' . $item['price'] . '&euro;</li>
	                            <li class="list-group-item">Quantité en stock : ' . $item['quantity'] . '</li>
	                        </ul>
	                        <div class="card-body">
	                            <a href="product.php?id=' . $item['id'] .'" class="card-link btn btn-primary"><i class="fas fa-eye"></i> Voir le produit</a>
	                        </div>
	                    </div>
	                </div>';
				}
			
		}
		Database::disconnect();
	}

			