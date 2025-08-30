<?php
include 'header.php';
?>

<!-- Content Section -->
<div class="content-section p-4">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Update Employee</h2>
        </div>
<?php
$id=$_REQUEST['id'];
$sql="select * from employee where id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
        <!-- Form for Adding a New Company -->
        <form method="post">
            <!-- Company Name Input -->
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $row['email'];?>" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="tel" class="form-control" name="phone" value="<?php echo $row['phone'];?>" placeholder="Enter phone">
            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" name="city" value="<?php echo $row['city'];?>" placeholder="Enter city">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" value="<?php echo $row['address'];?>" placeholder="Enter address">
            </div>

            <!-- Save Button -->
            <button type="submit" name="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update
            </button>
        </form>
    </div>
</div>
</div>


<?php
include 'footer.php';
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
    $password=$_POST['password'];
	$phone=$_POST['phone'];
	$city=$_POST['city'];
	$address=$_POST['address'];
	$sql="update employee set name='$name', email='$email', phone='$phone', password='$password', city='$city', address='$address' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='employee.php'
		alert('Employee updated successfully')</script>";	
	}
	else{
		echo "<script>alert('Sorry, try again later')</script>";	
		
	}
}
?>