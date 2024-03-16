<?php 
  session_start()
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible"content="IE=edge">
      <meta name="viewport"content="width=device-width,initial-scale=1.0">
      <?php require('./inc/header.php')?>
      <title> Nova Travels - Book your next destination </title>
      <link rel="stylesheet" href="./assets/css/auth.css">
  </head>
  <body>
      <?php require('./inc/navbar.php') ?>
        <!-- login form section starts-->
        <section class="form-container">
            <form action="signup.php" method="get">
              <h2> Novara Travels </h2>
              <hr />
              <h3> Sign Up </h3>
              <div class="d-flex flex-column"> 
                <span> First Name </span>
                <input type="text" name="firstname" />
                </div>
                <div class="d-flex flex-column"> 
                    <span> Last Name </span>
                    <input type="text" name="lastname" />
                </div>
              <div class="d-flex flex-column"> 
                  <span> Email </span>
                  <input type="email" name="email" />
              </div>
              <div class="d-flex flex-column"> 
                  <span> Password </span>
                  <input type="password" name="password" />
              </div>
              <div class="d-flex flex-column"> 
                <span> Confirm Password </span>
                <input type="password" name="confirm_password" />
            </div>
              <input type="submit" value=" Sign Up" /> 
              <hr />
              <span> Forgot password </span>
  
            </form>
            <div> Already Have an account? <span><a href="./login.php"> Login </a></span></div>
      </section>
      <!-- login from section ends-->
    <?php require('./inc/footer.php') ?>
  </body>
  <?php require('./inc/script.php') ?>
</html>

<?php 
 echo "{$_GET["email"]}"
?>