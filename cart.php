<?php
include_once "header.php";
?>
<div class="content-section p-4 pb-5">
    <div class="container-fluid">
        <!-- Cart Table Heading -->
        <h2 class="mb-4 text-center pt-5">Shopping Cart</h2>

        <!-- Shopping Cart Table -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					if(!empty($_SESSION['shopping_cart']))
					{
						$total= 0;
						foreach($_SESSION['shopping_cart'] as $keys => $values)
						{
							?>
                    <tr>
                    	<form method="post" action="add_to_cart.php?action=update&id=<?php echo $values['item_id'];?>">
                        <td><img src="image/<?php echo $values['item_image'];?>" alt="Product Image" class="img-fluid" style="width: 100px;"></td>
                        <td><?php echo $values['item_name'];?></td>
                        <td>Rs. <?php echo number_format($values['item_price']);?></td>
                        <td>
                            <input type="number" name="quantity" class="form-control w-50" value="<?php echo $values['item_quantity'];?>" min="1">
                        </td>
                        <td>Rs. <?php echo number_format($values['item_price']*$values['item_quantity']);?></td>
                        <td>
                            <button type="submit" name="update" class="btn btn-info btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </button>
                            </form>
                            <a href="add_to_cart.php?action=delete&id=<?php echo $values['item_id'];?>"><button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i> Delete
                            </button></a>
                        </td>
                    </tr>
                    <?php
					$total= $total + ($values['item_quantity'] * $values['item_price']);
						}
					}
			
					?>

                    <!-- Repeat above <tr> for more cart items -->
                </tbody>
            </table>
        </div>

        <!-- Total Bill Section -->
        <div class="row mt-4">
            <div class="col-md-6">
            <form method="post">
                <button type="submit" name="clear_cart" class="btn btn-danger">
                    <i class="fa fa-trash-alt"></i> Clear Shopping Cart
                </button>
            </form>
            </div>
            <div class="col-md-6 text-right">
                <h4>Total: <span class="text-danger">Rs. <?php echo number_format($total);?></span></h4>
                <a href="checkout.php"><button class="btn btn-success mt-2">
                    <i class="fa fa-shopping-cart"></i> Proceed to Checkout
                </button></a>
            </div>
        </div>
    </div>
</div>

<?php
include_once "footer.php";
if(isset($_POST['clear_cart'])){
	unset($_SESSION['shopping_cart']);
	echo "<script>window.location.href='cart.php'
		alert('Item deleted successfully')</script>";
}
?>

