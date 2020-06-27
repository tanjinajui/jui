<?php
function insert_category(){
	global $connect;
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
}

// View all Category in Our Category Listing Page
function view_all_category(){
	global $connect;
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
      <!--<td><?php //echo $cat_id; ?></td>-->
			<td>
			<div class="btn-group">
				<a href="all-categories.php?update=<?php echo $cat_id;?>" class="btn btn-primary btn-sm">Update</a>
				<a href="all-categories.php?delete=<?php echo $cat_id;?>" class="btn btn-danger btn-sm">Delete</a>	
			</div>
			</td>
		</tr>
	<?php
	}
}

// Delete Category From The Category Page
function delete_category(){
global $connect;
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
}
?>