<nav class="navbar navbar-expand-lg" id="navbar">
      <div class="container">
        <a class="navbar-brand" href="/" id="logo"><span>N</span>ova Travels</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <span><i class="fa-solid fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php#about-us">About us </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php#contact-us">Contact Us</a>
            </li>
            <?php 
              if(isset($_SESSION['isAuthenticated'])) {
                echo '<li class="nav-item">
                    <a class="nav-link" href="dashboard.php">My Tickets</a>
                  </li>';
              }
            ?>
          </ul>
          <?php 
              if(!isset($_SESSION['isAuthenticated'])) {
                echo '
                <ul class="d-flex gap-5">
                  <li><a href="login.php" class="btn btn-gray">Login </a></li>
                  <li><a href="signup.php" class="btn">Signup</a></li>
                </ul>
              ';
              } else {
                echo '
                <div class="dropdown"><a href="#"><i class="fa-solid fa-user"></i></a>
                  <a href="./inc/logout.php">Logout </a>
                </div>
                ';
              }
            ?>

        </div>
      </div>
    </nav>