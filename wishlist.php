<?php
include_once "header.php";
?>
<div class="content-section p-4 pb-5">
    <div class="container-fluid">
        <!-- Cart Table Heading -->
        <h2 class="mb-4 text-center pt-5">Wishlist</h2>

        <!-- Shopping Cart Table -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Sr.</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Internal Memory</th>
                        <th scope="col">RAM</th>
                        <th scope="col">Battery</th>
                        <th scope="col">Camera</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$i=1;
					$sql="select mobile.*, wishlist.id as wishlist_id from mobile INNER JOIN wishlist on mobile.id=wishlist.mobile_id where user_id='".$user['id']."'";
					$result=mysqli_query($con,$sql);
					while($row=mysqli_fetch_array($result)){
					?>
                    <tr>
                    	<td><?php echo $i++;?></td>
                        <td><?php echo $row['pro_name'];?></td>
                        <td><?php echo $row['internal_memory'];?></td>
                        <td><?php echo $row['ram'];?></td>
                        <td><?php echo $row['battery'];?></td>
                        <td><?php echo $row['back_camera'];?></td>
                        <td><?php echo number_format($row['price']);?></td>
                        <td>
                            <a href="mobile_detail.php?id=<?php echo $row['id'];?>"><button class="btn btn-primary btn-sm">
                                <i class="fa fa-eye"></i> Detail
                            </button></a>
                            <a href="delete_wishlist.php?id=<?php echo $row['wishlist_id'];?>"><button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i> Delete
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

