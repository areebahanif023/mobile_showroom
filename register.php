<?php
include_once "header.php";
?>
<div class="body-content">

    <div class="register-container">
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
    
        <h2>Create Your Account</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <span class="form-icon"><i class="fa fa-user"></i></span>
                <input type="text" name="first_name" pattern="[a-zA-Z]{3,}" class="form-control" placeholder="First Name" required>
            </div>
            <div class="form-group">
                <span class="form-icon"><i class="fa fa-user"></i></span>
                <input type="text" name="last_name" pattern="[a-zA-Z]{3,}" class="form-control" placeholder="Last Name" required>
            </div>
            <div class="form-group">
                <span class="form-icon"><i class="fa fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
                <span class="form-icon"><i class="fa fa-phone"></i></span>
                <input type="tel" name="phone" pattern="[0-9]{11}" class="form-control" placeholder="Phone Number" required>
            </div>
            <div class="form-group">
                <span class="form-icon"><i class="fa fa-address-book-o"></i></span>
                <input type="text" name="username" pattern="[A-Za-z0-9]{6,12}" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group">
                <span class="form-icon"><i class="fa fa-lock"></i></span>
                <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group">
                <span class="form-icon"><i class="fa fa-lock"></i></span>
                <input type="password" name="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" placeholder="Confirm Password" required>
            </div>
            <div class="form-group">
                <span class="form-icon"><i class="fa fa-building"></i></span>
                <input type="text" name="city" class="form-control" placeholder="City" required>
            </div>
            <div class="form-group">
                <span class="form-icon"><i class="fa fa-map-marker"></i></span>
                <input type="text" name="address" class="form-control" placeholder="Address" required>
            </div>
            <div class="form-group">
                <span class="form-icon"><i class="fa fa-image"></i></span>
                <input type="file" name="img" class="form-control">
            </div>
            <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
            <div class="form-footer">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>
 </div>
<?php
include_once "footer.php";
include_once "function.php";
if(isset($_POST['register'])){
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$name=$first_name." ".$last_name;
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$confirm_password=$_POST['confirm_password'];
	$city=$_POST['city'];
	$address=$_POST['address'];
	if($password!=$confirm_password){
		$_SESSION['error']="Confirm password does not match";
		echo '<script>window.location.href="register.php";</script>';
	}
	else{
		move_uploaded_file($_FILES['img']['tmp_name'],"image/".$_FILES['img']['name']);
		$img=$_FILES['img']['name'];
		$sql="insert into user values('','$name','$email','$phone','$username','$password','$city','$address','$img','0')";
		$result=mysqli_query($con,$sql);
		$user_id = mysqli_insert_id($con);
		$subject= 'Activate Your Account';
		$body= 'Thank Your for registering with <b>Online Mobile Showroom</b><br>Dear '.$name.' You are almost there! Please click on the following link to activate your account to access your account.<br>http://localhost/mobile_showroom/verify.php?id='.$user_id.'<br>If the given link is not clickable, please copy and paste it into the address bar of your web browser.<br><b>Note:</b> You will not be able to login into the system until you have activated it.<br><br>Best Regards,<br><b>Online Mobile Showroom<b>';
		if($result && sendEmail($email,$name,$subject,$body)){
			$_SESSION['success']="Account created successfully";
			echo '<script>window.location.href="register.php";</script>';
		}
		else{
			$_SESSION['error']="Sorry try again later";	
			echo '<script>window.location.href="register.php";</script>';
		}
	}
	
}
?>
