<?php
include("aside.php");
include("connection.php");
?>
<!-- End of Topbar -->
                <!-- Begin Page Content -->
              <div class="container-fluid">
<form method='post' enctype="multipart/form-data">
            <div class="form-group">
                <label for="inputName" class="col-sm-1-12 col-form-label">Category Name</label>
                <div class="col-sm-1-12" >
                    <input type="text" class="form-control" name="c-name" id="inputName" placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-sm-1-12 col-form-label">Category Description</label>
                <div class="col-sm-1-12">
                    <input type="text" class="form-control" name="c-desc" id="inputName" placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-sm-1-12 col-form-label">Image</label>
                <div class="col-sm-1-12">
                    <input type="file" class="form-control" name="c-img" id="inputName" placeholder="" required>
                </div>
            </div>

            <div class="form-group">
                <div>
                    <button type="submit" name="add" class="btn btn-primary">Add</button>
                    <a href="view-cat.php" class="btn btn-dark">ViewAll</a>
                </div>
            </div>
        </form>

              </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include("footer.php")
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
if(isset($_POST['add'])){
    $name=$_POST['c-name'];
    $desc=$_POST['c-desc'];
    $imageON=$_FILES['c-img']['name']; //get original name/ path of the file
    $imageTN=$_FILES['c-img']['tmp_name']; // get the image from the temporary folder where file is save with a temporary name
    // when file is uploded it is first save in a temporary folder 
    $imagepath='img/'.$imageON; // the path where the image should be save in php folder
    $extension= PATHINFO($imageON,PATHINFO_EXTENSION); // seperate the extension of file like .png etc
    if ($extension=='png'||$extension=='jpg'||$extension=='jpeg') {
        $phpupload=move_uploaded_file($imageTN,$imagepath); // get the filr from the temporary foder and save it to the php folder
        if ($phpupload) {
            mysqli_query($con,"INSERT INTO categories(Category_name, Category_description, Image) VALUES ('$name','$desc','$imageON')");
            echo "<script>alert('uploaded successfully')</script>";

        } 
        else {
            echo "<script>alert('Something Went Wrong')</script>";
        }
    }
     else {
        echo "<script>alert('Extension doesn`t match')</script>";
    }
     
}
?>