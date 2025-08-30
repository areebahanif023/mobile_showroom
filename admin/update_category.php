<?php
include 'header.php';
?>

<!-- Content Section -->
<div class="content-section p-4">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Update Category</h2>
        </div>
			<?php
			$id=$_REQUEST['id'];
			$sql="select * from category where id='$id'";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);
			?>
        <!-- Form for Adding a New Company -->
        <form method="post" enctype="multipart/form-data">
            <!-- Company Name Input -->
            <div class="form-group">
                <label for="categoryName">Category Name</label>
                <input type="text" class="form-control" value="<?php echo $row['cat_name'];?>" name="categoryName" placeholder="Enter company name">
            </div>
            <!-- Category Image Input -->
            <div class="form-group">
                <label>Category Image</label>
                <input type="file" class="form-control" name="img">
            </div>
            <!-- Category Detail Textarea -->
            <div class="form-group">
                <label>Category Description</label>
                <textarea class="form-control" name="description" rows="2" placeholder="Enter category description"><?php echo $row['description'];?></textarea>
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
	$categoryName=$_POST['categoryName'];
	$description=$_POST['description'];
	if(!empty($_FILES['img']['name'])){
		move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
		$img=$_FILES['img']['name'];
	}
	else{
		$img=$row['image'];
	}
	$sql="update category set cat_name='$categoryName', description='$description', image='$img' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='category.php'
		alert('Category updated successfully')</script>";	
	}
	else{
		echo "<script>alert('Sorry, try again later')</script>";	
		
	}
}
?>
