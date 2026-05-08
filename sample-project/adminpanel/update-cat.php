<?php
include("aside.php");
include("connection.php");
?>
<!-- End of Topbar -->
<!-- Begin Page Content -->
<?php
if (isset($_GET['upd_id'])) {
    $upd_id = $_GET['upd_id'];
    $query = mysqli_query($con, "Select * FROM `categories` WHERE Id = $upd_id");
    $showdata = mysqli_fetch_array($query);
}
?>
<div class="container-fluid">
    <form method='post' enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">Category Name</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="c-name" value='<?php echo "$showdata[1]"; ?>'
                    id="inputName" placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">Category Description</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="c-desc" value="<?php echo $showdata[2]; ?>" id="inputName"
                    placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">Image</label>
            <div class="col-sm-1-12">
                <img src="img/<?php echo $showdata[3]; ?>" class="col-lg-2 col-md-4 col-sm-6 col-12"
                    style="height:150px;float:left;" alt="">
                <input type="file" class="form-control  col-lg-10 col-md-8 col-sm-6 col-12" name="c-img" id="inputName"
                    placeholder="">
            </div>
        </div>

        <div class="form-group">
            <div>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>



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
if (isset($_POST['update'])) {
    $upd_name = $_POST['c-name'];
    $upd_desc = $_POST['c-desc'];
    if (!empty($_FILES['c-img']['tmp_name'])) {
        $upd_Imagetmpname = $_FILES['c-img']['tmp_name'];
        $upd_ImageOrgname = $_FILES['c-img']['name'];
        $img_path = 'img/' . $upd_ImageOrgname;
        $extension = pathinfo($upd_ImageOrgname, PATHINFO_EXTENSION);
        if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {
            $uploader = move_uploaded_file($upd_Imagetmpname, $img_path);
            if ($uploader) {
                mysqli_query($con, "UPDATE `categories` SET `Category_name`='$upd_name',`Category_description`='$upd_desc',`Image`='$upd_ImageOrgname' WHERE Id =$upd_id");
                echo "<script>alert('Updated Sucessfully')
        location.assign('view-cat.php')
        </script>";
            } else {
                echo "<script>alert('Something Went Wrong')</script>";
            }
        } else {
            echo "<script>alert('Extension doesn`t match')</script>";
        }

    } else {
        mysqli_query($con, "UPDATE `categories` SET `Category_name`='$upd_name',`Category_description`='$upd_desc' WHERE Id =$upd_id");
        echo "<script>alert('Updated Sucessfully')
        location.assign('view-cat.php')</script>";
    }
}
?>