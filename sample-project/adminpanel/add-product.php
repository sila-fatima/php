    <?php
    include('aside.php');
    include('connection.php');
    ?>
    <!-- End of Topbar -->
    <!-- Begin Page Content -->
    <div class='container-fluid'>
        <form method='post' enctype='multipart/form-data'>
            <div class='form-group'>
                <label for='inputName' class='col-sm-1-12 col-form-label'>Product Name</label>
                <div class='col-sm-1-12'>
                    <input type='text' class='form-control' name='p-name' id='inputName' placeholder='' required>
                </div>
            </div>
            <div class='form-group'>
                <label for='inputName' class='col-sm-1-12 col-form-label'>Quantity</label>
                <div class='col-sm-1-12'>
                    <input type='text' class='form-control' name='Qty' id='inputName' placeholder='' required>
                </div>
            </div>
            <div class='form-group'>
                <label for='inputName' class='col-sm-1-12 col-form-label'>Price</label>
                <div class='col-sm-1-12'>
                    <input type='text' class='form-control' name='price' id='inputName' placeholder='' required>
                </div>
            </div>
            <div class='form-group'>
                <label for='inputName' class='col-sm-1-12 col-form-label'>Category</label>
                <div class='col-sm-1-12'>
                    <select name='cat' id=''>
                        <option value='' Selected>Chose Category</option>
                        <?php
                        $dynamic_dropdown_query = mysqli_query($con, 'SELECT * FROM `categories`');
                        while ($dynamic_dropdown_fetch = mysqli_fetch_array($dynamic_dropdown_query)) {
                        ?>
                            <option value='<?php echo $dynamic_dropdown_fetch[0] ?>'><?php echo $dynamic_dropdown_fetch[1] ?></option>
                        <?php
                        } ?>
                    </select>
                </div>
            </div>
            <div class='form-group'>
                <label for='inputName' class='col-sm-1-12 col-form-label'>Image</label>
                <div class='col-sm-1-12'>
                    <input type='file' class='form-control' name='p-img' id='inputName' placeholder='' required>
                </div>
            </div>

            <div class='form-group'>
                <div>
                    <button type='submit' name='add' class='btn btn-primary'>Add</button>
                    <a href='view-product.php' class='btn btn-dark'>ViewAll</a>
                </div>
            </div>
        </form>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?php
    include('footer.php')
    ?>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src='vendor/jquery/jquery.min.js'></script>
    <script src='vendor/bootstrap/js/bootstrap.bundle.min.js'></script>

    <!-- Core plugin JavaScript-->
    <script src='vendor/jquery-easing/jquery.easing.min.js'></script>

    <!-- Custom scripts for all pages-->
    <script src='js/sb-admin-2.min.js'></script>

    <!-- Page level plugins -->
    <script src='vendor/chart.js/Chart.min.js'></script>

    <!-- Page level custom scripts -->
    <script src='js/demo/chart-area-demo.js'></script>
    <script src='js/demo/chart-pie-demo.js'></script>

    </body>

    </html>
    <?php
    if (isset($_POST['add'])) {
        $name = $_POST['p-name'];
        $qty = $_POST['Qty'];
        $price = $_POST['price'];
        $cat_id = $_POST['cat'];
        $imageON = $_FILES['p-img']['name'];
        $imageTN = $_FILES['p-img']['tmp_name'];
        $imagepath = 'img/' . $imageON;
        $extension = PATHINFO($imageON, PATHINFO_EXTENSION);
        if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {
            $phpupload = move_uploaded_file($imageTN, $imagepath);
            if ($phpupload) {
                mysqli_query($con, "INSERT INTO `product`(`name`, `quantity`, `price`, `image`, `cat_id`) VALUES ('$name','$qty','$price','$imageON','$cat_id')");
                echo "<script>alert('Product Added')</script>";
            } else {
                echo "<script>alert('Something Went Wrong')</script>";
            }
        } else {
            echo "<script>alert('Extension doesn`t match')</script>";
        }
    }
    ?>