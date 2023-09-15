<?php
session_start();
$mysqli = require __DIR__ . "/database.php";
    /*Sign Up */
    if(isset($_SESSION["user_id"])){
        $sql = "SELECT * FROM user WHERE id= {$_SESSION["user_id"]}";
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();
    }
    /*Log In */
    $is_invalide = false;
    if($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = sprintf("SELECT * FROM user WHERE email= '%s'",$mysqli->real_escape_string($_POST["email"]));
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    if($user){
        if(password_verify($_POST["password"], $user["password_hash"])){
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["user_id"];
            header("Location: index.php");
            exit;
        }
    }
    $is_invalide = true;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Moroccan Bazaar</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
<body id="formBody">
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="./img/loginImg.jpg" alt="">
      </div>
    </div>

    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Login</div>
            <?php if($is_invalide):?>
            <em>Invalid login</em>
            <?php endif; ?>
            <form method="post">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="email" placeholder="Enter your email" name="email" id="email" value="<?= isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "" ?>" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" placeholder="Enter your password" name="password" id="password" required>
                </div>
                <div class="text"><a href="#">Forgot password?</a></div>
                <div class="button input-box">
                  <input type="submit" value="Log in">
                </div>
                <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
              </div>
            </form>
        </div>
        <div class="signup-form">
          <div class="title">Signup</div>
          <form action="process-signup.php" method="post" id="signup" novalidate enctype="multipart/form-data">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your name" id="name" name="name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" placeholder="Enter your email" id="email" name="email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" id="password" name="password" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Confirm your password" id="password_confirmation" name="password_confirmation" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Sign up">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
</body>
</html>