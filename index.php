<?php

require_once 'controllers/authController.php'; 

//verify the user using token
if (isset($_GET['token'])) {
  $token = $_GET['token'];
  verifyUser($token);
}

if (!isset($_SESSION['id'])) {
  header('location: login.php');
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>NULLSEC</title>
  <link rel="stylesheet" href="style.css">
  <link rel="icon" type="image/x-icon/" href="favicon.ico">
</head>
<body>
<!-- username tag -->
<h2 class="username">
  <?php echo $_SESSION['username']; 
    if ($_SESSION['verified']): ?>
      <h2 class="verified">VERIFIED</h2>
  <?php endif; ?>
</h2>
<!-- container for logo and everything below -->
  <div class="container">
    <div class="header"> <!-- header includes logo and navigation row with nav links -->
      <a href="index.php" class="logo">
        <img src="img/nullsecNew_title.jpg">
      </a>
    <br><br><br>
      <div class="navigation">
        <a class="nav-link" href="index.php">Front</a>
        <a class="nav-link" href="media.php">Media</a>
        <a class="nav-link" href="info.php">Info</a>
        <a class="nav-link" href="downloads.php">Downloads</a>
        <a class="nav-link" href="invite.php">Invite</a>
        <a class="nav-link" href="https://forums.nullsec.gg/">Forums</a>
        <a class="nav-link" href="index.php?logout=1">Logout</a>
      </div>
    </div>

      <div class="alerts">
        <?php if (isset($_SESSION['message'])): ?>
          <p class="logged-alert" <?php echo $_SESSION['alert-class']; ?>> 
            <?php echo $_SESSION['message']; 
              unset($_SESSION['message']); 
              unset($_SESSION['alert-class']); ?>
          </p>
        <?php endif; ?>

        <?php if (!$_SESSION['verified']): ?>
          <div class="email-alert">
            You need to verify your account.
            An email has been sent to
            <strong><?php echo $_SESSION['email']; ?></strong>
          </div>
        <?php endif; ?>
      </div>
      <div> 
  <div class="info">
    <h1><!-- info goes in here --></a> </h1>
  </div>

</body>
</html>