<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.min.css">
<link rel="stylesheet" href="style.css">
<title>Title</title>
</head>
<body>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">NAME</th>
          <th scope="col">EMAIL</th>
          <th scope="col">PASSWORD</th>
          <th scope="col">Gender</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
       
<?php 
include ("connection.php");
$query= mysqli_query($db_connector,"select * from emp");
while ($showdata=mysqli_fetch_array($query)) {
    echo "
    <tr>
              <td>".$showdata[0]."</td>
              <td>".$showdata[1]."</td>
              <td>".$showdata[2]."</td>
              <td>".$showdata[3]."</td>
              <td>".$showdata[4]."</td>
              <td> <a href='curd(update).php?upid=$showdata[0]' class='btn btn-success'>Update</a>&nbsp;&nbsp<a href='?id=$showdata[0]' class='btn btn-danger'>Delete</a></td>
            </tr>";
};
?>
      </tbody>
    </table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
if(isset($_GET['id'])) {
    $id=$_GET['id'];
    $query2=mysqli_query($db_connector,"delete from emp where id ='$id'");
    if($query2){
        echo"<script>alert('Do you really want to delete the record')</script>";
        echo "<script>location.assign('curd(creat).php')</script>";
    };
    
};
?>