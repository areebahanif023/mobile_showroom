<?php
include_once "header.php";
?>
<style>
.owl-carousel .card:hover {
    transform: translateY(-5px);
    transition: all 0.3s ease-in-out;
    box-shadow: 0 8px 16px rgba(0,0,0,0.15);
}
</style>

<!-- Carousel Start -->
<div id="mobileShowroomCarousel" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#mobileShowroomCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#mobileShowroomCarousel" data-slide-to="1"></li>
    <li data-target="#mobileShowroomCarousel" data-slide-to="2"></li>
    <li data-target="#mobileShowroomCarousel" data-slide-to="3"></li>
  </ol>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 rounded shadow" src="image/s1.png" alt="Explore Mobile Models" style="height:500px;object-fit: cover;">
      <div class="carousel-caption d-none d-md-block animate__animated animate__fadeInDown">
        <h3>Explore Latest Mobile Models</h3>
        <p>Discover and compare top flagship smartphones all in one place.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 rounded shadow-lg" src="image/s2.png" alt="Detailed Specifications" style="height:500px;object-fit: cover;">
      <div class="carousel-caption d-none d-md-block animate__animated animate__zoomIn">
        <h3>Detailed Specifications</h3>
        <p>Get all technical features before making your decision.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 rounded border" src="image/s3.png" alt="Compare and Choose" style="height:500px;object-fit: cover;">
      <div class="carousel-caption d-none d-md-block animate__animated animate__fadeInUp">
        <h3>Compare and Choose</h3>
        <p>Compare up to 3 phones side by side with highlighted features.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 rounded-top shadow-sm" src="image/s4.jpeg" alt="Customer Reviews" style="height:500px;object-fit: cover;">
      <div class="carousel-caption d-none d-md-block animate__animated animate__bounceIn">
        <h3>Customer Reviews</h3>
        <p>Read genuine reviews from verified users before buying.</p>
      </div>
    </div>
  </div>

  <a class="carousel-control-prev" href="#mobileShowroomCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  </a>
  <a class="carousel-control-next" href="#mobileShowroomCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
  </a>
</div>
<!-- Carousel End -->

    <!-- Main Content -->
    <section class="category-section py-5">
    <div class="container">
        <h2 class="text-center mb-4">Explore Categories</h2>
        <p class="text-center mb-5">Browse our range of mobile categories, from flagship models to budget-friendly options. Find the perfect match for your needs and budget.</p>
        <div class="row">
        <?php
			$sql="select * from category";
			$result=mysqli_query($con,$sql);
			while($row=mysqli_fetch_array($result)){
			?>
            <div class="col-md-4 mb-4">
            <a href="category.php?id=<?php echo $row['id'];?>" style="text-decoration:none;">
                <div class="category-card">
                    <img src="image/<?php echo $row['image'];?>" alt="" class="card-img-top" height="300">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $row['cat_name'];?></h5>
                        <p class="card-text text-justify"><?php echo $row['description'];?></p>
                    </div>
                </div>
               </a>
            </div>
           <?php } ?>
           
            
        </div>
    </div>
</section>

    <main class="products-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Discover Our Latest Mobile Collection</h2>
                <p>Browse through our curated selection of mobile phones</p>
            </div>
            <div id="loadData" class="mb-5">
                <div class="owl-carousel owl-theme">
                    <?php
                    $sql = "SELECT * FROM mobile";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $price = $row['price'] - $row['discount'];
                    ?>
                    <div class="item">
                        <a href="mobile_detail.php?id=<?php echo $row['id']; ?>" class="text-dark text-decoration-none">
                            <div class="card product-card bg-light shadow-sm rounded-3">
                                <img src="image/<?php echo $row['image']; ?>" class="card-img-top p-3" style="height: 220px; object-fit: contain;" alt="Mobile">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?php echo $row['pro_name']; ?></h5>
                                    <p class="card-text">Rs. <?php echo number_format($row['price']); ?>
                                        <?php echo ($row['discount'] > 0) ? "<i class='text-danger'> -" . $row['discount'] . " OFF</i>" : ""; ?>
                                    </p>
                                    <form method="post" action="add_to_cart.php?action=add&id=<?php echo $row['id']; ?>">
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="hidden_image" value="<?php echo $row['image']; ?>">
                                        <input type="hidden" name="hidden_name" value="<?php echo $row['pro_name']; ?>">
                                        <input type="hidden" name="hidden_price" value="<?php echo $price; ?>">
                                        <button type="submit" name="add_to_cart" class="btn btn-outline-primary btn-sm mb-2">
                                            <i class="fa fa-cart-plus"></i> Add to Cart
                                        </button>
                                        <a href="add_wishlist.php?id=<?php echo $row['id']; ?>">
                                            <button type="button" class="btn btn-outline-success btn-sm mb-2">
                                                <i class="fa fa-heart"></i> Wishlist
                                            </button>
                                        </a>
                                    </form>
                                    <span class="text-muted"><?php echo ($row['available'] > 0) ? "In Stock" : "Out of Stock"; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </main>
<?php
include_once "footer.php";
?>
<script>
$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        navText: [
            '<i class="fa fa-chevron-left fa-2x text-dark"></i>',
            '<i class="fa fa-chevron-right fa-2x text-dark"></i>'
        ],
        responsive:{
            0:{ items:1 },
            600:{ items:2 },
            1000:{ items:4 }
        }
    });
});
</script>
