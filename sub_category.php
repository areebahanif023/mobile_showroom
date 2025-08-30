<?php
include_once "header.php";
?>

    <!-- Main Content -->
    <main class="products-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2>View Products</h2>
                <p>Discover our range of top-quality kitchenware products</p>
            </div>

            <div class="row">
            <?php
			$id=$_REQUEST['id'];
			$sql="select * from product where sub_cat_id='$id'";
			$result=mysqli_query($con,$sql);
			while($row=mysqli_fetch_array($result)){
				$price=$row['price']-$row['discount'];
			?>
                <div class="col-md-4">
                  <a href="proudct_detail.php?id=<?php echo $row['id'];?>" class="text-dark text-decoration-none">
                    <div class="card product-card">
                        <img src="image/<?php echo $row['image'];?>" class="card-img-top" alt="Product 1">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $row['pro_name'];?></h5>
                            <p class="card-text">Rs. <?php echo number_format($row['price']);?> <?php echo($row['discount']>0) ? "<i class='text-danger'> -".$row['discount']." OFF</i>" : "";?></p>
                            <form method="post" action="add_to_cart.php?action=add&id=<?php echo $row['id'];?>">
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="hidden_image" value="<?php echo $row['image'];?>">
                            <input type="hidden" name="hidden_name" value="<?php echo $row['pro_name'];?>">
                            <input type="hidden" name="hidden_price" value="<?php echo $price;?>">
                            <button type="submit" name="add_to_cart" class="btn btn-primary mb-2"> Add to Cart</button>
</form>
                            <span class="text-muted"><?php echo($row['available']>0) ? "In Stock" : "Out of Stock";?></span>
                        </div>
                    </div>
                  </a>
                </div>
            <?php } ?>
            </div>
        </div>
    </main>

<?php
include_once "footer.php";
?>
