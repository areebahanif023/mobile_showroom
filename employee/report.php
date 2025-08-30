<?php
include 'header.php';
?>

<!-- Content Section for "View Company" Page -->
<div class="content-section p-4">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Generate Report</h2>
        </div>
        <form method="post">
                <div class="row">
                <div class="col-5">
                <label>From</label>
                <input type="date" name="from" max="<?php echo date('Y-m-d');?>" required class="form-control mb-2">
                </div>
                <div class="col-5">
                <label>To</label>
                <input type="date" name="to" max="<?php echo date('Y-m-d');?>" required class="form-control mb-2">
                </div>
                <div class="col-2 py-3">
                <button type="submit" name="submit" class="btn btn-warning mt-3">View Report</button>
                </div>
                </div>
                </form>
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
					if(isset($_POST['submit'])){
						$from=$_POST['from'];
						$to=$_POST['to'];
					}
					else{
						$date=date('Y-m-d');
						$from=$date;
						$to=$date;	
					}
					$sql="select * from order_master where date_format(order_master.date,'%Y-%m-%d') >='$from' AND date_format(order_master.date,'%Y-%m-%d') <='$to' AND (order_master.status='on the way' OR order_master.status='Delivered' OR order_master.status='Received') order by id DESC";
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
