<?php
session_start();
$mysqli = require __DIR__ . "/database.php";
if (isset($_POST['add_to_favorites'])) {
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $productId = $_POST['product_id'];
        $query = "SELECT * FROM favorites_list WHERE user_id = $userId AND product_id = $productId";
        $result = mysqli_query($mysqli, $query);
       
    if (!$result) {
        die("Error in SQL query: " . mysqli_error($mysqli));
    }
        if ($result && mysqli_num_rows($result) > 0) {
            echo "Product is already in the wishlist.";
        } else {
            $insertQuery = "INSERT INTO favorites_list (user_id, product_id) VALUES ($userId, $productId)";
            mysqli_query($mysqli, $insertQuery);
            if (!$result) {
                die("Error: " . mysqli_error($mysqli));
            }
    } 
}}
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
                        <li><a href="about.php">About</a></li>
                    </div>
                    <div id="grp2">
                        <li><a class="active" href="favoris.php"><i class="fa-regular fa-heart"></i></a></li>
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
        <section id="whishSection">
            <h3>My wishlist</h3>
            <?php
                $output ="";
                $output .= "
                <table>
                <thead>
                    <tr>
                        <td>Remove</td>
                        <td>Image</td>
                        <td>Product</td>
                        <td>Price</td>
                    </tr>
                </thead>
                <tbody>";
                if (isset($_SESSION["user_id"])) {
                    $userId = $_SESSION["user_id"];
                    $query = "SELECT f.product_id, p.name, p.price, p.image
                            FROM favorites_list f
                            JOIN cart_items p ON f.product_id = p.product_id
                            WHERE f.user_id = $userId";
                    $result = mysqli_query($mysqli, $query);
                    if (!$result) {
                        die("Error in SQL query: " . mysqli_error($mysqli));
                    }
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $productId = $row['product_id'];
                            $productName = $row['name'];
                            $productPrice = $row['price'];
                            $productImage = $row['image'];
                            $output .= "
                            <tr>
                                <td>
                                <a href='favoris.php?action=remove&product_id=" . $productId ."'>
                                    <button>
                                        <i class='fa fa-trash'></i>
                                    </button>
                                </a>
                                </td>
                                <td><img src=\"data:image/jpg;base64," . base64_encode($productImage) . "\" ></td>
                                <td>$productName</td>
                                <td>$productPrice $</td>
                            </tr>";
                        }
                        $output .= "
                        </tbody>
                        </table>
                        <a href='index.php'><button id='shopNow'>Continue Shopping</button></a>";
                
                        echo $output;
                    } else {
                        echo "This wishlist is currently empty ! <br>";
                        echo "Click the <i class='fa-regular fa-heart'></i> icons to add products";
                    }
            }else {
                echo "Please log in to view your wishlist.";
            }
            ?>
             <?php
            if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['product_id'])) {
                $userId = $_SESSION['user_id'];
                $productId = $_GET['product_id'];
                $deleteQuery = "DELETE FROM favorites_list WHERE user_id = ? AND product_id = ?";
                $stmt = mysqli_prepare($mysqli, $deleteQuery);
                if (!$stmt) {
                    die("Error in SQL query: " . mysqli_error($mysqli));
                }
                mysqli_stmt_bind_param($stmt, "ii", $userId, $productId);
                if (mysqli_stmt_execute($stmt)) {
                    // Item removed successfully
                } else {
                    die("Error in SQL query: " . mysqli_error($mysqli));
                }
            }
        ?>
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
