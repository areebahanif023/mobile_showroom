<?php
include "../db_connect.php";
$id=$_REQUEST['id'];
$sql="delete from product where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
		echo "<script>window.location.href='mobile.php'
		alert('Mobile delete successfully')</script>";	
	}
	else{
		echo "<script>alert('Sorry, try again later')</script>";	
		
	}
?>