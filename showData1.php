<?php
include_once "db_connect.php";
if(isset($_POST['searchRecord'])){
	$keyword=$_POST['searchRecord'];
	$sql="select * from mobile where  pro_name LIKE '%$keyword%' OR operating_system LIKE '%$keyword%' OR screen_size LIKE '%$keyword%' OR internal_memory LIKE '%$keyword%' OR ram LIKE '%$keyword%' OR front_camera LIKE '%$keyword%' OR back_camera LIKE '%$keyword%' OR price LIKE '%$keyword%'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	if(mysqli_num_rows($result)>0){
?>
                            <a href="mobile_detail.php?id=<?php echo $row['id'];?>"><img src="image/<?php echo $row['image'];?>" height="120px;"></a>
                            <p class="pt-2"><?php echo $row['pro_name'];?></p>
                            <p>Rs. <?php echo number_format($row['price']);?></p>
                        
<?php } } ?>