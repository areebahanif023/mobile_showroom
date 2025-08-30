<?php
include_once "header.php";
$id=$_REQUEST['id'];
$sql="select mobile.*, cat_name, company_name from mobile INNER JOIN company on company.id=mobile.company_id INNER JOIN category on category.id=mobile.cat_id  where mobile.id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<div class="content-section py-4">
    <div class="container">
        <div class="row pt-5">
            <div class="col-md-12">
            <h6>Comparison of <?php echo $row['pro_name'];?></h6>
            <div class="card bg-light mb-4">
            	<div class="card-body">
                	<div class="row">
                    	<div class="col-md-3 text-center">
                        	<h5>Comparison of <?php echo $row['pro_name'];?></h5>
                        </div>
                        <div class="col-md-3 text-center">
                        	<a href="mobile_detail.php?id=<?php echo $row['id'];?>"><img src="image/<?php echo $row['image'];?>" height="120px;"></a>
                            <p class="pt-2"><?php echo $row['pro_name'];?></p>
                            <p>Rs. <?php echo number_format($row['price']);?></p>
                        </div>
                        <div class="col-md-3 text-center">
                        	<div id="showData1">
                            
                            </div>
                            <input type="search" id="search1" placeholder="Search..." class="form-control-sm">
                        </div>
                        <div class="col-md-3 text-center">
                        	<div id="showData2">
                            
                            </div>
                            <input type="search" id="search2" placeholder="Search..." class="form-control-sm">
                        </div>
                    </div>
                </div>
            </div>
            <h6><b>General Features</b></h6>
            <div class="card bg-light mt-1">
            	<div class="card-body">
                	<div class="row">
                    	<div class="col-md-3">
                        	<p class="font-weight-bolder text-sm">Operating System</p>
                            <hr>
                            <p class="font-weight-bolder text-sm">Screen Size</p>
                            <hr>
                            <p class="font-weight-bolder text-sm">Internal Memory</p>
                            <hr>
                            <p class="font-weight-bolder text-sm">RAM</p>
                            <hr>
                            <p class="font-weight-bolder text-sm">Battery</p>
                            <hr>
                            <p class="font-weight-bolder text-sm">Front Camera</p>
                            <hr>
                            <p class="font-weight-bolder text-sm">Back Camera</p>
                        </div>
                        <div class="col-md-3">
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
                        </div>
                        <div class="col-md-3">
                            <div id="loadData1">
                            
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div id="loadData2">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            </div>
    
        </div>
       </div>
       

</div>

<?php
include_once "footer.php";
?>
<script>
$(document).ready(function(){
	$('#search1').keyup(function(){
        var searchRecord = $(this).val();
        if(searchRecord){
            $.ajax({
                type:'POST',
                url:'showData1.php',
                data:'searchRecord='+searchRecord,
                success:function(html){
                    $('#showData1').html(html);
                }
            });
        }
    });
	$('#search1').keyup(function(){
        var searchRecord = $(this).val();
        if(searchRecord){
            $.ajax({
                type:'POST',
                url:'searchData1.php',
                data:'searchRecord='+searchRecord,
                success:function(html){
                    $('#loadData1').html(html);
                }
            });
        }
    });
    
});
$(document).ready(function(){
	$('#search2').keyup(function(){
        var searchRecord = $(this).val();
        if(searchRecord){
            $.ajax({
                type:'POST',
                url:'showData2.php',
                data:'searchRecord='+searchRecord,
                success:function(html){
                    $('#showData2').html(html);
                }
            });
        }
    });
	$('#search2').keyup(function(){
        var searchRecord = $(this).val();
        if(searchRecord){
            $.ajax({
                type:'POST',
                url:'searchData2.php',
                data:'searchRecord='+searchRecord,
                success:function(html){
                    $('#loadData2').html(html);
                }
            });
        }
    });
    
});
</script>