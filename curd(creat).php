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
<style>body{padding:100px;}</style>
</head>
<body>
    <form action=""  method="post">
       <div class="form-group">
        <label for="exampleInputname">name</label>
        <input type="text" class="form-control" id="examplename" aria-describedby="nameHelp" name="e-name" required>
      </div> 
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="e-email" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="e-password" required>
      </div>
      <div class="form-group">
        <label for="exampleInputgender">GENDER</label>
        <select name="gender" id="exampleinputgender" required >
          <option value="male">male</option>
          <option value="female">Female</option>
        </select>
      </div>
      <a href="curd(read).php" class="btn btn-warning">VIEW ALL</a>
      <button type="submit" class="btn btn-primary" name="submit-btn">Submit</button>
    </form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
include ("connection.php");
?>
<!--  in this way you can link a php file with another php or any other file-->
  <?php
  if (isset($_POST['submit-btn'])) {
    $name= $_POST['e-name'];
    $email= $_POST['e-email'];
    $pass= $_POST['e-password'];
    $gender= $_POST['gender'];
    $query_inserter= mysqli_query($db_connector,"insert into emp(name,email,password,gender) values('$name','$email','$pass','$gender')");
    if ($query_inserter) {echo"<script>alert('information added')</script>";
    } else {
      echo"<script>alert('information is not added')</script>";
    
    }
    
}
  

  ?>