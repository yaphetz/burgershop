        <?php require 'tmpl/nav.tmpl.html'; 	
		?>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

		<style>
		.top-nav {display:none}
		.btn { width:100%}
		.modal a.close-modal {
    top: 15px;
	right: 15px;
		}
		</style>

<?php
 
 $db = mysqli_connect('localhost', 'bazaproduse', 'Wasd123!@#', 'bazaproduse');
 $sql = "SELECT shoppingcart.ShoppingCartId as `ShoppingCartID`, shoppingcart.ClientId as `ShoppingCartClientId`, shoppingcart.TotalAmount as CartTotalPrice, shoppingcart.HasExpired as ShoppingCartExpiryDate, shoppingcartproduct.ProductId, GROUP_CONCAT(product.ProductId SEPARATOR ',') as ProductID, GROUP_CONCAT(product.Name SEPARATOR ',') as ProductName, GROUP_CONCAT(product.Price SEPARATOR ',') as ProductPrice, GROUP_CONCAT(product.Picture SEPARATOR ',') as ProductPicture, GROUP_CONCAT(product.ExpirationDate SEPARATOR ',') as ProductExpiryDate FROM `shoppingcartproduct` JOIN product on ShoppingCartProduct.ProductId = product.ProductId inner join shoppingcart on shoppingcartproduct.ShoppingCartId = shoppingcart.ShoppingCartId WHERE shoppingcart.ClientId = $ClientId
 GROUP by shoppingcart.ShoppingCartId";
 $result = mysqli_query($db, $sql);
 foreach ($result as $row) {
   printf('
   <div id="cart%s" class="container" >
   <ul class="list-group">
<li class="list-group-item">Shopping cart ID: %s</li>
<li class="list-group-item">Total Price: %s $</li>
<li class="list-group-item">Expiration date: %s</li>
</ul>

<a href="#modalcartwithproducts" rel="modal:open">  <button type="button" class="btn btn-info" >Open Cart</button> </a>
</div>
<br>
',$row['ShoppingCartID'], $row['ShoppingCartID'], $row['CartTotalPrice'], $row['ShoppingCartExpiryDate']);
 }

 foreach ($result as $row) {
	$index = 0;
	echo ('<div id="modalcartwithproducts" class="modal container">');
	for($i=0;$i<3;$i++)
	{
	printf('
	<ul class="list-group">
	<li class="list-group-item">Product Picture: <img height="75px" src="%s"></li>
	<li class="list-group-item">Price: %s</li>
	<li class="list-group-item">Expiration date: %s</li>
	</ul> <br>'
	,(explode(",",$row['ProductPicture']))[$i], (explode(",",$row['ProductPrice']))[$i], (explode(",",$row['ProductExpiryDate'])[$i]));
	}
	echo '</div>';
	$index++;
	//$row['ProductPicture'], $row['ProductPrice'], $row['ProductExpiryDate']);
 }


 mysqli_close($db);

?>

