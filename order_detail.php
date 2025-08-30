<?php
include_once "header.php";
?>
<div class="content-section p-4 pb-5">
    <div class="container-fluid">
        <!-- Cart Table Heading -->
        <h2 class="mb-4 text-center pt-5">Order Detail</h2>

        <!-- Shopping Cart Table -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Sr.</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$id=$_REQUEST['id'];
					$total=0;
					$i=1;
					$sql="select * from order_detail where order_id='$id'";
					$result=mysqli_query($con,$sql);
					while($row=mysqli_fetch_array($result)){
						$total+=$row['price']*$row['qty'];
					?>
                    <tr>
                    	<td><?php echo $i++;?></td>
                        <td><?php echo $row['pro_name'];?></td>
                        <td><?php echo number_format($row['price']);?></td>
                        <td><?php echo $row['qty'];?></td>
                        <td><?php echo number_format($row['price']*$row['qty']);?></td>
                    </tr>
                    <?php
					}
					?>
					<tr>
                    <td colspan="4">Total Bill</td>
                    <td><?php echo number_format($total);?></td>
                    </tr>
                    <!-- Repeat above <tr> for more cart items -->
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
		   <?php
              $sql="select * from order_master where id='$id'";
              $result=mysqli_query($con,$sql);
              $row=mysqli_fetch_array($result);
              ?>
           <h2>Order Status:- <?php echo $row['status'];?></h2>
           <div class="row">
              <div class="col-md-4">
                 <form method="post">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <select name="status" required class="form-control mt-3">
                       <option value="">Update order status</option>
                       <option value="Cancel">Cancel</option>
                       <option value="Not Received">Not Received</option>
                       <option value="Received">Received</option>
                    </select>
                    <button type="submit" name="submit" class="btn btn-warning mt-3">Update</button>
                 </form>
              </div>
           </div>
        </div>

    </div>
</div>

<?php
include_once "footer.php";
if(isset($_POST['submit'])){
	$id=$_POST['id'];
	$status=$_POST['status'];
	$date=date('Y-m-d');
	$sql="update order_master set status='$status' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='order.php'
		alert('Order status update successfully')</script>";	
	}
	else{
		echo "<script>alert('Sorry, try again later')</script>";	
		
	}

}
?>

