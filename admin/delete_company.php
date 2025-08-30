<?php
include "../db_connect.php";
$id=$_REQUEST['id'];
$sql="delete from mobile where company_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from company where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
		echo "<script>window.location.href='company.php'
		alert('Company delete successfully')</script>";	
	}
	else{
		echo "<script>alert('Sorry, try again later')</script>";	
		
	}
?>