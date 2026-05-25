<?php
session_start();
session_destroy();
   echo "<script>alert('Logout succesfully')
    location.assign('index.php')</script>";
?>