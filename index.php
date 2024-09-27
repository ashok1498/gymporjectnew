<?php 
session_start();
error_reporting(0);
include 'include/config.php';
$uid=$_SESSION['uid'];

if(isset($_POST['submit']))
{ 
$pid=$_POST['pid'];


$sql="INSERT INTO tblbooking (package_id,userid) Values(:pid,:uid)";

$query = $dbh -> prepare($sql);
$query->bindParam(':pid',$pid,PDO::PARAM_STR);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query -> execute();
echo "<script>alert('Package has been booked.');</script>";
echo "<script>window.location.href='booking-history.php'</script>";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Gym Management System</title>
	<meta charset="UTF-8">
	<meta name="description" content="Ahana Yoga HTML Template">
	<meta name="keywords" content="yoga, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/nice-select.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
    <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    

</head>
<body>
	<!-- Page Preloder -->
	

	<!-- Header Section -->
	<?php include 'include/header.php';?>
	<!-- Header Section end -->

	

	                                                                              
	<!-- Page top Section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 m-auto text-white">
					<h2>Home</h2>
					<p>Physical Activity Or Can Improve Your Health</p>
				</div>
			</div>
		</div>
	</section>
<br/>

    	
<!-- slider section starts -->
<div class="container">
                <!-- <h2>
                    Carousel Example
                </h2> -->
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">

                        <div class="item active">
                            <img src="img/hero-slider/1rr.png" style="width:100%; height: 20%;" />
                            <div class="carousel-caption">
                                <h3>The body achieves what the mind believes.</h3>
                                <p>Its Upto You</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="img/hero-slider/2r.png" style="width: 100%; height: 20%" />
                            <div class="carousel-caption">
                                <h3> The real workout starts when you want to stop</h3>
                                <p>Awlays be motivated</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="img/hero-slider/3.png" alt="Chicago" style="width: 100%; height: 20%;" />
                            <div class="carousel-caption">
                                <h3>Be Healthy.Eat healthy</h3>
                                <p>Take Care Of Yourself</p>
                            </div>
                        </div>

                    </div>
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left">
                        </span><span class="sr-only">Previous</span>
                    </a><a class="right carousel-control"
                           href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right">
                        </span><span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
<!-- image slider End -->

<style>             .testimonial {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .carousel-item {
            display: none;
        }

        .carousel-item.active {
            display: block;
        }
        .carousel-control-prev{
            width: 100px;
            height: 50px;
            background-color: black;
            color: red;
        }
        .carousel-control-next{
            width: 100px;
            background-color: black;
            height: 50px;
            color: red;
        }
        </style>
<!-- testimonial section start -->
<div class="container mt-5">
    <h2 class="text-center">Testimonials</h2>
    <div id="testimonialCarousel" class="carousel slide">
        <div class="carousel-inner">
            <!-- Testimonial 1 -->
            <div class="carousel-item active">
                <div class="testimonial text-center">
                    <p>"This gym management system is fantastic! It made managing trainers and packages a breeze. Highly recommend it!"</p>
                    <h5>Suraj Bhatta</h5>
                </div>
            </div>
            <!-- Testimonial 2 -->
            <div class="carousel-item">
                <div class="testimonial text-center">
                    <p>"The scheduling feature is exactly what we needed. Now I can easily manage my time with my preferred trainer!"</p>
                    <h5>Bhoj Raj Joshi</h5>
                </div>
            </div>
            <!-- Testimonial 3 -->
            <div class="carousel-item">
                <div class="testimonial text-center">
                    <p>"Incredible! The payment options and user interface are intuitive and easy to navigate. Great support too!"</p>
                    <h5>Ram Bahadur Thapa</h5>
                </div>
            </div>
        </div>

        <!-- Carousel controls (optional) -->
        <button class="carousel-control-prev" type="button" id="prevBtn">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" id="nextBtn">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<!-- Custom JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var carouselItems = document.querySelectorAll('.carousel-item');
        var currentIndex = 0;
        var totalItems = carouselItems.length;
        var intervalTime = 3000; // 3 seconds

        function showSlide(index) {
            // Remove active class from all items
            carouselItems.forEach(item => item.classList.remove('active'));

            // Add active class to the current item
            carouselItems[index].classList.add('active');
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalItems;
            showSlide(currentIndex);
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + totalItems) % totalItems;
            showSlide(currentIndex);
        }

        // Set the interval to automatically change slides
        var slideInterval = setInterval(nextSlide, intervalTime);

        // Add event listeners for next and previous buttons
        document.getElementById('nextBtn').addEventListener('click', function() {
            clearInterval(slideInterval); // Reset interval on manual navigation
            nextSlide();
            slideInterval = setInterval(nextSlide, intervalTime);
        });

        document.getElementById('prevBtn').addEventListener('click', function() {
            clearInterval(slideInterval); // Reset interval on manual navigation
            prevSlide();
            slideInterval = setInterval(nextSlide, intervalTime);
        });
    });
</script>

<!-- testimonial section end -->



