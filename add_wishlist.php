<?php
include_once "header.php";
if(!isset($_SESSION['user'])){
	echo "<script>window.location.href='login.php'
		alert('Please login into the system')</script>";
}
$id=$_REQUEST['id'];
$sql="select * from wishlist where user_id='".$user['id']."' AND mobile_id='$id'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
	echo "<script>window.location.href='index.php'
		alert('Mobile already added to wishlist')</script>";
}
else{
	$sql="insert into wishlist values('','".$user['id']."','$id')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='index.php'
			alert('Mobile added to wishlist successfully')</script>";
	}
	else{
		echo "<script>alert('Sorry try again later')</script>";
	}
}
?>