<?php include "includes/header.php"; ?>

<?php
$message = "";
//Add New Category Codes Are Here--
if (isset($_POST['addCategory'])) {
  $cat_name = $_POST['category'];
  if (empty($cat_name)) 
  {
    $message = '<div class = "alert alert-warning">Category Name Can Not Be Empty.</div>';
  }
  else{
    $query = "INSERT INTO categories (cat_name) VALUES ('$cat_name')";
    $addCategory = mysqli_query ($connect, $query);
    if (!$addCategory) {
      die("Query Failed" . mysqli_error($connect));
    }
    else{
      $message = '<div class = "alert alert-success">Category Name Added Successefully.</div>';
      header("Location: all-categories.php");
    }
  }
}
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

         <div class="row">
         	<div class="col-lg-12">
         		 <!-- Page Heading -->
          		<h3 class="h3 mb-4 text-gray-800">View All Categories</h3>
         	</div>
         </div>

          <div class="row">
          	<div class="col-lg-4">
              <!-- Add New Category Field Start -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Add New Category</h6>
                </div>
                <div class="card-body">
                	<!-- Category form Start -->
                  <form action="" method="POST">
                  	<div class="form-group">
                  		<label for="Category">Add Category Name</label>
                  		<input type="text" name="category" class="form-control" autocomplete="off">
                  	</div>
                  	<div class="form-group">
                  		<input type="submit" name="addCategory", value="Add Category" class="btn btn-primary">
                  	</div>
                  </form>
                  <?php echo $message;?>
                  <!-- Category form End -->
                </div>
              </div>
              <!-- Add New Category Field End -->


              <!-- Update Category Field Start-->
              <?php
              //If Category Needs To Get Update
              if (isset($_GET['update'])) {
                  $cat_id = $_GET['update'];
                  $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                  $select_cat_id =mysqli_query($connect, $query);
                  while ($row = mysqli_fetch_assoc($select_cat_id)) {
                    $cat_id = $row['cat_id'];
                    $cat_name = $row['cat_name'];

                    ?>
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Category</h6>
                </div>
                <div class="card-body">
                  <!-- Category form Start -->
                  <form action="" method="POST">
                    <div class="form-group">
                      <label for="Category">Edit Category Name</label>
                      <input type="text" name="category" class="form-control" value="<?php echo $cat_name; ?>" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <input type="submit" name="editCategory", value="Update Category" class="btn btn-primary">
                    </div>
                  </form>
                  
                  <!-- Category form End -->
                </div>
              </div>
                    <?php
                  }
                }
                ?>
                <!-- Update Category Field End-->
          	</div>
          	<!-- View All Category List Start-->
          	<div class="col-lg-8">

          		<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View All Category</h6>
                </div>
                <div class="card-body">
					<table class="table table-striped">
					  <thead class="thead-dark">
					    <tr>
                <th scope="col">Serial</th>
                <th scope="col">Category Name</th>
					      <th scope="col">Category ID</th>
					      <th scope="col">Action</th>		
					    </tr>
					  </thead>
					  <tbody>
					  	<?Php
                //View All Category Codes Are Here---
					  		$query = "SELECT * FROM categories";
					  		$select_categories = mysqli_query($connect, $query);
                $cat_serial= 0;
					  		while ($row=mysqli_fetch_assoc($select_categories))
					  	    {
                    $cat_serial++;
					  	    	$cat_id   = $row['cat_id'];
					  	    	$cat_name = $row['cat_name'];
					  			?>

					  	<tr>
					      <th scope="row"><?php echo $cat_serial; ?></th>
					      <td><?php echo $cat_name; ?></td>
                <td><?php echo $cat_id; ?></td>

					      <td>
					      	<div class="btn-group">
					      		<a href="all-categories.php?update=<?php echo $cat_id;?>" class="btn btn-primary btn-sm">Update</a>
					      		<a href="all-categories.php?delete=<?php echo $cat_id;?>" class="btn btn-danger btn-sm">Delete</a>	
					      	</div>
					      </td>
					    </tr>

					  	<?php
					  		}
					  	?>
  </tbody>
</table>
                </div>
              </div> 

          	</div>
          	<!-- View All Category List Ends-->
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


<?php

    //To Update the Category Value and Insert into the Database

    if (isset($_POST['editCategory'])) {
      $cat_name = $_POST['category'];
      $query = "UPDATE categories SET cat_name = '$cat_name' WHERE cat_id = '$cat_id'";
      $update_category = mysqli_query($connect, $query);
      if (!$update_category) {
        die ("Query Failed!" . mysqli_error($connect));
      }else{
        header("Location: all-categories.php");
      } 
    }
?>
<?php
//Delete Category Form the Database
if (isset($_GET['delete'])) {
  $the_cat_id = $_GET['delete'];
  $query = "DELETE FROM categories WHERE cat_id = $the_cat_id";
  $delete_category = mysqli_query($connect, $query);
  if (!$delete_category) {
        die ("Query Failed!" . mysqli_error($connect));
      }else{
        header("Location: all-categories.php");
      } 
}
?>
<?php include "includes/footer.php";?>