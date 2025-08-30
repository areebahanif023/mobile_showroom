<?php
include_once "header.php";
$id=$_REQUEST['id'];
?>
<div class="body-content">

    <div class="login-container">
        <h2>Reset Password</h2>
        <form method="post">
            <div class="form-group">
                <span class="form-icon"><i class="fa fa-lock"></i></span>
                <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group">
                <span class="form-icon"><i class="fa fa-lock"></i></span>
                <input type="password" name="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" placeholder="Confirm Password" required>
            </div>
            <button type="submit" name="reset" class="btn btn-primary">Reset</button>
        </form>
    </div>
 </div>
<?php
include_once "footer.php";
if(isset($_POST['reset'])){
	$password=$_POST['password'];
	$confirm_password=$_POST['confirm_password'];
	if($password!=$confirm_password){
		$_SESSION['error']="Confirm password does not match";
		echo '<script>window.location.href="reset_password.php";</script>';
	}
	else{
		$sql="update user set password='$password' where id='$id'";
		$result=mysqli_query($con,$sql);
		if($result){
			$_SESSION['success']="Password reset successfully";
			echo '<script>window.location.href="login.php";</script>';
		}
		else{
			$_SESSION['error']="Sorry try again later";	
			echo '<script>window.location.href="login.php";</script>';
		}
	}	
}
?>
