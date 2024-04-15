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
          if (isset($_SESSION['firstname'])) {
            $firstname = $_SESSION['firstname'];
              echo "<p class='nav-item'>
                  Welcome, $firstname
                </p>";
          }        
        
      ?>
            <div> You are logged In </div>
      <a href="index.php#book"> Book Now</a>
        <?php
          $cid = isset($_SESSION['customerId']) ? $_SESSION['customerId'] : '';
          $query = "SELECT booking_id, destination, origin, depature_date, arrival_date, booking_type, transportation_means, c.firstname as customer_firstname, c.lastname as customer_lastname, b.firstname as passenger_firstname, b.lastname as passenger_lastname, dob, nationality from booking b INNER JOIN customer c on b.cid = c.cid WHERE c.cid = ? ";
          $values = [$cid];
          $res = select($query, $values, "s" );
          $res_array = [];
          if ($res->num_rows > 0) {
            echo '<div class="d-flex gap-4 tickets-container">';
            while($row=$res->fetch_assoc()) {
              echo '<div>';
                echo '<div class="card" style="width: 18rem;">';
                  if($row['transportation_means'] === 'FLIGHT'){
                  echo '<img src="./assets/imgs/plane.jpg" class="card-img-top" alt="flight">';
                  } else {
                  echo '<img src="./assets/imgs/train.jpg" class="card-img-top" alt="train">';
                  }
                  echo '<div class="row">';
                    echo '<div class="col fw-bold">';
                    echo 'ORIGIN';
                    echo '</div>';
                    echo '<div class="col fw-bold">';
                    echo 'DESTINATION';
                    echo '</div>';
                  echo '</div>';

                  echo '<div class="row">';
                    echo '<div class="col">';
                    echo $row['origin'];
                    echo '</div>';
                    echo '<div class="col">';
                    echo $row['destination'];
                    echo '</div>';
                  echo '</div>';


                  echo '<div class="row">';
                    echo '<div class="col fw-bold">';
                    echo 'DEPATURE DATE';
                    echo '</div>';
                    echo '<div class="col fw-bold">';
                    echo 'ARRIVAL DATE';
                    echo '</div>';
                  echo '</div>';


                  echo '<div class="row">';
                    echo '<div class="col">';
                    echo $row['depature_date'];
                    echo '</div>';
                    echo '<div class="col">';
                    echo $row['arrival_date'];
                    echo '</div>';
                  echo '</div>';

                  

                  echo '<a href="ticket-detail.php?id="'. $row['booking_id']. '" class="btn btn-primary">Go to Ticket Detail</a>';
                echo '</div';
              echo '</div>';
            }
            echo '</div>';
          }
        ?>

    </main>
    <?php require('./inc/footer.php') ?>
</body>
</html>