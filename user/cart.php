<?php
session_start();


include("../partials/header.php");

?>

<div class="container">
    <h1 class="my-5"><img src="../images/fer.png" alt="fer" id="fer"> Votre panier 
        <?php 
        if(!isset($_SESSION['cart']))
            echo " est vide!"; 
         
        ?>
        </h1>
    <form method="post" action="../control/validProducts.php">
        <table class="table table-hover bg-light">
            <thead>
            <tr>
                <th>Produit</th>
                <th>Référence</th>
                <th>Description</th>
                <th>Taille</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_SESSION['cart'])){

                    $ids = array_keys($_SESSION['cart']);
                    $db = Database::connect();
                    
                    $statement = $db->prepare('SELECT * FROM product WHERE id IN (' . implode(',', $ids) . ')');
                    $statement->execute();

                    while($product = $statement->fetch()){                   

                ?>
                <tr>
                    <td><img class="smallCap"src="../images/<?php echo $product['caption'] ?>"></td>

                    <td><?php echo $product['id'] ?></td>
                    <input type="hidden" name="products_id[]" value="<?php echo $product['id'] ?>">

                    <td><?php echo $product['product_name'] ?></td>
                    <td><?php echo $product['size'] ?></td>

                    <td>1 </td>
                    <input type="hidden" name="quantities[]" value="1">

                    <td><?php echo number_format($product['price'],2,',',' '); ?> &euro;</td>
                    <input type="hidden" name="prices[]" value="<?php echo $product['price'] ?>">

                    <td><a class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                </tr>
            <?php } ?>  

            </tbody>
             
        </table>
        <div class="float-right my-5 p-4 bg-light" id="total">Montant total: <strong>
        <?php
           echo number_format(totalAmount(),2,',',' ');
        ?>
        </strong>&euro;</div>                
    
        <?php 
            if(isset($_SESSION['user'])){ ?>
                <button type="submit" class="btn btn-success">Valider votre achat</button>
        <?php } else { ?>
            
    </form> 
</div>
<br><br>
<div class="container alert alert-info mt-5"><p>Veuillez vous connecter pour valider le panier !</p></div>
<?php }} ?>


