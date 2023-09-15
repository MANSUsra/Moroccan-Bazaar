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
                    <li><a class="active"href="blog.php">Blog</a></li>
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

    <h3>Read more and unveil the Rich Tapestry of Moroccan Culture, A Journey Through Time.</h3>
                                    <!--Blogs-->
    <section id="blog">
            <div class="blog-article">
                <img src="img/blog/blog1.jpg" alt="Blog Image">
                <div class="blog-content">
                    <h4>Exploring the Mystical World of Moroccan Bazaars</h4>
                    <p class="short-text">
                        Morocco, a North African gem, is a land of rich history, vibrant culture, and exquisite craftsmanship. One of the most enchanting aspects of Moroccan culture is its bustling bazaars.
                    </p><p class="full-text" style="display: none;">These ancient marketplaces offer a kaleidoscope of colors, scents, and sounds, drawing visitors into a world of wonder. In this article, we'll take you on a journey through the magical realm of Moroccan bazaars, exploring their history, significance, and what makes them an integral part of Moroccan life. A Glimpse into the Past Moroccan bazaars, locally known as "souks"  have a history that stretches back centuries. These vibrant marketplaces have been at the heart of Moroccan commerce and culture for generations. They are not just places to shop but also serve as social hubs where locals and tourists alike gather to engage in lively exchanges.
                        Colors and Crafts
                        One of the striking features of Moroccan bazaars is the riot of colors that surrounds you. From the intricately woven textiles to the gleaming ceramics and aromatic spices, the souks are a feast for the senses. Each alleyway leads to a new discovery, whether it's a stall offering traditional Moroccan carpets or a tiny shop filled with fragrant herbs and spices.
                        Traditional Artistry
                        Moroccan craftsmanship is renowned worldwide for its quality and artistry. In the souks, you'll encounter skilled artisans practicing centuries-old techniques to create stunning works of art. From the delicate filigree of silver jewelry to the hand-painted ceramics, you can witness the creative process up close and even take home a piece of Moroccan artistry.
                        Culinary Delights
                        Morocco's culinary scene is an integral part of its culture, and the bazaars are no exception. You'll find street food stalls offering delicious tagines, couscous, and pastries that showcase the country's rich gastronomic heritage. Don't forget to sip on some mint tea, a Moroccan tradition, as you savor these culinary delights.
                        The Heart of Moroccan Life
                        Beyond their commercial importance, Moroccan bazaars are a reflection of the country's soul. They capture the essence of Morocco's diversity, blending Arab, Berber, and European influences into a unique tapestry. As you navigate the labyrinthine streets of the souks, you'll encounter the warmth and hospitality of the Moroccan people, who take pride in sharing their culture with visitors.
                        Join us on a journey through Morocco's enchanting bazaars as we delve deeper into their history, significance, and the captivating stories that lie behind each stall. Whether you're planning a trip to Morocco or simply want to immerse yourself in its rich culture from afar, the world of Moroccan bazaars is a treasure trove waiting to be explored..</p>
                    <button class="readMore">Read More</button>
                </div>
            </div>
            <div class="blog-article">
                <img src="img/blog/blog2.jpg" alt="Blog Image">
                <div class="blog-content">
                    <h4>Chefchaouen: Exploring the Enchanting Blue City and its Souk</h4>
                    <p class="short-text">
                    Nestled in the Rif Mountains of Northern Morocco, Chefchaouen, often referred to as the "Blue Pearl," is a picturesque town that seems like it was plucked from a fairy tale. With its winding cobbled streets, whitewashed buildings, and a unique sea of blue, Chefchaouen is a destination like no other. One of its most captivating features is its bustling souk, where tradition and culture come to life in a tapestry of colors and aromas.
                    </p><p class="full-text" style="display: none;">A Splash of Blue
                        The distinctive feature that sets Chefchaouen apart from any other town in Morocco is its striking blue color scheme. The buildings in the medina, or old town, are painted in various shades of blue, from serene pastels to vibrant cobalts. The origins of this blue tradition are a bit of a mystery, with some theories suggesting it was brought by Jewish refugees in the 1930s, while others believe it's a way to repel mosquitoes. Regardless of its origins, the blue buildings have become an iconic symbol of Chefchaouen's charm.
                        Getting Lost in the Medina
                        Chefchaouen's medina is a maze of narrow, winding streets, and each corner holds a delightful surprise. As you wander through its labyrinthine alleys, you'll find yourself immersed in the daily life of the locals. The souk is at the heart of this medina, and it's a vibrant marketplace where you can experience the true essence of Moroccan culture.The Souk Experience
                        Chefchaouen's souk is a sensory delight. The air is filled with the scents of Moroccan spices, leather goods, and the occasional whiff of fresh bread from nearby bakeries. The souk offers a wide variety of products, from traditional Moroccan clothing and handmade jewelry to woven rugs and ceramics.
                        One of the highlights of the souk is the vibrant display of fresh produce and spices. You'll find colorful pyramids of spices, stacks of sweet and savory pastries, and an array of fruits and vegetables that are as visually appealing as they are delicious. Don't miss the opportunity to sample local delicacies and try traditional Moroccan mint tea, which is often offered as a welcoming gesture by shopkeepers.Artisanal Treasures
                        Chefchaouen is known for its talented artisans, and you'll encounter many of them in the souk. Skilled craftsmen and women create intricate textiles, hand-painted ceramics, and beautiful jewelry. Take your time to explore the stalls and shops, and you may even witness these artisans at work, practicing age-old techniques passed down through generations.
                        A Cultural Melting Pot
                        What makes Chefchaouen's souk even more special is its status as a cultural crossroads. Here, you'll find a blend of Moroccan, Berber, and Andalusian influences, creating a unique atmosphere that reflects the diverse history of the region. The souk is not just a place to shop; it's a space where people from all walks of life come together to celebrate their heritage and share their stories.</p>
                    <button class="readMore">Read More</button>
                </div>
            </div>
            <div class="blog-article">
                <img src="img/blog/blog3.jpg" alt="Blog Image">
                <div class="blog-content">
                    <h4>Fes Souk: Immersing Yourself in Morocco's Vibrant Marketplace</h4>
                    <p class="short-text">
                    Fes, often referred to as the cultural heart of Morocco, is a city steeped in history and tradition. Its ancient medina, a UNESCO World Heritage Site, is a labyrinth of narrow winding streets, grand palaces, and vibrant souks. Among these, the Fes Souk stands out as a bustling marketplace where centuries-old traditions blend seamlessly with modern commerce.
                    </p><p class="full-text" style="display: none;">The Soul of Fes
                        Fes Souk, also known as "Souk el Henna," is not just a place to shop; it's an embodiment of Moroccan culture and heritage. As you step into its vibrant realm, you'll be transported back in time to a world where craftsmanship and tradition are paramount.
                        The Scent of Spices
                        One of the first things that greet you in Fes Souk is the enchanting aroma of spices. Colorful pyramids of cumin, paprika, saffron, and other exotic spices line the narrow alleyways. Merchants expertly weigh and measure, offering a kaleidoscope of flavors essential to Moroccan cuisine. You'll be tempted to take home a taste of Morocco, whether it's for your own culinary adventures or as a unique souvenir.
                        Textiles and Treasures
                        Fes is renowned for its textile industry, and the souk is a treasure trove of fabrics. From sumptuous silks to intricate carpets and traditional Moroccan garments, you can find a wide array of textiles reflecting Morocco's rich history and artistic heritage. Each piece tells a story, and many are handcrafted using time-honored techniques.
                        Artisans at Work
                        One of the most captivating aspects of Fes Souk is the opportunity to witness artisans practicing their crafts. Skilled woodworkers, metalworkers, and leatherworkers create intricate masterpieces right before your eyes. It's a chance to see traditional methods passed down through generations, as these artisans shape materials into stunning works of art.
                        Ceramics and Pottery
                        Moroccan ceramics are celebrated for their beauty and craftsmanship. Fes Souk boasts an impressive collection of hand-painted ceramics and pottery. The intricate geometric patterns and vibrant colors of these pieces make them both functional and decorative, representing the rich Moroccan mosaic of culture and design.
                        Jewelry and Silverware
                        Silver has a special place in Moroccan jewelry, and you'll find exquisite silver items throughout the souk. From intricate filigree work to stunning pendants and bracelets, the jewelry in Fes Souk showcases the country's fine craftsmanship and artistic flair. Each piece tells a story, whether it's inspired by traditional Berber designs or the cultural fusion of Morocco.
                        The Essence of Fes
                        Fes Souk is more than just a marketplace; it's a microcosm of Moroccan life. It's a place where locals gather to shop, share stories, and connect. The market's lively atmosphere and the warm hospitality of its people provide a glimpse into the heart and soul of Fes.
                        A Step Back in Time
                        As you explore the historic Fes Souk, you'll feel like you've stepped back in time. The medina's ancient walls, intricate architecture, and centuries-old traditions create a captivating atmosphere that transports you to another era. It's a place where time seems to stand still, allowing you to savor every moment of your journey.
                        In Conclusion
                        Fes Souk is a testament to Morocco's enduring cultural heritage. It's a place where the past and present intertwine seamlessly, where the sights, sounds, and scents of Morocco come alive. Whether you're a seasoned traveler or embarking on your first adventure in Morocco, a visit to Fes Souk is an essential experience that will leave you with a deeper appreciation for this captivating city and its vibrant culture.</p>
                <button class="readMore">Read More</button>
            </div>
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
    <script>
        var readMoreButtons = document.querySelectorAll(".readMore");
        readMoreButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                var shortText = button.parentElement.querySelector(".short-text");
                var fullText = button.parentElement.querySelector(".full-text");
                if (fullText.style.display === "none") {
                    fullText.style.display = "block";
                    shortText.style.display = "none";
                    button.innerHTML = "Read Less";
                } else {
                fullText.style.display = "none";
                shortText.style.display = "block";
                button.innerHTML = "Read More";
                }
            });
        });
    </script>
    <script src="./script.js"></script>
</body>
</html>