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
                    <li><a class="active" href="index.php">Home</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="about.php">About</a></li>
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
    <section id="hero">
        <h1>Welcome to the <br> Moroccan Bazaar</h1>
        <h2>Your journey to the Moroccan Elegance</h2>
        <button id="shopNow">Shop now</button>
    </section>

                                    <!--Products-->
<section id="product1" class="section-p1">
        <div class="pro-container">
            <?php
                $query = "SELECT product_id, name, price, image FROM cart_items";
                $result = mysqli_query($mysqli,$query);
                if (!$result) {
                    die("Error in SQL query: " . mysqli_error($mysqli));
                }
                while ($row = mysqli_fetch_array($result)){
                    $productId = $row['product_id'];
                    $productName = $row['name'];
                    $productPrice = $row['price'];
                    $productImage = base64_encode($row['image']);
            ?>
        <div class="pro">
            <form method="post" action="favoris.php">
                <input type="hidden" name="user_id" value="<?= $userId ?>">
                <input type="hidden" name="product_id" value="<?= $productId ?>">
                <button type="submit" name="add_to_favorites" class="favorite">
                    <i class="fa-regular fa-heart"></i>
                </button>
            </form>
            <img src="data:image/jpg;base64,<?= $productImage ?> " alt="">
            <div class="des">
                <h5><?= $productName; ?></h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>&<?= $productPrice; ?></h4>
            </div>
                    <form method="post" action="cart.php?id=<?= $productId ?>">
                    <input type="hidden" name="product_id" value="<?= $productId ?>">
                    <input type="hidden" name="image" value="<?= $productImage ?>">
                    <input type="hidden" name="name" value="<?= $productName ?>">
                    <input type="hidden" name="price" value="<?= $productPrice ?>">
                    <div id="addCart">
                        <input type="number" name="quantity" value="1" class="form-control">
                        <button type="submit" name="add_to_cart" class="cart">
                            <i class="fa-solid fa-cart-shopping "></i>
                        </button>
                    </div>
                    </form>
                </div>
                
            <?php
            }
            ?> 
            </div>
</section>
    
        
                                    <!--NewsLetter-->
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
    <script src="./script.js"></script>
</body>
</html>