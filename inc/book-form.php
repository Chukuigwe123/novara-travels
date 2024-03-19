<form class="d-flex flex-column flex-md-row gap-4 align-items-center" method="POST">
    <div class="d-flex flex-column">
    <span> From </span>
        <select name="from" id="from-select">
        <option value="">Choose Origin </option>
        <option value="london">London</option>
        <option value="canada">canada</option>
        <option value="usa">usa</option>
        <option value="germany">germany</option>
        </select>
    </div>
    <div class="d-flex flex-column">
    <span> To </span>
        <select name="from" id="from-select">
        <option value="">Choose destination</option>
        <option value="london">London</option>
        <option value="canada">canada</option>
        <option value="usa">usa</option>
        <option value="germany">germany</option>
        </select>
    </div>
    <div>
    <span> Depature </span>
    <input type="date"class="form-control"placeholder="Date"required>
    </div>
    <div>
    <span> Return </span>
    <input type="date"class="form-control"placeholder="Date"required>
    </div>
    <!-- <button type="submit" class="button"> Book Ticket </button> -->
    <button type="button" class="btn btn-primary book-ticket" data-bs-toggle="modal" data-bs-target="#passengerInfoModal">
    Book Ticket
    </button>
    <div class='modal' id="passengerInfoModal" tabindex='-1'>
    <div class='modal-dialog'>
    <?php  
        if(isset($_SESSION['isAuthenticated'])) {
            echo <<<HTML
                <div class='modal-content'>
                <div class='modal-header'>
                <h5 class='modal-title'>Enter Passnger Details </h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>      
                    <div class="d-flex flex-column"> 
                        <span> First Name </span>
                        <input type="text" name="firstname" />
                    </div>
                    <div class="d-flex flex-column"> 
                        <span> Last Name </span>
                        <input type="text" name="lastname" />
                    </div>
                    <div class="d-flex flex-column"> 
                        <span> Date of Birth </span>
                        <input name="dob" />
                    </div>
                    <div class="d-flex flex-column"> 
                        <span> Nationality </span>
                        <input name="nationality" />
                    </div>
                    <div class="d-flex flex-column"> 
                        <span> Ticket Type </span>
                        <input name="booking" />
                    </div>
                </div>
                <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                <button type='button' class='btn btn-primary'>Save Ticket Details</button>
                </div>
                </div>
                HTML;

        } else {
        echo <<<HTML
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5> You need to be logged in to Book a ticket </h5>
                    
                    <a href="login.php" class="btn"> 
                         to Login Page  
                    </a>
                </div>
            </div>
            HTML;
        }
    ?>

    </div>
</div>
</form>
       
