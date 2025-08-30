<?php
include_once "db_connect.php";
$item=0;
if(isset($_SESSION['shopping_cart']))
{
	$item = count($_SESSION['shopping_cart']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Mobile Showroom</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 pt-2 pb-2">
                <a href="index.php"><img src="image/logo.png" height="50"></a>
                <form method="post" action="search.php" class="form-inline float-right mt-2">
                    <input id="searchInput" class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search for mobiles" autocomplete="off">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="search">Search</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Online Mobile Showroom</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <!-- Category Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                        <?php
						$sql="select * from category";
						$result=mysqli_query($con,$sql);
						while($row=mysqli_fetch_array($result)){
						?>
                        <a class="dropdown-item" href="category.php?id=<?php echo $row['id'];?>"><?php echo $row['cat_name'];?></a>
                        <?php } ?>
                        
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Brands
                    </a>
                    <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                        <?php
						$sql="select * from company";
						$result=mysqli_query($con,$sql);
						while($row=mysqli_fetch_array($result)){
						?>
                        <a class="dropdown-item" href="company.php?id=<?php echo $row['id'];?>"><?php echo $row['company_name'];?></a>
                        <?php } ?>
                        
                    </div>
                </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="cartDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cart [<?php echo $item;?>]
                    </a>
                    <div class="dropdown-menu dropdown-menu-right p-3" aria-labelledby="cartDropdown" style="min-width: 300px;">
                        <!-- Cart Item Details -->
                        <?php
						$total= 0;
						if(!empty($_SESSION['shopping_cart']))
						{
							foreach($_SESSION['shopping_cart'] as $keys => $values)
							{
								$total= $total + ($values['item_quantity'] * $values['item_price']);
						?>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="cart-item-detail d-flex">
                                <img src="image/<?php echo $values['item_image'];?>" class="img-fluid rounded" alt="Product Image" style="width: 50px; height: 50px;">
                                <div class="cart-item-info ml-3">
                                    <h6 class="cart-item-title mb-1"><?php echo $values['item_name'];?></h6>
                                    <small class="text-muted">Quantity: <?php echo $values['item_quantity'];?></small> <br>
                                    <small class="text-muted">Price: <?php echo number_format($values['item_price']);?></small>
                                </div>
                            </div>
                            <span class="badge badge-danger">Rs. <?php echo number_format($values['item_price']*$values['item_quantity']);?></span>
                        </div>
                        <hr>
                        <?php }  }?>
                        <!-- More items can go here -->
                        <!-- Total and buttons -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <strong>Total: <?php echo number_format($total);?></strong>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="cart.php" class="btn btn-primary btn-sm">View Cart</a>
                            <a href="checkout.php" class="btn checkout-btn btn-sm">Checkout</a>
                        </div>
                    </div>
                </li>
                    <?php
					if(isset($_SESSION['user'])){
						$sql="select * from user where username='".$_SESSION['user']."'";
						$result=mysqli_query($con,$sql);
						$user=mysqli_fetch_array($result);
					?>
                    <li class="nav-item">
                        <a class="nav-link" href="wishlist.php">Wishlist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="order.php">Track Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <?php 
					}
					else{
					?>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login
                    </a>
                    <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                        <a class="dropdown-item" href="login.php">Customer</a>
                        <a class="dropdown-item" href="employee/index.php">Employee</a>
                        <a class="dropdown-item" href="admin/index.php">Admin</a>  
                    </div>
                </li>
                    <?php } ?>
                    
                </ul>
            </div>
        </div>
    </nav>