<?php
	session_start();
	
	include('../partials/headerAccount.php');
	

?>
<div class="container bg-light rounded" id="account">
	<h1 class="my-4"><i class="fas fa-file-invoice-dollar mt-3 ml-5"></i> Vos dernières commandes</h1>

	<table class="table table-hover">
		<thead>
			<th>Date de commande</th>
			<th>Numéro de commande</th>
			<th>Montant total</th>
			<th></th>
		</thead>
		<tbody>
			
		<?php
			if(isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id'])){

				$userId = checkInput($_GET['id']);

				$db = Database::connect();

				$statement = $db->prepare("SELECT * FROM receipt LEFT JOIN product ON product.id = receipt.product_id WHERE receipt.user_id = ? order by cmd_id");
				$statement->execute(array($userId));
				$current_cmd_id=0;
				$total = 0;

				while($item = $statement->fetch()){
					
					if ($current_cmd_id != $item['cmd_id']) {
						if ($current_cmd_id != 0) {?>
							</tbody>
						</table>
						</td>
						</tr>
						<?php }
						$current_cmd_id = $item['cmd_id']; ?>
						<tr class="table-dark">
							<td ><?php echo $item['order_date'] ?></td>
							<td><?php echo $item['cmd_id'] ?></td>
							<td><?php echo number_format($item['totalPrice'],2,',',' ')  ?>&euro;</td>
							
						</tr>
						<tr>
							<td colspan=3>
								<table class="table ml-3" id="<?php echo $item['cmd_id']; ?>">
									<thead>
			
										<th>Référence du produit</th>
										<th>Marque</th>
										<th>produit</th>
										<th>Taille</th>
										<th>Quantité</th>
										<th>Prix</th>			
									</thead>
									<tbody class=>

			<?php 	} ?>	
										<tr class="mb-4">
											<td><?php echo $item['id'] ?></td>
											<td><?php echo $item['product_brand'] ?></td>
											<td><?php echo $item['product_name'] ?></td>
											<td><?php echo $item['size'] ?></td>											
											<td><?php echo $item['quantity'] ?></td>
											<td><?php echo $item['price'] ?> &euro;</td>
										</tr>
		<?php }  
			if ($current_cmd_id != 0) {?>
							</tbody>
						</table>
					</td>
				</tr>
		<?php } else { ?>
				<tr><td colspan="3">Pas de commande </td></tr>
		<?php } 
		}?>
		</tbody>
	</table>	

</div>
<?php
include('../partials/footerOther.php');
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

