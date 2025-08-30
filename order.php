<?php
include_once "header.php";
?>
<div class="content-section p-4 pb-5">
    <div class="container-fluid">
        <!-- Cart Table Heading -->
        <h2 class="mb-4 text-center pt-5">Track Order</h2>

        <!-- Shopping Cart Table -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Sr.</th>
                        <th scope="col">Date & Time</th>
                        <th scope="col">Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Delivery Address</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$i=1;
					$sql="select * from order_master where user_id='".$user['id']."' order by id DESC";
					$result=mysqli_query($con,$sql);
					while($row=mysqli_fetch_array($result)){
					?>
                    <tr>
                    	<td><?php echo $i++;?></td>
                        <td><?php echo date('h:i',strtotime($row['time']))." ".date('d M, Y',strtotime($row['date']));?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['contact'];?></td>
                        <td><?php echo $row['address'];?></td>
                        <td><?php echo $row['status'];?></td>
                        <td>
                            <a href="order_detail.php?id=<?php echo $row['id'];?>"><button class="btn btn-primary btn-sm">
                                <i class="fa fa-eye"></i> Detail
                            </button></a>
                        </td>
                    </tr>
                    <?php
					}
					?>

                    <!-- Repeat above <tr> for more cart items -->
                </tbody>
            </table>
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

