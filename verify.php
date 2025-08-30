<?php
include_once "header.php";
$id=$_REQUEST['id'];
$sql="update user set status='1' where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
	$_SESSION['success']="Account Verified successfully";
	echo '<script>window.location.href="login.php";</script>';
}
else{
	$_SESSION['error']="Sorry account not verified";	
	echo '<script>window.location.href="login.php";</script>';
}
?>