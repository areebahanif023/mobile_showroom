<?php
include 'header.php';
?>

<!-- Content Section -->
<div class="content-section p-4">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Add Employee</h2>
        </div>
        <!-- Form for Adding a New Company -->
        <form method="post" enctype="multipart/form-data">
            <!-- Company Name Input -->
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="tel" class="form-control" name="phone" placeholder="Enter phone">
            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" name="city" placeholder="Enter city">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" placeholder="Enter address">
            </div>

            <!-- Save Button -->
            <button type="submit" name="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save
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
	$sql="insert into employee values('','$name','$email','$password','$phone','$city','$address')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='employee.php'
		alert('Employee added successfully')</script>";	
	}
	else{
		echo "<script>alert('Sorry, try again later')</script>";	
		
	}
}
?>