<?php
include 'header.php';
?>

<!-- Content Section for "View Company" Page -->
<div class="content-section p-4">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">View Feedback</h2>
        </div>
        
        <!-- Table for Viewing Companies -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Sr.</th>
                        <th>Customer</th>
                        <th>Mobile</th>
                        <th>Rating</th>
                        <th>Review</th>
                        <th style="width:12%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$i=1;
					$sql="select feedback.*, user.name, mobile.pro_name from feedback INNER JOIN user on user.id=feedback.user_id INNER JOIN mobile on mobile.id=feedback.pro_id order by feedback.id DESC";
					$result=mysqli_query($con,$sql);
					while($row=mysqli_fetch_array($result)){
					?>
                    <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['pro_name'];?></td>
                        <td><?php echo $row['rating'];?> Star</td>
                        <td><?php echo $row['review'];?></td>
                        <td>
                            <a href="delete_feedback.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-sm">
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
