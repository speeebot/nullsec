<?php require_once 'controllers/authController.php'; 

if (isset($_SESSION['id'])) {
  header('location: index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log in :: NULLSEC.gg</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<!-- container for logo and everything below -->
  <div class="container">
    <div class="header"> <!-- header includes logo and navigation row with nav links -->
      <a href="front.php" class="logo">
        <img src="img/nullsecNew_title.jpg">
      </a>
      <div class="navigation">
          <a class="nav-link-grey" href="who.php">Who</a>
          <a class="nav-link-grey" href="media.php">Media</a>
          <a class="nav-link-red" href="login.php">Members</a>
      </div> <!-- end of navigation-->
    </div> <!-- end of header-->

    <div class="form-container">
      <form class="form" action="login.php" method="post">
        <div class="form-group">
          <input type="text" value="<?php echo $username; ?>" name="username" placeholder="Username or E-mail">
          <input type="password" name="password" placeholder="Password">
          <button type="submit" name="login-btn" class="btn">Log in</button>
        </div>

        <?php if(count($errors) > 0): ?>
        <div class="form-alerts">
          <?php foreach($errors as $error): ?>
          <li class="form-alert"><?php echo $error; ?></li>
          <?php endforeach; ?>
        </div>
            <?php endif; ?>
      </form> <!-- end of form-->
    </div> <!-- end of form-container-->

    <div class="login-motto">
      <p>Make some enemies.</p>
    </div>

  </div> <!-- end of container -->

  <footer class="footer">
    <div class= "footer-icon">
      <a href="front.php">
        <img src="img/nullsecSymbol.jpg">
      </a>
    </div>
  </footer>

</body>

</html>