<?php
include "../db_connect.php";
$id=$_REQUEST['id'];
$sql="delete from feedback where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
		echo "<script>window.location.href='feedback.php'
		alert('Feedback delete successfully')</script>";	
	}
	else{
		echo "<script>alert('Sorry, try again later')</script>";	
		
	}
?>