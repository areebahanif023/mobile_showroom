<?php
include_once "header.php";
$id=$_REQUEST['id'];
$sql="select mobile.*, cat_name, company_name from mobile INNER JOIN company on company.id=mobile.company_id INNER JOIN category on category.id=mobile.cat_id  where mobile.id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$visitor=$row['visitor']+1;
$sql="update mobile set visitor='$visitor' where id='$id'";
$result=mysqli_query($con,$sql);
?>
<!-- Content Section for Product Detail Page -->
<div class="content-section py-4">
    <div class="container">
        <!-- Product Detail Section -->
        <div class="row pt-5">
            <!-- Product Image Section -->
            <div class="col-md-6 text-center">
                <a href="" data-toggle="modal" data-target="#imageModal" title="View mobie pictures"><img src="image/<?php echo $row['image'];?>" alt="Product Image" class="img-fluid" style="max-width: 100%;"></a>
            </div>
            
            <!-- Product Info Section -->
            <div class="col-md-6">
                <h2><?php echo $row['pro_name'];?></h2>
                <p class="text-muted">Category: <span class="font-weight-bold"><?php echo $row['cat_name'];?></span></p>
                <p class="text-muted">Brand: <span class="font-weight-bold"><?php echo $row['company_name'];?></span></p>
                <p>Price: 
                    <span class="text-danger font-weight-bold">Rs. <?php echo number_format($row['price']);?></span>
                    <span class="text-success">Rs. <?php echo number_format($row['discount']);?> Off</span>
                </p>
                <p>Availability: <span class="text-success"><?php echo $row['available'];?> In Stock</span></p>
                <p class="text-muted text-sm">Operating System: <span class="font-weight-bold"><?php echo $row['operating_system'];?></span></p>
                <p class="text-muted text-sm">Screen Size: <span class="font-weight-bold"><?php echo $row['screen_size'];?></span></p>
                <p class="text-muted text-sm">Internal Memory: <span class="font-weight-bold"><?php echo $row['internal_memory'];?></span></p>
                <p class="text-muted text-sm">RAM: <span class="font-weight-bold"><?php echo $row['ram'];?></span></p>
                <p class="text-muted text-sm">Battery: <span class="font-weight-bold"><?php echo $row['battery'];?></span></p>
                <p class="text-muted text-sm">Front Camera: <span class="font-weight-bold"><?php echo $row['front_camera'];?></span></p>
                <p class="text-muted text-sm">Back Camera: <span class="font-weight-bold"><?php echo $row['back_camera'];?></span></p>
                <!-- Add to Cart Section -->
                <div class="add-to-cart-section mt-4 mb-4">
                <form method="post" action="add_to_cart.php?action=add&id=<?php echo $row['id'];?>">
                <input type="hidden" name="hidden_image" value="<?php echo $row['image'];?>">
                <input type="hidden" name="hidden_name" value="<?php echo $row['pro_name'];?>">
                <input type="hidden" name="hidden_price" value="<?php echo $row['price'];?>">
                <input type="hidden" name="quantity" value="1">
                    <button type="submit" name="add_to_cart" class="btn btn-primary">
                        <i class="fa fa-cart-plus"></i> Add to Cart
                    </button>
                    <a href="compare.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-success ml-2">
                        <i class="fa fa-exchange"></i> Compare
                    </button></a>
                 </form>
                </div>
                
            </div>
        </div>
       </div>
       
       <div class="bg-light mt-4">
       		<div class="container-fluid">
            	<div class="row">
                	<div class="col-md-3 pt-4 pb-2 text-center">
                    	<img src="image/display-icon.svg" height="90px;"><br>
                        <?php echo $row['screen_size'];?>
                        <p class="text-sm text-muted">Display</p>
                    </div>
                    <div class="col-md-3 pt-4 pb-2 text-center">
                    	<img src="image/ram-icon.svg" height="90px;"><br>
                        <?php echo $row['ram'];?>
                        <p class="text-sm text-muted">RAM</p>
                    </div>
                    <div class="col-md-3 pt-4 pb-2 text-center">
                    	<img src="image/battery-icon.svg" height="90px;"><br>
                        <?php echo $row['battery'];?>
                        <p class="text-sm text-muted">Battery</p>
                    </div>
                    <div class="col-md-3 pt-4 pb-2 text-center">
                    	<img src="image/backcamera-icon.svg" height="90px;"><br>
                        <?php echo $row['back_camera'];?>
                        <p class="text-sm text-muted">Back Camera</p>
                    </div>
                    <div class="col-md-6 m-auto">
                    	<div class="card mb-5">
                        	<div class="card-body">
                            	<pre class="text-justify pre-text"><?php echo $row['description'];?></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
       
       
       <main class="products-section">
        <div class="container">
            <div class="text-center mb-5">
                <h4>Similar mobiles to <?php echo $row['pro_name'];?></h4>
            </div>

            <div class="row">
            <?php
			$sql1="select * from mobile where (internal_memory='".$row['internal_memory']."' OR ram='".$row['ram']."' OR battery='".$row['battery']."' OR front_camera='".$row['front_camera']."' OR back_camera='".$row['back_camera']."') AND id!='".$row['id']."'";
			$result1=mysqli_query($con,$sql1);
			while($row1=mysqli_fetch_array($result1)){
			?>
                <div class="col-md-3">
                  <a href="mobile_detail.php?id=<?php echo $row1['id'];?>" class="text-dark text-decoration-none">
                    <div class="card product-card bg-light">
                        <img src="image/<?php echo $row1['image'];?>" class="card-img-top" alt="Product 1">
                        <div class="card-body text-center">
                            <h6 class="card-title font-weight-bold"><?php echo $row1['pro_name'];?></h6>
                            <p class="card-text">Rs. <?php echo number_format($row1['price']);?></p>
</form>
                        </div>
                    </div>
                  </a>
                </div>
            <?php } ?>
            </div>
        </div>
    </main>
       
       
     <div class="container">

        <!-- Customer Review Section -->
        <hr>
        <div class="row">
        	<div class="col-md-6">
                <h3>Customer Reviews</h3>
            <div class="reviews-section">
                <!-- Review 1 -->
                <?php
                $sql1="select name, rating, review, time, date from feedback INNER JOIN user on user.id=feedback.user_id where pro_id='$id'";
				$result1=mysqli_query($con,$sql1);
				if(mysqli_num_rows($result1)>0){
				$totalreview=mysqli_num_rows($result1);
				while($row1=mysqli_fetch_array($result1)){
				?>
                <div class="review my-4">
                    <h5><?php echo $row1['name'];?> <small class="text-muted">- <?php echo date('h:i A',strtotime($row1['time']))." ".date('d M, Y',strtotime($row1['date']));?></small></h5>
                    <div class="rating mb-2">
                    <?php
					for($j=1;$j<=$row1['rating'];$j++){
						echo '<span class="text-warning"><i class="fa fa-star pr-1"></i></span>';
					}
					for($k=1;$k<=(5-$row1['rating']);$k++){
						echo '<span class="text-dark"><i class="fa fa-star pr-1"></i></span>';
					}
					?>
                    </div>
                    <p><?php echo $row1['review'];?></p>
                </div>
    			<?php } } else{ echo 'No review available';  }?>

            </div>
    
            <!-- Add a Review Form -->
            </div>
            <div class="col-md-6">
                 <h4>Write a Review</h4>
                 <?php
				 $name="";
				 $email="";
				 if(isset($_SESSION['user'])){
					$name=$user['name'];
				 	$email=$user['email'];
				}
				 ?>
            <form method="post">
                <div class="form-group">
                    <label for="reviewerName">Your Name</label>
                    <input type="text" class="form-control" value="<?php echo $name;?>" id="reviewerName" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="reviewerEmail">Your Email</label>
                    <input type="email" class="form-control" value="<?php echo $email;?>" id="reviewerEmail" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="reviewRating">Rating</label>
                    <select class="form-control" name="rating" id="reviewRating">
                        <option value="5">5 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="2">2 Stars</option>
                        <option value="1">1 Star</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="reviewText">Your Review</label>
                    <textarea class="form-control" name="review" id="reviewText" rows="4" placeholder="Write your review here"></textarea>
                </div>
                <?php
				$disabled="";
				if(!isset($_SESSION['user'])){
					$disabled="disabled";	
				}
				?>
                <button type="submit" name="submit" <?php echo $disabled;?> class="btn btn-primary">
                    <i class="fa fa-paper-plane"></i> Submit Review
                </button>
            </form>
            </div>
        </div>
        
       
    </div>
</div>

<!-- Modal for Full-Screen Image -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="image/<?php echo $row['image'];?>" class="d-block w-100" alt="...">
            </div>
            <?php
			$sql1="select * from mobile_images where mobile_id='$id'";
			$result1=mysqli_query($con,$sql1);
			while($row1=mysqli_fetch_array($result1)){
			?>
            <div class="carousel-item">
              <img src="image/<?php echo $row1['image'];?>" class="d-block w-100" alt="...">
            </div>
            <?php } ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include_once "footer.php";
if(isset($_POST['submit'])){
	$rating=$_POST['rating'];
	$review=$_POST['review'];
	$time=date('h:i:s');
	$date=date('Y-m-d');
	
	$sql="select * from feedback where user_id='".$user['id']."' AND pro_id='$id'";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0){
		echo "<script>alert('You already rate this product')</script>";
	}
	else{
		$sql="insert into feedback values('','".$user['id']."','$id','$rating','$time','$date','$review')";
		$result=mysqli_query($con,$sql);
		if($result){
			echo "<script>window.location.href='mobile_detail.php?id=".$id."'
			alert('Feedback sent successfully')</script>";
		}
		else{
			echo "<script>alert('sorry')</script>";
		}
	}	
}
?>