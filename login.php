<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<?php
  session_start();
  if (isset($_POST['username'])) {

    $username = $_POST['username'];
    $username = (int)$username;

    $db = mysqli_connect('localhost', 'bazaproduse', 'Wasd123!@#', 'bazaproduse');
    $sql = "SELECT * FROM client WHERE ClientId = $username";

    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['ClientId'] == $username && $row['ClientId'] !=0) {
     echo '<script> var clientName = "'.$row["Name"]. '";</script>';
     $_SESSION['ClientId'] = $row['ClientId'];
     $_SESSION['Name'] = $row['Name'];
    }
     else
    {
      $clientName = $row['Name'];  
    }
    mysqli_close($db);
  }
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/typography.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <div class="form-container">
      <form  class="input-form" action="" method="post">
        <h1>Login</h1>

        <div class="input-field-container">
            <span class="input-placeholder">Username</span>
            <input id="username-field" class="input-field" type="text" name="username">
            <span class="border"></span>
        </div>

        <input id="login-button" class="submit-button" type="submit" value="Login">
      </form>
      <script src="js/input.js" charset="utf-8"></script>
    </div>

<script>
window.setInterval(function(){
  $("form.input-form h1").text('hello '+clientName+' :)');
  $("#username-field").replaceWith( "<a href='/shop/'> <button type='button'>Go to homepage</button> </a>" );
  $("#login-button").val('Login as another user');
}, 1000);


</script> 

  </body>
</html>
