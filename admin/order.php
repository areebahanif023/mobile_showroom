<?php
include 'header.php';
?>

<!-- Content Section for "View Company" Page -->
<div class="content-section p-4">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">View Order</h2>
        </div>
        
        <!-- Table for Viewing Companies -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Sr.</th>
                        <th>Date & Time</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Delivery Address</th>
                        <th>Status</th>
                        <th style="width:12%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$i=1;
					$sql="select * from order_master order by id DESC";
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

                    <!-- Repeat above <tr> for more items -->
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>


<?php
include 'footer.php';
?>
