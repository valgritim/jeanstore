<?php
session_start();
	include('../partials/headerAccount.php');


?>

<div class="container-fluid">
	<h1 class="my-5">Gestion des commandes</h1>

	<div id="tabs">
		
		<table class="table table-hover bg-light" id="table_id1">
			<thead>
				<th>Date de commande</th>
				<th>Commande n°</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Montant total de la commande</th>
				<th></th>
			</thead>
			<tbody>
				<?php 
					getOrders();				
				?>			
			</tbody>
		</table>
	</div>
</div>

<?php
	include('../partials/footer.php');
?>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
        $(document).ready( function () {            
            $('#table_id1').DataTable();
        } );

    </script>