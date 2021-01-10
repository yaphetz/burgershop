
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="css/typography.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">
  </head>
  <body>
    <div class="container">
      <header>
        <div class="welcome-text">

        </div>
        <?php require 'tmpl/nav.tmpl.html'; ?>
      </header>
      <section class="products">
        <ul class="products-list">
          <?php
 
            $db = mysqli_connect('localhost', 'bazaproduse', 'Wasd123!@#', 'bazaproduse');
            $sql = 'SELECT * FROM product';
            $result = mysqli_query($db, $sql);
            foreach ($result as $row) {
              printf('<li class="product">
                        <a href="products/product.php?id=%s"
                        <span class="product-title">%s</span>
                        <img class="product-image" src="%s"></img>
                        <span class="product-price">%s€</span>
                        </a>
                      </li>',$row['ProductId'], $row['Name'], $row['Picture'], $row['Price']);
            }
            mysqli_close($db);

          ?>
        </ul>
      </section>
      <!-- <section class="showcase">
        <div class="showcase-container">
          <img src="https://placehold.it/250" alt="">
          <h2 class="showcase-title">Product release segment</h2>
        </div>
      </section> -->
      <footer><span class="admin-login"><a href="admin.php">Admin Login</a></span></footer>
    </div>
  </body>
</html>
