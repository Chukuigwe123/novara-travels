<?php 
  session_start();
  if(!isset($_SESSION['isAuthenticated'])) {
    header('Location: index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View all your tickets</title>
</head>
<body>
    <?php 
            $firstname = $_SESSION['firstname']; 
              if(isset($_SESSION['isAuthenticated'])) {
                echo `<p class="nav-item">
                    welcome, $firstname
                  </p>`;
              }
    ?>
    <div> You are logged In ? </div>
</body>
</html>