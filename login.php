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
      </div>
    </div> <!-- end of header-->

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
            
  <!--<div class="form-dir">
        <p>Not a member?<a href="signup.php"> Register</a></p> 
      </div> -->
    </form>
    <div class="login-motto">
      Make some enemies.
    </div>
  </div>
</body>
</html>