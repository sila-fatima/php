<?php
include("aside.php");
include("connection.php");
?>
<!-- End of Topbar -->
<!-- Begin Page Content -->
<?php
if (isset($_GET['upd_id'])) {
    $upd_id = $_GET['upd_id'];
    $query = mysqli_query($con, "Select * FROM `product` WHERE Id = $upd_id");
    $showdata = mysqli_fetch_array($query);
}
?>
<div class="container-fluid">
    <form method='post' enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">Product Name</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="p-name" value='<?php echo "$showdata[1]"; ?>'
                    id="inputName" placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">QUANTITY</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="qty" value="<?php echo $showdata[2]; ?>" id="inputName"
                    placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">PRICE</label>
            <div class="col-sm-1-12">
                <input type="text" class="form-control" name="price" value="<?php echo $showdata[3]; ?>" id="inputName"
                    placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-sm-1-12 col-form-label">Image</label>
            <div class="col-sm-1-12">
                <img src="img/<?php echo $showdata[4]; ?>" class="col-lg-2 col-md-4 col-sm-6 col-12"
                    style="height:150px;float:left;" alt="">
                <input type="file" class="form-control  col-lg-10 col-md-8 col-sm-6 col-12" name="p-img" id="inputName"
                    placeholder="">
            </div>
        </div>
             <select name='cat' id=''>
                        <option  Selected>Chose Category</option>
                        <?php
                        $dynamic_dropdown_query = mysqli_query($con, 'SELECT * FROM `categories`');
                        while ($dynamic_dropdown_fetch = mysqli_fetch_array($dynamic_dropdown_query)) {
                        ?>
                            <option value='<?php echo $dynamic_dropdown_fetch[0] ?>'><?php echo $dynamic_dropdown_fetch[1] ?></option>
                        <?php
                        } ?>
                    </select>

        <div class="form-group">
            <div>
                <button type="submit" name="update" class="btn btn-primary mt-3">Update</button>
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
    $upd_name = $_POST['p-name'];
    $upd_qty = $_POST['qty'];
    $upd_price = $_POST['price'];
    $upd_catId = $_POST['cat'];
    if (!empty($_FILES['p-img']['tmp_name'])) {
        $upd_Imagetmpname = $_FILES['p-img']['tmp_name'];
        $upd_ImageOrgname = $_FILES['p-img']['name'];
        $img_path = 'img/' . $upd_ImageOrgname;
        $extension = pathinfo($upd_ImageOrgname, PATHINFO_EXTENSION);
        if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {
            $uploader = move_uploaded_file($upd_Imagetmpname, $img_path);
            if ($uploader) {
                mysqli_query($con, "UPDATE `product` SET `name`='$upd_name',`quantity`='$upd_qty',`price`='$upd_price',`image`='$upd_ImageOrgname',`cat_id`='$upd_catId'  WHERE Id =$upd_id");
                echo "<script>alert('Updated Sucessfully')
        location.assign('view-product.php')
        </script>";
            } else {
                echo "<script>alert('Something Went Wrong')</script>";
            }
        } else {
            echo "<script>alert('Extension doesn`t match')</script>";
        }

    } else {
        mysqli_query($con, "UPDATE `product` SET `name`='$upd_name',`quantity`='$upd_qty',`price`='$upd_price',`cat_id`='$upd_catId'  WHERE Id =$upd_id");
        echo "<script>alert('Updated Sucessfully')
        location.assign('view-product.php')</script>";
    }
}
?>