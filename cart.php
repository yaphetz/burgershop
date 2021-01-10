        <?php require 'tmpl/nav.tmpl.html'; 	
		?>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

		<style>
		.top-nav {display:none}
		.btn { width:100%}
		</style>

<?php
 
 $db = mysqli_connect('localhost', 'bazaproduse', 'Wasd123!@#', 'bazaproduse');
 $sql = "SELECT shoppingcart.ShoppingCartId as `ShoppingCartID`, shoppingcart.ClientId as `ShoppingCartClientId`, shoppingcart.TotalAmount as CartTotalPrice, shoppingcart.HasExpired as ShoppingCartExpiryDate, shoppingcartproduct.ProductId, product.ProductId as ProductID, product.Name as ProductName, product.Price as ProductPrice, product.Picture as ProductPicture, product.ExpirationDate as ProductExpiryDate FROM `shoppingcartproduct` JOIN product on ShoppingCartProduct.ProductId = product.ProductId inner join shoppingcart on shoppingcartproduct.ShoppingCartId = shoppingcart.ShoppingCartId WHERE shoppingcart.ClientId = $ClientId ";
 $result = mysqli_query($db, $sql);
 foreach ($result as $row) {
   printf('
   <div id="cart%s" class="container" >
   <ul class="list-group">
<li class="list-group-item">Shopping cart ID: %s</li>
<li class="list-group-item">Total Price: %s $</li>
<li class="list-group-item">Expiration date: %s</li>
</ul>

<div id="modalcart" class="modal container" >
<ul class="list-group">
<li class="list-group-item">Product Picture: <img height="150px" src="%s"></li>
<li class="list-group-item">Price: %s</li>
<li class="list-group-item">Expiration date: %s</li>
</ul>
</div>

<a href="#modalcart" rel="modal:open">  <button type="button" class="btn btn-info" >Open Cart</button> </a>
</div>
<br>
',$row['ShoppingCartID'], $row['ShoppingCartID'], $row['CartTotalPrice'], $row['ShoppingCartExpiryDate'], $row['ProductPicture'], $row['ProductPrice'], $row['ProductExpiryDate']);
 }
 mysqli_close($db);

?>

