<?php
include_once "header.php";
if(!isset($_SESSION['user'])){
	echo "<script>window.location.href='login.php'
	alert('Please login into the system')</script>";
}
if($item<1){
	echo "<script>window.location.href='index.php'
	alert('No item available in cart')</script>";
}
?>
<div class="container mt-5 mb-5">
    <div class="row">
        <!-- Checkout Form Section (Left Side) -->
        <div class="col-md-7">
            <h2 class="mb-4">Checkout</h2>
            <form method="post">
                <!-- Name -->
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $user['name'];?>" placeholder="Enter your full name" required>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $user['email'];?>" placeholder="Enter your email" required>
                </div>

                <!-- Contact -->
                <div class="form-group">
                    <label for="contact">Contact Number</label>
                    <input type="tel" class="form-control" name="contact" value="<?php echo $user['phone'];?>" placeholder="Enter your contact number" required>
                </div>

                <!-- Delivery Address -->
                <div class="form-group">
                    <label for="address">Delivery Address</label>
                    <textarea class="form-control" name="address" rows="3" placeholder="Enter your delivery address" required><?php echo $user['address'];?></textarea>
                </div>

                <!-- Payment Method -->
                <div class="form-group">
                    <label for="payment">Payment Method</label>
                    <select class="form-control" name="payment" required>
                        <option value="">Select a payment method</option>
                        <option value="credit">Credit Card</option>
                        <option value="debit">Debit Card</option>
                        <option value="cod">Cash on Delivery</option>
                    </select>
                </div>

                <!-- Order Button -->
                <button type="submit" name="submit" class="btn checkout-btn btn-block mt-3">
                    <i class="fa fa-check"></i> Place Order
                </button>
            </form>
        </div>

        <!-- Cart Summary Section (Right Side) -->
        <div class="col-md-5">
            <h2 class="mb-4">Your Cart</h2>
            <div class="card">
                <div class="card-body">
                    <?php
					if(!empty($_SESSION['shopping_cart']))
					{
						$total= 0;
						foreach($_SESSION['shopping_cart'] as $keys => $values)
						{
					?>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <img src="image/<?php echo $values['item_image'];?>" alt="Product Image" class="img-fluid" style="width: 60px;">
                        <div>
                            <p class="mb-0"><?php echo $values['item_name'];?></p>
                            <small>Price: <?php echo number_format($values['item_price']);?></small>
                        </div>
                        <span>Rs. <?php echo number_format($values['item_price']*$values['item_quantity']);?></span>
                    </div>
                    <!-- Total Bill -->
                    <hr>
                    <?php
					$total= $total + ($values['item_quantity'] * $values['item_price']);
					
						}
					}
					?>
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Total:</h5>
                        <h5 class="text-danger"><?php echo number_format($total);?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once "footer.php";
include_once "function.php";
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$address=$_POST['address'];
	$payment=$_POST['payment'];
	$time=date('h:i:s');
	$date=date('Y-m-d');

	$sql="insert into order_master values('','".$user['id']."','$name','$email','$contact','$address','$payment','$time','$date','Pending')";
	$result=mysqli_query($con,$sql);
	$order_id=mysqli_insert_id($con);
	foreach($_SESSION['shopping_cart'] as $keys => $values)
		{
			mysqli_query($con,"insert into order_detail values('','$order_id','".$values['item_id']."','".$values['item_name']."','".$values['item_price']."','".$values['item_quantity']."')");
			$item_id=$values['item_id'];
			$qty=$values['item_quantity'];
			$sql="select * from mobile where id='$item_id'";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);
			$available=$row['available']-$qty;
			mysqli_query($con,"update mobile set available='$available' where id='$item_id'");
		}
	unset($_SESSION['shopping_cart']);
	$subject= 'Order Place Successfully';
	$body= 'Thank Your for your ordering with <b>Online Mobile Showroom</b><br>Dear '.$name.' You are almost there! Your total bill is '.$total.' and Order id: '.$order_id.' <br><br>Best Regards,<br><b>Online Mobile Showroom<b>';
		if(sendEmail($email,$name,$subject,$body)){
		echo "<script>window.location.href='index.php'
		alert('Order place successfully')</script>";
	}
	else{
		echo "<script>alert('sorry')</script>";
	}	
}
?>