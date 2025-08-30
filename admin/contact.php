<?php
include 'header.php';
?>

<!-- Content Section for "View Company" Page -->
<div class="content-section p-4">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">View Message</h2>
        </div>
        
        <!-- Table for Viewing Companies -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Sr.</th>
                        <th>Date & Time</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th style="width:12%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$i=1;
					$sql="select * from contact order by id DESC";
					$result=mysqli_query($con,$sql);
					while($row=mysqli_fetch_array($result)){
					?>
                    <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo date('d M, Y h:i A',strtotime($row['datetime']));?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['message'];?></td>
                        <td>
                            <a href="delete_contact.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-sm">
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
