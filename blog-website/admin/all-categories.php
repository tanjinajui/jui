<?php include "includes/header.php"; ?>

      <?php
      //$message = "";
      //Add New Category Function on the Category page--
      insert_category();
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
                  		<input type="submit" name="addCategory", value="Add Category" class="btn btn-primary btn-sm">
                  	</div>
                  </form>
                  <?php //echo $message;?>
                  <!-- Category form End -->
                </div>
              </div>
              <!-- Add New Category Field End -->
              <!-- Update Category Field Start-->
              <?php
              //If Category Needs To Get Update
              if (isset($_GET['update'])) {
                  $cat_id = $_GET['update'];
                  include "includes/updateCategory.php";
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
        					      <!--<th scope="col">Category ID</th>-->
        					      <th scope="col">Action</th>		
        					    </tr>
        					  </thead>
        					  <tbody>
        					  	<?Php
                        //View All Category Codes Are Here---
        					  		view_all_category();
        					  	?>
                    </tbody>
                  </table>
                </div>
              </div> 

          	</div>
          	<!-- View All Category List Ends-->
          </div>

        </div>
        <!--.container-fluid -->

      </div>
      <!-- End of Main Content -->
     
<!-- Delete Category Form the Database -->
<?php delete_category();?>
<?php include "includes/footer.php";?>