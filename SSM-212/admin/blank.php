<?php
  include "inc/header.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<?php
  //ternal condition
    //$do = condition ? true : false;
      $do = isset($_GET['do']) ? $_GET['do'] : 'Manage' ;
      if ($do == 'Manage') {
        echo "We will show all the users info here in this section";
      }
      else if ($do == 'Add') {
        echo "We will show Add New User HTML Page in this section";
      }
      else if ($do == 'Insert') {
        echo "We will show Insert New User Data into the Database From this section";
      }
      else if ($do == 'Edit') {
        echo "We will show Edit User HTML Page in this section";
      }
      else if ($do == 'Update') {
        echo "We will show Update Edit User Data into the Database From this section";
      }
      else if ($do == 'Delete') {
        echo "We will Delete User Data From the Database in this section";
      }
?>

<?php
  include "inc/footer.php";
?>
