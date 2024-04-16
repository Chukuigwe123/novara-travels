<?php 
  require('./inc/db_config.php');
  require('./inc/utils.php');
  $insert_alert = false;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible"content="IE=edge">
      <meta name="viewport"content="width=device-width,initial-scale=1.0">
      <?php require('./inc/header.php')?>
      <title> Nova Travels - Book your next destination </title>
      <script>
          if ( window.history.replaceState ) {
            window.history.replaceState(null, null, window.location.href)
          }
      </script>
  </head>
  <body>
    <?php require('./inc/navbar.php') ?>
    <!--Home Section start-->
    <div class="home">
      <?php 
        if($insert_alert) {
          echo <<<HTML
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Holy guacamole!</strong> You have successully booked a ticket
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
         HTML; 
        };
      ?>
      <div class="content">
          <h5>Welcome To Nova Travels</h5>
          <h1>Visit <span class="changecontent"></span></h1>
          <p> Let's Discover your next trip </p>
      </div>
      <div class="w-75 mx-auto book" id="book">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"> Book a Flight</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Train </button>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <?php require ('./inc/book-form.php') ?>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <?php require ('./inc/book-form.php') ?>
          </div>
            <?php
            if(isset($_POST['book'])) {
                $form_data = filteration($_POST);
                $values = [
                  $form_data['firstname'],
                  $form_data['lastname'],
                  $form_data['dob'],
                  $form_data['nationality'],
                  $form_data['destination'],
                  $form_data['origin'],
                  $form_data['arrival_date'],
                  $form_data['depature_date'],
                  $form_data['booking_type'],
                  $_SESSION['customerId']
                ];
                $create_booking_query = "INSERT INTO booking ( `firstname`, `lastname`, `dob`, `nationality`, `destination`, `origin`, `arrival_date`, `depature_date`, `booking_type`, `cid`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $res = select($create_booking_query, $values, "ssssssssss");
                $insert_alert = true;

            }
            ?>
        </div>
      </div>
    </div>

    <!-- Package Section -->
    <div class="container mx-auto gap-5 py-5 row">
          <div class="card col" style="width: 18rem;">
              <img class="card-img-top" src="./assets/imgs/background.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">New York</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="rate ">


              <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
              </div>
              </div>
              </div>  
          </div>
          <div class="card col" style="width: 18rem;">
              <img class="card-img-top" src="./assets/imgs/france.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"> France </h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                
            <div class="rate ">


                <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                </div>
            </div>
              </div>  
          </div>
          <div class="card col" style="width: 18rem;">
              <img class="card-img-top" src="./assets/imgs/uk.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">United Kingdom</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="rate ">


            <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
            </div>
            </div>
              </div>  
          </div>
    </div>
    <!--Home Section ends-->
    <!-- About Us Section starts-->
  
    <section class="container w-75 mx-auto py-5" id="about-us">
      <h2> About us </h2>
      <div class="d-flex flex-column flex-md-row justify-content-between">
        <div>
          <p> Novara Travels ofefer the best prices for flights and train tickets to you next destination </p>
        </div>
        <div>
          <h2> Popula destination </h2>
      
          </div>
      </div>
    </section>
    <!-- About Us Section ends-->
   <!-- Contact Us Section Starts -->
   <div class="container">
    <div class="row">
      <div class="col-md-12 contact-header">
        <h2>Contact Us</h2>
        <p>Any question or remarks? just leave us a message!</p>
      </div>
      <div class="col-md-5 contact-detail">
        <h2>Contact Information</h2>
        <div class="basic-info">
          <ul>
            <li><i class="fas fa-phone-alt"></i> +234 70459332</li>
            <li><i class="fas fa-envelope"></i>info@gmail.com</li>
            <li><i class="fas fa-map-marker-alt"></i> UK </li>
          </ul>

        </div>
        <div class="social-icons">
          <ul>
            <li><i class="fab fa-facebook"></i></li>
            <li><i class="fab fa-youtube"></i></li>
            <li><i class="fab fa-whatsapp"></i></li>
          </ul>

        </div>

      </div>
      <div class="col-md-7 contact-form">
        <form>
          <div class="row message-form">
            <!--      first col        -->
            <div class="col-md-6">
              <label for="exampleInputEmail1" class="form-label f-label">First Name</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col-md-6"><label for="exampleInputEmail2" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
            </div>
            <!--        second col      -->
            <div class="col-md-6">
              <label for="exampleInputEmail3" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp">
            </div>
      
    
            <!--       third col       -->
            <div class="col-md-12">

              <label for="exampleFormControlTextarea1" class="form-label">Write Messages</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="col-md-12 submit-message">
              <button type="submit" class="btn btn-warning">Send Message</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
    <?php require('./inc/footer.php') ?>
  </body>
  <?php require('./inc/script.php') ?>
</html>