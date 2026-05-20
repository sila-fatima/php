<?php
session_start();
if (isset($_POST['addtocart'])) {
    if(isset($_SESSION['cart'])){
       $c=count($_SESSION['cart']);
       // count function count total number of rows created in a variable like $_session['cart']
        $_SESSION['cart'][$c]=array("pid"=>$_POST['proid'],"pname"=>$_POST['proname'],"pprice"=>$_POST['proprice'],"pimg"=>$_POST['proimg'],"pqty"=>$_POST['proqty']);
        echo "<script>alert('add to cart ')
        location.assign('index.php')
        </script>";
    }
    else{
        $_SESSION['cart'][0]=array("pid"=>$_POST['proid'],"pname"=>$_POST['proname'],"pprice"=>$_POST['proprice'],"pimg"=>$_POST['proimg'],"pqty"=>$_POST['proqty']);
        echo "<script>alert('add to cart ')
        location.assign('index.php')
        </script>";
    }
  
} 
?>