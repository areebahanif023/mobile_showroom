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
            <h2>Login to System</h2>
            <form method="post">
                <div class="form-group">
                <span class="form-icon"><i class="fa fa-address-book-o"></i></span>
                <input type="text" name="username" pattern="[A-Za-z0-9]{6,12}" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group">
                <span class="form-icon"><i class="fa fa-lock"></i></span>
                <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" placeholder="Password" required>
            </div>
            <p><a href="forgot_password.php" class="text-danger">Forgot Password?</a></p>
                <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                <div class="form-footer">
                    <p>Don't have an account? <a href="register.php">Sign up</a></p>
                </div>
            </form>
        </div>
 </div>
<?php
include_once "footer.php";
if(isset($_POST['login'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql="select * from user where username='$username' AND password='$password'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	if($row){
		if($row['status']==1)
		{
			$_SESSION['user']=$username;
			echo '<script>window.location.href="index.php";</script>';
		}
		else{
			$_SESSION['error']="Please verify your email address";	
			echo '<script>window.location.href="login.php";</script>';
		}
		
	}
	else{
		$_SESSION['error']="Invalid username or password";	
		echo '<script>window.location.href="login.php";</script>';
	}
	
}
?>

