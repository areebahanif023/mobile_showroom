<?php
include 'header.php';
?>

        <!-- Content Section -->
        <div class="content-section p-4">
            <div class="container-fluid">
                <div class="row">
                    <!-- Website Statistics -->
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-box bg-info text-white p-3">
                            <i class="fa-solid fa-mobile-screen-button fa-2x"></i>
                            <h4>Total Mobiles</h4>
                            <?php 
							$sql="select * from mobile";
							$result=mysqli_query($con,$sql);
							echo '<p>'.mysqli_num_rows($result).'</p>';
							?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-box bg-success text-white p-3">
                            <i class="fas fa-shopping-cart fa-2x"></i>
                            <h4>Total Orders</h4>
                            <?php 
							$sql="select * from order_master";
							$result=mysqli_query($con,$sql);
							echo '<p>'.mysqli_num_rows($result).'</p>';
							?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-box bg-warning text-white p-3">
                            <i class="fas fa-users fa-2x"></i>
                            <h4>Total Customers</h4>
                            <?php 
							$sql="select * from user";
							$result=mysqli_query($con,$sql);
							echo '<p>'.mysqli_num_rows($result).'</p>';
							?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-box bg-danger text-white p-3">
                            <i class="fas fa-chart-line fa-2x"></i>
                            <h4>Total Sale</h4>
                            <?php 
							$total=0;
							$sql="select * from order_detail";
							$result=mysqli_query($con,$sql);
							while($row=mysqli_fetch_array($result)){
								$total+=$row['price']*$row['qty'];
							}
							echo '<p>Rs. '.number_format($total).'</p>';
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include 'footer.php';
?>