<!-- Middle Contents start -->
        <div class="container center ">
            <div class="row ">
                <div class="col-lg-4">
                    <img class="img-circle " src="https://i.pinimg.com/736x/24/54/48/245448f231a37e946c5974a6e8cbce18.jpg" alt="thumb" width="185" height="140" />
                    <h2> Fitness Finest</h2>
                    <p>
                    At CrossFit House, our mission is to provide an exceptional fitness experience that empowers individuals to reach their full potential. We believe that with the right guidance, support, and motivation, everyone can achieve their goals and live a healthier, more fulfilling life.
                    </p>  
                    <p>
                        <!-- <a class="btn btn-default " href="#" role="button">View More &raquo;</a> -->
                    </p>
                </div>

                <div class="col-lg-4">
                    <img class="img-circle " src="https://www.shutterstock.com/image-vector/fitness-logo-vector-symbol-icon-600w-1926906863.jpg" alt="thumb" width="160" height="140" />
                    <h2> Fitness club</h2>
                    <p>
                    Our team of experienced and passionate coaches is dedicated to helping you succeed in your fitness journey. We provide personalized coaching, innovative workouts, and a supportive community to help you build strength, increase endurance, and improve your overall well-being.
                    </p>
                    <p>
                    
                        <!-- <a class="btn btn-default " href="#" role="button">View More &raquo;</a> -->
                    </p>
                </div>

                <div class="col-lg-4">
                    <img class="img-circle " src="https://marketplace.canva.com/EAFXQWIAFVA/1/0/1600w/canva-black-and-white-vintage-gym-and-fitness-logo-MzICys7rUvU.jpg" alt="thumb" width="160" height="140" />
                    <h2> Gym & Fitness</h2>
                    <p>
                    Our state-of-the-art facility features top-of-the-line equipment, spacious workout areas, and a comfortable, friendly environment that fosters camaraderie and teamwork. We take pride in creating an inclusive atmosphere where athletes of all skill levels can thrive and grow together.
                    </p>
                    <p>
                        <!-- <a class="btn btn-default " href="#" role="button">View More &raquo;</a> -->
                    </p>
                </div>
            </div>
        </div>
<!-- Middle Contents End-->

<script src="https://khalti.com/static/khalti-checkout.js"></script>

<!-- Button to trigger Khalti Payment -->


	<!-- Pricing Section -->
	<section class="pricing-section spad">
		<div class="container">
			<div class="section-title text-center">
				<img src="img/icons/logo-icon.png" alt="">
				<h2>Pricing plans</h2>
				<p>Practice Yoga to perfect physical beauty, take care of your soul and enjoy life more fully!</p>
			</div>
			<div class="row">
    <?php 
    $sql ="SELECT id, category, titlename, PackageType, PackageDuratiobn, Price, uploadphoto, Description, create_date from tbladdpackage";
    $query= $dbh -> prepare($sql);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query -> rowCount() > 0)
    {
        foreach($results as $result)
        {
    ?>
    <div class="col-lg-3 col-sm-6">
        <div class="pricing-item begginer">
            <div class="pi-top">
                <h4><?php echo $result->titlename;?></h4>
            </div>
            <div class="pi-price">
                <h3><?php echo htmlentities($result->Price);?></h3>
                <p><?php echo $result->PackageDuratiobn;?></p>
            </div>
            <ul>
                <?php echo $result->Description;?>
            </ul>
            <?php if(strlen($_SESSION['uid'])==0): ?>
            <!-- Add a unique id to each button using the package id -->
            <button class="site-btn sb-line-gradient khalti-payment-button" id="payment-button-<?php echo $result->id; ?>" data-package-id="<?php echo $result->id; ?>" data-package-name="<?php echo $result->titlename; ?>" data-package-price="<?php echo $result->Price; ?>">Pay with Khalti</button>
            <?php else :?>
            <form method='post'>
                <input type='hidden' name='pid' value='<?php echo htmlentities($result->id);?>'>
                <input class='site-btn sb-line-gradient' type='submit' name='submit' value='Booking Now' onclick="return confirm('Do you really want to book this package.');"> 
            </form>
            <?php endif;?>
        </div>
    </div>
    <?php  $cnt=$cnt+1; } } ?>
</div>

<script>
    var khaltiConfig = {
        "publicKey": "19b9dce91d0c4d899d1307ffe147594e", 
        "productIdentity": "",  // This will be dynamically set
        "productName": "",      // This will be dynamically set
        "productUrl": "http://localhost/gym/index.php",  // Product URL
        "eventHandler": {
            onSuccess(payload) {
                console.log(payload);
                fetch('verify_payment.php', {
                    method: 'POST',
                    body: JSON.stringify(payload),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(response => response.json())
                  .then(data => console.log('Payment verification result:', data))
                  .catch(error => console.error('Error:', error));
            },
            onError(error) {
                console.error(error);
            },
            onClose() {
                console.log('Khalti payment widget is closed');
            }
        }
    };

    var checkout = new KhaltiCheckout(khaltiConfig);

    // Attach event listeners to all Khalti payment buttons
    var khaltiButtons = document.querySelectorAll('.khalti-payment-button');
    khaltiButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Get the package ID, name, and price from the button's data attributes
            var packageId = this.getAttribute('data-package-id');
            var packageName = this.getAttribute('data-package-name');
            var packagePrice = this.getAttribute('data-package-price');

            // Update Khalti checkout config dynamically
            khaltiConfig.productIdentity = packageId;
            khaltiConfig.productName = packageName;

            // Convert the package price to paisa (1₨ = 100 paisa)
            var priceInPaisa = packagePrice * 100000;

            // Show Khalti checkout widget
            checkout.show({ amount: priceInPaisa });
        });
    });
</script>

	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">

	</body>
</html>
