<?php 
    require('./inc/db_config.php');
    if(!isset($_SESSION['isAuthenticated'])) {
    header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('./inc/header.php')?>
    <title>View all your tickets</title>
</head>
<body>
    <?php require('inc/navbar.php') ?>
    <main class="container mx-auto"> 
        <?php  
            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
                $url = "https://";   
            else  
                $url = "http://";   
            // Append the host(domain name, ip) to the URL.   
            $url.= $_SERVER['HTTP_HOST'];   
            
            // Append the requested resource location to the URL   
            $url.= $_SERVER['REQUEST_URI'];    
            $url_components = parse_url($url);
    
            // Use parse_str() function to parse the
            // string passed via URL
            parse_str($url_components['query'], $params);
                
            // Display result
            $booking_id  = $params['id'];
            $query = "SELECT * from booking WHERE booking_id = ?";
            
            echo " Ticket Number: $booking_id";
            $values = [$booking_id];
            $res = select($query, $values, 's');
          

            if ($res && $res->num_rows > 0) {
                $row = $res->fetch_assoc(); // Fetch the row from the result set
                echo "<p>Origin: " . $row['origin'] . "</p>"; // Outp
                echo "<p>Destination: " . $row['destination'] . "</p>"; // Outp
            } else {
                echo "<p>No booking found for the provided ID.</p>"; // Display a message if no booking found
            }
        ?>   
      </main>
      <?php require('./inc/footer.php') ?>
  </body>
  <?php require('./inc/script.php') ?>
</html>