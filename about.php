<?php
include_once "header.php";
?>
<!-- About Us Header -->
<section class="about-header bg-dark">
    <h1>About Us</h1>
    <p>Empowering Mobile Enthusiasts with a Virtual Showroom Experience.</p>
</section>

<!-- About Section -->
<section class="about-section container">
    <div class="row">
        <div class="col-md-12">
            <h2>About Us</h2>
            <p>Welcome to the Online Mobile Showroom, a platform designed to revolutionize how you explore and evaluate mobile phones. We aim to provide a seamless and immersive virtual showroom experience, enabling you to browse a diverse range of smartphones from the comfort of your home. Whether you're searching for the latest flagship models, mid-range options, or budget-friendly devices, our intuitive platform helps you make informed decisions with ease. With detailed specifications, high-quality images, and real user reviews, we empower you to find the perfect mobile that suits your needs and preferences.</p>
            <p>At the heart of our platform is a commitment to innovation and user satisfaction. Our advanced comparison tools, filtering options, and personalized recommendations ensure you can evaluate and shortlist devices effortlessly. As technology evolves, so do we—striving to bring you the latest trends and features in mobile technology. Join our community of tech enthusiasts and let us help you stay ahead in the fast-paced world of smartphones. Together, we are transforming the way people shop for mobile devices online!</p>
        </div>
    </div>
</section>


<!-- Testimonial Section -->
<div class=" bg-light">
<section class="testimonial-section container bg-light">
    <h2 class="text-center">What Our Customers Say</h2>
    <div class="row">
    <?php
        $sql="select name, rating, review, time, date from feedback INNER JOIN user on user.id=feedback.user_id";
		$result=mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($result)){
		?>
        <div class="col-md-4">
            <div class="testimonial bg-white">
                <p>"<?php echo $row['review'];?>"</p>
                <div>
                    <?php
					for($j=1;$j<=$row['rating'];$j++){
						echo '<span class="text-warning"><i class="fa fa-star pr-1"></i></span>';
					}
					for($k=1;$k<=(5-$row['rating']);$k++){
						echo '<span class="text-dark"><i class="fa fa-star text-dark pr-1"></i></span>';
					}
					?>
                </div>
                <p><strong>- <?php echo $row['name'];?></strong></p>
            </div>
        </div>
        <?php } ?>
        
        
    </div>
</section>
</div>

<?php
include_once "footer.php";
?>
