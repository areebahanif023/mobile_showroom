<?php
include_once "header.php";
?>
<div class="body-content">
    <div class="login-container">
    <?php
		if(isset($_SESSION['success'])){
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <strong>Successful!</strong> '.$_SESSION['success'].'
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>';
				unset($_SESSION['success']);
		}
		else if(isset($_SESSION['error'])){
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Warning!</strong> '.$_SESSION['error'].'
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>';
				unset($_SESSION['error']);
		}
	?>
            <h2>Forgot Password</h2>
            <form method="post">
                <div class="form-group">
                <span class="form-icon"><i class="fa fa-address-book-o"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Enter your registered email address" required>
            </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                <div class="form-footer">
                    <p>Already have an account? <a href="login.php">Sign in</a></p>
                </div>
            </form>
        </div>
 </div>
<?php
include_once "function.php";
include_once "footer.php";
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$sql="select * from user where email='$email'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	if($row){
		$user_id = $row['id'];
		$subject= 'Password Reset Request';
		$body= 'Dear '.$row['name'].' You are almost there! here is the link for password reset request. <br>http://localhost/mobile_showroom/reset_password.php?id='.$user_id.'<br>If the given link is not clickable, please copy and paste it into the address bar of your web browser.<br><br>Best Regards,<br><b>Online Mobile Showroom<b>';
		sendEmail($email,$name,$subject,$body);
		$_SESSION['success']="Password reset link sent to your email address";	
		echo '<script>window.location.href="forgot_password.php";</script>';
	}
	else{
		$_SESSION['error']="Invalid email address";	
		echo '<script>window.location.href="forgot_password.php";</script>';
	}
	
}
?>

