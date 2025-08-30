<?php
include 'header.php';
?>

<!-- Content Section -->
<div class="content-section p-4">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Update Mobile</h2>
        </div>
<?php
$id=$_REQUEST['id'];
$sql="select mobile.*, cat_name, company_name from mobile INNER JOIN company on company.id=mobile.company_id INNER JOIN category ON category.id=mobile.cat_id  where mobile.id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
        <!-- Form for Adding a New Company -->
        <form method="post" enctype="multipart/form-data">
            <!-- Company Name Input -->
            <div class="form-group">
                <label>Mobile Name</label>
                <input type="text" class="form-control" name="pro_name" value="<?php echo $row['pro_name'];?>" placeholder="Enter mobile name">
            </div>
            <div class="form-group">
                <label>Company</label>
                <select name="company" class="form-control" required>
                   <option value="<?php echo $row['company_id'];?>"><?php echo $row['company_name'];?></option>
                    <?php
                    $sql1="select * from company where id!='".$row['company_id']."'";
                    $result1=mysqli_query($con,$sql1);
                    while($row1=mysqli_fetch_array($result1)){
                    ?>
                    <option value="<?php echo $row1['id'];?>"><?php echo $row1['company_name'];?></option>
                    <?php } ?>
                 </select>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category" id="category" class="form-control" required>
                   <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
                    <?php
                    $sql1="select * from category where id!='".$row['cat_id']."'";
                    $result1=mysqli_query($con,$sql1);
                    while($row1=mysqli_fetch_array($result1)){
                    ?>
                    <option value="<?php echo $row1['id'];?>"><?php echo $row1['cat_name'];?></option>
                    <?php } ?>
                 </select>
            </div>
            <div class="form-group">
                <label>Operating System</label>
                <input type="text" class="form-control" name="operating_system" value="<?php echo $row['operating_system'];?>" placeholder="Enter operating system">
            </div>
             <div class="form-group">
                <label>Screen Size</label>
                <input type="text" class="form-control" name="screen_size" value="<?php echo $row['screen_size'];?>" placeholder="Enter screen size">
            </div>
             <div class="form-group">
                <label>Internal Memory</label>
                <input type="text" class="form-control" name="internal_memory" value="<?php echo $row['internal_memory'];?>" placeholder="Enter internal memory">
            </div>
             <div class="form-group">
                <label>RAM</label>
                <input type="text" class="form-control" name="ram" value="<?php echo $row['ram'];?>" placeholder="Enter RAM">
            </div>
             <div class="form-group">
                <label>Battery</label>
                <input type="text" class="form-control" name="battery" value="<?php echo $row['battery'];?>" placeholder="Enter battery">
            </div>
             <div class="form-group">
                <label>Front Camera</label>
                <input type="text" class="form-control" name="front_camera" value="<?php echo $row['front_camera'];?>" placeholder="Enter front camera">
            </div>
             <div class="form-group">
                <label>Back Camera</label>
                <input type="text" class="form-control" name="back_camera" value="<?php echo $row['back_camera'];?>" placeholder="Enter back camera">
            </div>
            <div class="form-group">
                <label>Sale</label>
                <select name="sale" class="form-control" required>
                	<option value="">Sale</option>
                   <option <?php if($row['sale']==1) echo 'selected';?> value="1">Yes</option>
                   <option <?php if($row['sale']==0) echo 'selected';?> value="0">No</option>
                 </select>
            </div>
			<div class="form-group">
                <label>Product Price</label>
                <input type="number" class="form-control" name="price" value="<?php echo $row['price'];?>" placeholder="Enter mobile price">
            </div>
            <div class="form-group">
                <label>Discount</label>
                <input type="number" class="form-control" name="discount" value="<?php echo $row['discount'];?>" placeholder="Enter mobile discount">
            </div>
            <div class="form-group">
                <label>Actual Stock</label>
                <input type="number" class="form-control" name="actual_stock" value="<?php echo $row['actual_stock'];?>" placeholder="Enter mobile actual_stock">
            </div>
            <!-- Company Image Input -->
            <div class="form-group">
                <label>Mobile Image</label>
                <input type="file" class="form-control" name="img">
            </div>

            <!-- Company Detail Textarea -->
            <div class="form-group">
                <label>Mobile Description</label>
                <textarea class="form-control" name="description" id="content" rows="5" placeholder="Enter mobile description"><?php echo $row['description'];?></textarea>
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
	$pro_name=$_POST['pro_name'];
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
	$available=$row['available'];
	if($actual_stock>=$row['actual_stock']){
		$available+=$actual_stock-$row['actual_stock'];
	}
	else{
		$available-=$row['actual_stock']-$actual_stock;
	}
	if(!empty($_FILES['img']['name'])){
		move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
		$img=$_FILES['img']['name'];
	}
	else{
		$img=$row['image'];	
	}
	$sql="update mobile set company_id='$company', cat_id='$category', pro_name='$pro_name', operating_system='$operating_system', screen_size='$screen_size', internal_memory='$internal_memory', ram='$ram', battery='$battery', front_camera='$front_camera', back_camera='$back_camera', sale='$sale', price='$price', discount='$discount', actual_stock='$actual_stock', available='$available', image='$img', description='$description' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='mobile.php'
		alert('Mobile updated successfully')</script>";	
	}
	else{
		echo "<script>alert('Sorry, try again later')</script>";	
		
	}
}
?>