<?php
include("aside.php");
include("connection.php");
?>
<!-- End of Topbar -->
                <!-- Begin Page Content -->
              <div class="container-fluid">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Category-Id</th>
                            <th>Category-Name</th>
                            <th>Category-Description</th>
                            <th>Category-Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                   
                        <?php
                        $catarray=mysqli_query($con,"SELECT * FROM `categories`");
                        foreach($catarray as $allcat){
                            // it automatically fetch data sa fetch-assoc
                            ?>
                      <tbody>
                        <tr>
                            <td><?php echo $allcat['Id']?></td>
                            <td><?php echo $allcat['Category_name']?></td>
                            <td><?php echo $allcat['Category_description']?></td>
                            <td><img style="width:150px"  src="./img/<?php echo $allcat['Image']?>" alt=""></td>
                            <td><a href="update-cat.php ?upd_id=<?php echo $allcat['Id']?>" class="btn btn-warning">UPDATE</a>&nbsp<a href="?dlt-id=<?php echo $allcat['Id']?>" class="btn btn-danger">DELETE</a></td>
                        </tr>
                       </tbody>
                    
                       <?php
                        }
                        ?>
                        </table>
                        <a href="add-cat.php" class="btn btn-info" style="margin-bottom:30px;">add</a>

      
              </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include("footer.php");
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
<?php
if (isset($_GET['dlt-id'])) {
 $dltID=$_GET['dlt-id'];

$dlt_querry=mysqli_query($con,"DELETE FROM `categories` WHERE Id = $dltID");
if ($dlt_querry) {
    echo "<script>alert('Category Deleted Successfully')
    location.assign('view-cat.php')
    </script>";
} else {
       echo "<script>alert('Something Went Wrong')</script>";
}
}
?>