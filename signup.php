<?php require_once 'controllers/authController.php'; 

if (isset($_GET['invitetoken'])) {
  $inviteToken = $_GET['invitetoken'];
  $_SESSION['inviteToken'] = $inviteToken;
  verifyInvite($inviteToken);
}
if ($_SESSION['inviteVerified'] < 1) {
  header('location: index.php');
  exit();
}
if (isset($_SESSION['id'])) {
  header('location: index.php');
  exit();
}

?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<h2 class="username">
 &nbsp; <!-- add space above logo -->
</h2>

<!-- container for logo and everything below -->
<div class="container">
  <div class="header"> <!-- header includes logo and navigation row with nav links -->
    <a href="index.php" class="logo">
      <img src="img/nullsecNew_title.jpg">
    </a>
    <br><br><br>
  </div>
    <form class="form" action="signup.php" method="post">
      <div class="form-group">
        <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
        <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="passwordConf" placeholder="Confirm password">
        <button type="submit" name="signup-btn" class="btn">Submit</button>
      </div>
      <?php if(count($errors) > 0): ?>
  <div class="form-alerts">
    <?php foreach($errors as $error): ?>
    <li class="form-alert"><?php echo $error; ?></li>
    <?php endforeach; ?>
  </div>
    <?php endif; ?>

    <div class="form-dir">
       <p>Already a member?<a href="login.php"> Log in</a></p> 
    </div>
  </form>
</div>

</body>
</html>