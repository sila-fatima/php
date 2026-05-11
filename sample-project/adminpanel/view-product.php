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
                <th>Id</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Image</th>
                <th>CategoryID</th>
            </tr>
        </thead>

        <?php
        $proarray = mysqli_query($con, "SELECT `Id`, `name`, `quantity`, `price`, `image`, `cat_id` FROM `product`");
        foreach ($proarray as $allpro) {
            // it automatically fetch data sa fetch-assoc
        ?>
            <tbody>
                <tr>
                    <td><?php echo $allpro['Id'] ?></td>
                    <td><?php echo $allpro['name'] ?></td>
                    <td><?php echo $allpro['quantity'] ?></td>
                    <td><?php echo $allpro['price'] ?></td>
                    <td><img style="width:150px" src="./img/<?php echo $allpro['image'] ?>" alt=""></td>
                    <td><?php echo $allpro['cat_id'] ?></td>
                    <td><a href="update-product.php ?upd_id=<?php echo $allpro['Id'] ?>" class="btn btn-warning">UPDATE</a>&nbsp<a href="?dlt-id=<?php echo $allpro['Id'] ?>" class="btn btn-danger">DELETE</a></td>
                </tr>
            </tbody>

        <?php
        }
        ?>
    </table>
    <a href="add-product.php" class="btn btn-info" style="margin-bottom:30px;">add</a>


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
    $dltID = $_GET['dlt-id'];

    $dlt_querry = mysqli_query($con, "DELETE FROM `product` WHERE Id = $dltID");
    if ($dlt_querry) {
        echo "<script>alert('product Deleted Successfully')
    location.assign('view-product.php')
    </script>";
    } else {
        echo "<script>alert('Something Went Wrong')</script>";
    }
}
?>