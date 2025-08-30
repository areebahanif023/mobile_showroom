<?php
include "../db_connect.php";
$id=$_REQUEST['id'];
$sql="delete from employee where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
		echo "<script>window.location.href='employee.php'
		alert('Employee delete successfully')</script>";	
	}
	else{
		echo "<script>alert('Sorry, try again later')</script>";	
		
	}
?>