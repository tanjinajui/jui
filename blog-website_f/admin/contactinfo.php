<?php include "includes/header.php"; ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">View All Users</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Manage Contact Information</h6>
                </div>
                <div class="card-body">


                    <?php
                        $query = "SELECT * FROM contacts WHERE c_id = 1";
                        $all_contacts = mysqli_query($connect, $query);
                        while( $row = mysqli_fetch_assoc($all_contacts) )
                        {
                            $address        = $row['address'];
                            $email          = $row['email'];
                            $p_one          = $row['p_one'];
                            $p_two          = $row['p_two'];
                            $office_time    = $row['office_time'];
                            ?>

                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $address; ?>">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>">
                        </div>

                        <div class="form-group">
                            <label>Phone No</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone No." value="<?php echo $p_one; ?>">
                        </div>

                        <div class="form-group">
                            <label>Fax</label>
                            <input type="text" name="fax" class="form-control" placeholder="Fax No." value="<?php echo $p_two; ?>">
                        </div>

                        <div class="form-group">
                            <label>Offie Time</label>
                            <input type="text" name="office_time" class="form-control" placeholder="Office Time" value="<?php echo $office_time; ?>">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="saveContacts" class="btn btn-primary btn-flat btn-sm" value="Save">
                        </div>
                    </form>

                    <?php    }
                    ?>


                    









                    <!-- Update Contact Info -->
                    <?php
                        if ( isset($_POST['saveContacts']) )
                        {
                            $address        = $_POST['address'];
                            $email          = $_POST['email'];
                            $phone          = $_POST['phone'];
                            $fax            = $_POST['fax'];
                            $office_time    = $_POST['office_time'];

                            $sql = "UPDATE contacts SET address='$address', email='$email',   p_one='$phone', p_two='$fax', office_time='$office_time' WHERE c_id = 1";
                            $update_contacts = mysqli_query($connect, $sql);
                            if ( $update_contacts ){
                                header("Location: contactinfo.php");
                            }
                            else{
                                die("Operation Failed." . mysqli_error($connect));
                            }
                        }
                    ?>





                </div>
            </div>
        </div>
    </div>





    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

<?php include "includes/footer.php"; ?>

      