<?php
session_start();
require("checksession.php");
include_once('connection.php');

// to destroy session
$now=time();
if($now>$_SESSION['end']){
	session_unset();
	session_destroy();
	header('location:everyones view.php');
	exit();
}

$name=$_SESSION['username'];
$query="select p.product_name,p.pid,p.brand_name,p.category_name,p.product_price,r.Date from products p join cart r on (p.pid=r.pid) where r.user_name='$name' and r.flag='0' ";

$result=mysqli_query($con,$query);
$sum = 0;
?>
