<?php
include_once "header.php";
if(!isset($_SESSION['user'])){
	echo "<script>window.location.href='login.php'
		alert('Please login into the system')</script>";
}
$id=$_REQUEST['id'];
$sql="delete from wishlist where id='$id'";
$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='wishlist.php'
			alert('Mobile delete from wishlist successfully')</script>";
	}
	else{
		echo "<script>alert('Sorry try again later')</script>";
	}
?>