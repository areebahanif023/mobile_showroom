<?php
include_once "db_connect.php";
if(isset($_POST['searchRecord'])){
	$keyword=$_POST['searchRecord'];
	$sql="select * from mobile where  pro_name LIKE '%$keyword%' OR operating_system LIKE '%$keyword%' OR screen_size LIKE '%$keyword%' OR internal_memory LIKE '%$keyword%' OR ram LIKE '%$keyword%' OR front_camera LIKE '%$keyword%' OR back_camera LIKE '%$keyword%' OR price LIKE '%$keyword%'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	if(mysqli_num_rows($result)>0){
?>
                        	<p class="text-sm"><?php echo $row['operating_system'];?></p>
                            <hr>
                            <p class="text-sm"><?php echo $row['screen_size'];?></p>
                            <hr>
                            <p class="text-sm"><?php echo $row['internal_memory'];?></p>
                            <hr>
                            <p class="text-sm"><?php echo $row['ram'];?></p>
                            <hr>
                            <p class="text-sm"><?php echo $row['battery'];?></p>
                            <hr>
                            <p class="text-sm"><?php echo $row['front_camera'];?></p>
                            <hr>
                            <p class="text-sm"><?php echo $row['back_camera'];?></p>
                        
<?php } } ?>