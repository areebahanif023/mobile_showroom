<?php
include 'header.php';
?>

<!-- Content Section -->
<div class="content-section p-4">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Add Mobile</h2>
        </div>

        <!-- Form for Adding a New Company -->
        <form method="post" enctype="multipart/form-data">
            <!-- Company Name Input -->
            <div class="form-group">
                <label>Mobile Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter mobile name">
            </div>
            <div class="form-group">
                <label>Company</label>
                <select name="company" class="form-control" required>
                   <option value="">Company</option>
                    <?php
                    $sql="select * from company";
                    $result=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_array($result)){
                    ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['company_name'];?></option>
                    <?php } ?>
                 </select>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category" id="category" class="form-control" required>
                   <option value="">Category</option>
                    <?php
                    $sql="select * from category";
                    $result=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_array($result)){
                    ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['cat_name'];?></option>
                    <?php } ?>
                 </select>
            </div>
            <div class="form-group">
                <label>Operating System</label>
                <input type="text" class="form-control" name="operating_system" placeholder="Enter operating system">
            </div>
             <div class="form-group">
                <label>Screen Size</label>
                <input type="text" class="form-control" name="screen_size" placeholder="Enter screen size">
            </div>
             <div class="form-group">
                <label>Internal Memory</label>
                <input type="text" class="form-control" name="internal_memory" placeholder="Enter internal memory">
            </div>
             <div class="form-group">
                <label>RAM</label>
                <input type="text" class="form-control" name="ram" placeholder="Enter RAM">
            </div>
             <div class="form-group">
                <label>Battery</label>
                <input type="text" class="form-control" name="battery" placeholder="Enter battery">
            </div>
             <div class="form-group">
                <label>Front Camera</label>
                <input type="text" class="form-control" name="front_camera" placeholder="Enter front camera">
            </div>
             <div class="form-group">
                <label>Back Camera</label>
                <input type="text" class="form-control" name="back_camera" placeholder="Enter back camera">
            </div>
            <div class="form-group">
                <label>Sale</label>
                <select name="sale" class="form-control" required>
                   <option value="">Sale</option>
                   <option value="1">Yes</option>
                   <option value="0">No</option>
                 </select>
            </div>
			<div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control" name="price" placeholder="Enter mobile price">
            </div>
            <div class="form-group">
                <label>Discount</label>
                <input type="number" class="form-control" name="discount" placeholder="Enter mobile discount">
            </div>
            <div class="form-group">
                <label>Actual Stock</label>
                <input type="number" class="form-control" name="actual_stock" placeholder="Enter mobile actual stock">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" name="img" multiple>
            </div>
            <div class="form-group">
                <label>Mobile Images</label>
                <input type="file" class="form-control" name="imgs[]" multiple>
            </div>

            <!-- Company Detail Textarea -->
            <div class="form-group">
                <label>Mobile Description</label>
                <textarea class="form-control" name="description" id="content" rows="5" placeholder="Enter mobile description"></textarea>
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
	$company=$_POST['company'];
	$category=$_POST['category'];
	$operating_system=$_POST['operating_system'];
	$screen_size=$_POST['screen_size'];
	$internal_memory=$_POST['internal_memory'];
	$ram=$_POST['ram'];
	$battery=$_POST['battery'];
	$front_camera=$_POST['front_camera'];
	$back_camera=$_POST['back_camera'];
	$sale=$_POST['sale'];
	$price=$_POST['price'];
	$discount=$_POST['discount'];
	$actual_stock=$_POST['actual_stock'];
	$description=$_POST['description'];
	$date=date('Y-m-d');
	move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
	$img=$_FILES['img']['name'];
	$sql="insert into mobile values('','$company','$category','$name','$operating_system','$screen_size','$internal_memory','$ram','$battery','$front_camera','$back_camera','$sale','$price','$discount','$actual_stock','$actual_stock','$date','$img','0','$description')";
	$result=mysqli_query($con,$sql);
	$last_id=mysqli_insert_id($con);
	for($i=0;$i<count($_FILES['imgs']['name']);$i++)
	{
		move_uploaded_file($_FILES['imgs']['tmp_name'][$i],"../image/".$_FILES['imgs']['name'][$i]);
		$imgs=$_FILES['imgs']['name'][$i];
		$sql="insert into mobile_images values('','$last_id','$imgs')";
		$result=mysqli_query($con,$sql);
	}
	if($result){
		echo "<script>window.location.href='mobile.php'
		alert('Mobile added successfully')</script>";	
	}
	else{
		echo "<script>alert('Sorry, try again later')</script>";	
		
	}
}
?>