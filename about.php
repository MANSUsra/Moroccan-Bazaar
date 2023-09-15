<?php
session_start();
$mysqli = require __DIR__ . "/database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moroccan Bazaar</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" />
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
                                     <!--Header-->
<div id="preview">
    <a href="index.php"><img src="img/logoo5.png" id="logo" alt="" style="width: 80px; height: auto;"></a>
    <button>Buy now</button>
</div>
                                    <!--NavigationBar-->
<section id="header">
    <div>
        <ul id="navbar">
            <div id="grp1">
                <li><a href="#" id="close"><i class="fa fa-close"></i></a>
                <li><a href="index.php">Home</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a class="active" href="about.php">About</a></li>
            </div>
            <div id="grp2">
                <li><a href="favoris.php"><i class="fa-regular fa-heart"></i></a></li>
                <?php if (isset($_SESSION["user_id"])){
                    $user_id = $_SESSION['user_id'];
                    $query = "SELECT name FROM user WHERE user_id = $user_id";
                    $result = mysqli_query($mysqli, $query);
                    if ($result && mysqli_num_rows($result) > 0) {
                        $user = mysqli_fetch_assoc($result);
                        echo '<li>' . $user['name'] . '</li>';
                        echo '<li><a href="logout.php">Log out</a></li>';
                    }
                }else{
                     echo '<li><a href="signup.php">Sign up</a></li>';
                }
                ?>
                <li><a href="cart.php" id="lg-bag"><i class="fa-solid fa-cart-shopping"></i></a></li>
            </div>
        </ul>
    </div>
    <div id="mobile"> 
        <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>
                                     <!--Hero-->
<div>
    <marquee background-color="#ccc" loop="-1" scrollamounts="5" width="100%">Welcome to Our Moroccan Treasures: Explore, Shop, and Discover Morocco's Rich Culture</marquee>
</div>
<section id="about-header" class="section-p1">
    <img src="img/about/morocco.jpg" alt="">
    <div>
        <h4>Get to Know Me: A Passionate Ambassador of Moroccan Culture</h4>
        <p>Greetings, dear visitor! I'm Yousra, and I want to take a moment to share with you my deep passion for the vibrant tapestry of Moroccan culture and the journey that led me to create <strong><i>Moroccan Bazaar</i></strong>.</p> 
        <br><br>
    </div>
</section>
<div id="para">
            <h4>A Love Affair with Morocco</h4>
            <p>Born and raised in the enchanting city of ElAIOUN SIDI MELLOUK, my heart has always belonged to Morocco. Its captivating landscapes, rich history, and the warmth of its people have been the backdrop of my life's journey</p>
            <h4>From Dream to Reality</h4>
            <p><strong><i>Moroccan Bazaar</i></strong> is the realization of that dream. It's a labor of love, a platform where I can introduce you to the treasures of Morocco and the incredible artisans who bring them to life.</p>
            <h4>A Lifelong Dream</h4>
            <p>From the tranquil oases of the Sahara Desert to the bride of the North Tanger, I've been fortunate to explore every corner of my remarkable homeland. But my dream has always been to share the beauty of Morocco with the world.</p>
            <h4>More than products</h4>
            <p>When you browse our collection, you're not just shopping for beautiful items; you're embarking on a cultural adventure. I believe that understanding the stories behind each product enhances your connection with Morocco's rich heritage.</p>
</div>
<section id="about-app" class="section-p1">
    <h4>Download Our <a href="#">App</a></h4>
    <h2>Coming Soon !</h2>
</section>
<section id="newsletter" class="section-p1 section-m1">
    <div class="newstext">
        <h4>Sign Up For Newsletters</h4>
        <p>Get E-mail updates about our latest shop and <span>special offers</span>.</p>
    </div>
    <div class="form">
        <input type="text" placeholder="Your e-mail adress">
        <a href="signup.php"><button class="normal">Sign Up</button></a>
    </div>
</section>

<footer class="section-p1">
        <div class="col">
            <a href="index.php"><img class="logo" src="img/logoo5.png" alt=""></a>
            <h4>Contact</h4>
            <p><strong>Address:</strong> LOT EL AMAL  NR 15, ELAIOUN SIDI MELLOUK, MOROCCO</p>
            <p><strong>Phone:</strong>(+212)624658471</p>
            <p><strong>Hours:</strong> 10:00 - 18:00, Mon - Sat</p>
            <div class="follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="about.php">About Us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="signup.php">Sign up</a>
            <a href="cart.php">View Cart</a>
            <a href="favoris.php">My WishList</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>
        <div class="install">
            <h4>Install App</h4>
            <p>From App Store or Google Play</p>
            <div class="row">
                <img src="img/pay/app.jpg" alt="">
                <img src="img/pay/play.jpg" alt="">
            </div>
            <p>Secured Payment Getways</p>
            <img src="img/pay/pay.png" alt="">
        </div>

        <div class="copyright">
            <p>© 2023, UsraMANSOUR</p>
        </div>

</footer>
<script src="script.js"></script>

</body>
</html>