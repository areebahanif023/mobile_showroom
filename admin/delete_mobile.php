<?php
include "../db_connect.php";
$id=$_REQUEST['id'];
$sql="delete from mobile_images where mobile_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from mobile where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
		echo "<script>window.location.href='mobile.php'
		alert('Mobile delete successfully')</script>";	
	}
	else{
		echo "<script>alert('Sorry, try again later')</script>";	
		
	}
?>