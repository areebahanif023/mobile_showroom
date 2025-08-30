<?php
include 'header.php';
?>

<!-- Content Section for "Add Company" Page -->
<div class="content-section p-4">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Update Company</h2>
        </div>
			<?php
			$id=$_REQUEST['id'];
			$sql="select * from company where id='$id'";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);
			?>
        <!-- Form for Adding a New Company -->
        <form method="post">
            <!-- Company Name Input -->
            <div class="form-group">
                <label for="companyName">Company Name</label>
                <input type="text" class="form-control" value="<?php echo $row['company_name'];?>" name="companyName" placeholder="Enter company name">
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
	$companyName=$_POST['companyName'];
	$sql="update company set company_name='$companyName' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='company.php'
		alert('Company updated successfully')</script>";	
	}
	else{
		echo "<script>alert('Sorry, try again later')</script>";	
		
	}
}
?>
