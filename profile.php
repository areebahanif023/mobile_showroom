<?php
include_once "header.php";
?>
<div class="body-content">
<div class="container">
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
        <!-- Profile Header -->
        <div class="profile-header">
            <img src="image/<?php echo $user['image'];?>" alt="User Profile Picture">
            <h2><?php echo $user['name'];?></h2>
            <p><?php echo $user['email'];?></p>
        </div>

        <!-- Profile Content -->
        <div class="profile-content">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Personal Information</h5>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <span class="form-icon"><i class="fa fa-user"></i></span>
                <input type="text" name="name" value="<?php echo $user['name'];?>" class="form-control" placeholder="Full Name" required>
            </div>
            <div class="form-group">
                <span class="form-icon"><i class="fa fa-envelope"></i></span>
                <input type="email" name="email" value="<?php echo $user['email'];?>" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
                <span class="form-icon"><i class="fa fa-phone"></i></span>
                <input type="tel" name="phone" value="<?php echo $user['phone'];?>" pattern="[0-9]{11}" class="form-control" placeholder="Phone Number" required>
            </div> 
            <div class="form-group">
                <span class="form-icon"><i class="fa fa-building"></i></span>
                <input type="text" name="city" value="<?php echo $user['city'];?>" class="form-control" placeholder="City" required>
            </div>
            <div class="form-group">
                <span class="form-icon"><i class="fa fa-map-marker"></i></span>
                <input type="text" name="address" value="<?php echo $user['address'];?>" class="form-control" placeholder="Address" required>
            </div>
            <div class="form-group">
                <span class="form-icon"><i class="fa fa-image"></i></span>
                <input type="file" name="img" class="form-control">
            </div>
                        <button type="submit" name="profile" class="btn btn-primary btn-block">Save Changes</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Change Password</h5>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                <span class="form-icon"><i class="fa fa-lock"></i></span>
                <input type="password" name="old_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" placeholder="Current Password" required>
            </div>
                        <div class="form-group">
                            <span class="form-icon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" placeholder="New Password" required>
                        </div>
                        <div class="form-group">
                            <span class="form-icon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" placeholder="Confirm New Password" required>
                        </div>
                        <button type="submit" name="update_password" class="btn btn-primary btn-block">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
 </div>
<?php
include_once "footer.php";
if(isset($_POST['profile'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$city=$_POST['city'];
	$address=$_POST['address'];
	if(!empty($_FILES['img']['name'])){
		move_uploaded_file($_FILES['img']['tmp_name'],"image/".$_FILES['img']['name']);
		$img=$_FILES['img']['name'];
	}
	else{
		$img=$user['image'];
	}
	$sql="update user set name='$name', email='$email', phone='$phone', city='$city', address='$address', image='$img' where id='".$user['id']."'";
	$result=mysqli_query($con,$sql);
	if($result){
		$_SESSION['success']="Profile updated successfully";
		echo '<script>window.location.href="profile.php";</script>';
	}
	else{
		$_SESSION['error']="Sorry try again later";	
		echo '<script>window.location.href="profile.php";</script>';
	}
}
if(isset($_POST['update_password'])){
	$old_password=$_POST['old_password'];
	$password=$_POST['password'];
	$confirm_password=$_POST['confirm_password'];
	if($password!=$confirm_password){
		$_SESSION['error']="Confirm password does not match";
		echo '<script>window.location.href="profile.php";</script>';
	}
	else{
		$sql="select * from user where password='$old_password' AND id='".$user['id']."'";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
		if($row){
			$sql="update user set password='$password' where id='".$user['id']."'";
			$result=mysqli_query($con,$sql);
			if($result){
				$_SESSION['success']="Password updated successfully";
				echo '<script>window.location.href="profile.php";</script>';
			}
			else{
				$_SESSION['error']="Sorry try again later";	
				echo '<script>window.location.href="profile.php";</script>';
			}
		}
		else{
			$_SESSION['error']="Old password incorrect";
			echo '<script>window.location.href="profile.php";</script>';
		}
		
	}
}
?>
