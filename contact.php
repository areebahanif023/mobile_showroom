<?php
include_once "header.php";
?>
<!-- Contact Us Header -->
<section class="contact-header bg-dark">
    <h1>Contact Us</h1>
    <p>We would love to hear from you. Get in touch with us for any queries or feedback.</p>
</section>

<!-- Contact Info Section -->
<section class="contact-info-section container">
    <div class="row">
        <div class="col-md-4">
            <div class="contact-info">
                <i class="fa fa-map-marker"></i>
                <h4>Our Address</h4>
                <p>Punjab University Lahore</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="contact-info">
                <i class="fa fa-phone"></i>
                <h4>Call Us</h4>
                <p>+92 301 9834890</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="contact-info">
                <i class="fa fa-envelope"></i>
                <h4>Email Us</h4>
                <p>support@showroom.com</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="contact-form-section container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="contact-form">
                <h2>Send Us A Message</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" class="form-control" id="message" rows="4" placeholder="Enter your message" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include_once "footer.php";
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$message=$_POST['message'];
    $sql="insert into contact(name,email,message) values('$name','$email','$message')";
    $result=mysqli_query($con,$sql);
    if($result){
        echo '<script>alert("Message sent successfully")
            window.location.href="register.php";</script>';
    }
    else{
        echo '<script>alert("Sorry try again later");</script>';
		}	
}
?>
