<?php
include 'header.php';
?>

<!-- Content Section for "View Company" Page -->
<div class="content-section p-4">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">View Mobile</h2>
            <a href="add_mobile.php" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>
        
        <!-- Table for Viewing Companies -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th></th>
                        <th>Category</th>
                        <th>Mobile</th>
                        <th>RAM</th>
                        <th>Battery</th>
                        <th>Camera</th>
                        <th>Sale</th>
                        <th>Price</th>
                        <th>Available</th>
                        <th style="width:18%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$i=1;
					$sql="select mobile.*, category.cat_name from mobile INNER JOIN category on category.id=mobile.cat_id order by mobile.id DESC";
					$result=mysqli_query($con,$sql);
					while($row=mysqli_fetch_array($result)){
					?>
                    <tr>
                        <td><img src="../image/<?php echo $row['image'];?>" height="100" width="100"></td>
                        <td><?php echo $row['cat_name'];?></td>
                        <td><?php echo $row['pro_name'];?></td>
                        <td><?php echo $row['ram'];?></td>
                        <td><?php echo $row['battery'];?></td>
                        <td><?php echo $row['back_camera'];?></td>
                        <td><?php echo($row['sale']==1) ? "Yes" : "No";?></td>
                        <td><?php echo $row['price'];?></td>
                        <td><?php echo $row['available'];?> Product</td>
                        <td>
                            <a href="update_mobile.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-sm mr-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="delete_mobile.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-sm">
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
