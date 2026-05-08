 <!-- in this page there is the code with the help of which we can connect a relationm between our database and our php file to build a connection you need to write-->
<?php
$db_connector = mysqli_connect("localhost","root","","aptech"); 
// mysqli connect is a fuction which build connection for building connection it require servername,username,password and database name you can see all this information on my sql userinfo  ()
// if ($db_connector) {
//     echo "connection build";
// } else {
//     echo "connection not build";
// }

 ?>
 <!-- if you want you can build the connection on the same working page or in a seprate page -->
  <!-- error_reporting (0) help when you don want the warninhgs to show and .mysqli_connect_error()help to know what an error is comming-->
