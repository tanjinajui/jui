<?php include "includes/header.php"; ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">View All Users</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Platform Subscriber List</h6>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-hover table-striped">
                        <thead class="thead-dark">
                            <tr>
                              <th scope="col">#Sl.</th>
                              <th scope="col">Email</th>
                              <th scope="col">Subscription Date</th>
                            </tr>
                        </thead>
                        
                        <tbody>

                        <?php
                            $query = "SELECT * FROM subscription_list ORDER BY subs_id DESC";
                            $all_subscriber = mysqli_query($connect, $query);
                            $i = 0;
                            while( $row = mysqli_fetch_assoc($all_subscriber) )
                            {
                                $subs_email = $row['subs_email'];
                                $subs_date = $row['subs_date'];
                                $i++;
                                ?>

                                    <tr>
                                      <th scope="row"><?php echo $i; ?></th>
                                      <td><?php echo $subs_email; ?></td>
                                      <td><?php echo $subs_date; ?></td>
                                    </tr>
                                    
                        <?php    }
                        ?>
                    </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>





    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

<?php include "includes/footer.php"; ?>

      