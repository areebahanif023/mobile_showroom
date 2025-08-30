<?php
include '../db_connect.php';
if(isset($_SESSION['admin'])){
	header('location:home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin-style.css">
</head>
<body>

    <div class="admin-login-wrapper d-flex justify-content-center align-items-center">
        <div class="login-form-container">
            <div class="login-header text-center mb-4">
                <h2>Admin Login</h2>
                <p class="login-text">Please enter your credentials</p>
            </div>
            <form method="POST">
                <!-- Email Field with Icon -->
                <div class="form-group input-with-icon">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" name="email" class="form-control login-input" id="adminEmail" placeholder="Enter email" required>
                    </div>
                </div>
                <!-- Password Field with Icon -->
                <div class="form-group input-with-icon">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control login-input" id="adminPassword" placeholder="Enter password" required>
                    </div>
                </div>
                <!-- Remember Me Checkbox -->
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                </div>
                <!-- Submit Button -->
                <button type="submit" name="submit" class="btn btn-primary btn-block login-btn">Login</button>
                <div class="text-center mt-2">
                    <a href="#" class="forgot-password-link">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql="select * from admin where email='$email' AND password='$password'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	if($row){
		$_SESSION['admin']=$email;
		header('location:home.php');
	}
	else{
		echo "<script>alert('Invalid email or password')</script>";	
		
	}
}
?>