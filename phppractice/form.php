<?php include "header.php";?>


    <?php

    $confirmMessage = "";
      if (isset($_POST['contact-btn'])) {
        
        $fullname = $_POST['fullname'];
        $email    = $_POST['email'];
        $message  = $_POST['message'];

        $confirmMessage = '<div class = "alert alert-success">Hi ' . $fullname . ' Thank You for Contact With Us. Our Executive will contact with you soon.</div>';
      }
    ?>
    
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h1>Contact Us Form</h1>
        <form action="" method="POST">
          <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="fullname" class="form-control" autocomplete="off" required="required">
          </div>

          <div class="form-group">
            <label>Email Address</label>
            <input type="text" name="email" class="form-control" autocomplete="off" required="required">
          </div>

          <div class="form-group">
            <label>Your Message</label>
            <textarea class="form-control" name="message" required="required"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" name="contact-btn">Submit</button>
          </div>
        </form>

        <?php
          echo $confirmMessage;
        ?>
      </div>
    </div>
  </div>
</section>




<?php include "footer.php";?>

