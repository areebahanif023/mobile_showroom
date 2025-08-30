<?php
include 'header.php';
?>

<!-- Content Section for "View Company" Page -->
<div class="content-section p-4">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">View Customer</h2>
        </div>
        
        <!-- Table for Viewing Companies -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Address</th>
                        <th style="width:18%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$i=1;
					$sql="select * from user where status=1";
					$result=mysqli_query($con,$sql);
					while($row=mysqli_fetch_array($result)){
					?>
                    <tr>
                        <td><img src="../image/<?php echo $row['image'];?>" height="100" width="100"></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['phone'];?></td>
                        <td><?php echo $row['city'];?></td>
                        <td><?php echo $row['address'];?></td>
                        <td>
                            <a href="update_customer.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-sm mr-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="delete_customer.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i> Delete
                            </a>
                        </td>
                    </tr>
                    <?php } ?>

                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>


<?php
include 'footer.php';
?>
