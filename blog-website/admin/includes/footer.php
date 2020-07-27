 <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


  <!-- Data Table JS -->
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- CKEditor Add -->
  <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
    $('#tableSorting').DataTable();
    } );
  </script>

  <script>
    // CKEDITOR.replace('description', {
    //  // height : 300,
    //   //filebrowserUploadUrl:"create-posts.php"

    // });
    var editor = CKEDITOR.replace('post_description',{
      extraPlugins : 'filebrowser',
      filebrowserBrowseUrl: 'create-posts.php',
      filebrowserUploadMethod: "form",
      filebrowserUploadUrl: "upload.php"
    });
  </script>

</body>

</html>

<!-- Server Reload/Redirect- Function ends-->
    <?php
      ob_end_flush();
    ?>