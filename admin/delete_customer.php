<?php
include "../db_connect.php";
$id=$_REQUEST['id'];
$sql="delete from feedback where user_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from order_master where user_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from user where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
		echo "<script>window.location.href='customer.php'
		alert('Customer delete successfully')</script>";	
	}
	else{
		echo "<script>alert('Sorry, try again later')</script>";	
		
	}
?>