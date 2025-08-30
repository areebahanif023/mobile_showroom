<?php
include "../db_connect.php";
$id=$_REQUEST['id'];
$sql="delete from mobile where cat_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from category where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
		echo "<script>window.location.href='category.php'
		alert('Category delete successfully')</script>";	
	}
	else{
		echo "<script>alert('Sorry, try again later')</script>";	
		
	}
?>