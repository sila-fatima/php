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
    <?php
    include("connection.php");
    if (isset($_GET['upid'])) {
        $upid=$_GET['upid'];
       $showdataquery=mysqli_query($db_connector,"select * from emp where id = $upid");
       $showdata=mysqli_fetch_array($showdataquery);


    }
    ?>
    <form action=""  method="post">
       <div class="form-group">
        <label for="exampleInputname">name</label>
        <input type="text" class="form-control" id="examplename" name="name" value="<?php echo "$showdata[1]"?>" aria-describedby="nameHelp" >
      </div> 
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php echo "$showdata[2]"?>"  aria-describedby="emailHelp" >
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" value="<?php echo "$showdata[3]"?>"  id="exampleInputPassword1" >
      </div>
      <div class="form-group">
        <label for="exampleInputgender">GENDER</label>
        <select name="gender" id="exampleinputgender" >
  <option value="male" <?php if($showdata[4]=='male') echo "selected"; ?>>Male</option>
  <option value="female" <?php if($showdata[4]=='female') echo "selected"; ?>>Female</option>
</select>
      </div>
      <button type="submit" class="btn btn-primary" name="edit-btn">Edit</button>
    </form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
if (isset($_POST['edit-btn'])) {
   $name=$_POST['name'];
   $email=$_POST['email'];
   $pass=$_POST['password'];
   $gender=$_POST['gender'];
   $query=mysqli_query($db_connector,"UPDATE emp SET `name`='$name',`email`='$email',`PASSWORD`='$pass',`gender`='$gender' WHERE id = $upid");
   if ($query) {
    echo "<script>alert('record updated')
    location.assign('curd(read).php')</script>";
   }
}
?>