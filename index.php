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
</head>

<body>
<a href="index.php" class="logo">
  <img src="img/logo.png"></a>

  <div class="container">
    <div class="row">
      <?php if (isset($_SESSION['message'])): ?>
        <div class="alert" <?php echo $_SESSION['alert-class']; ?>">
          <?php 
            echo $_SESSION['message']; 
            unset($_SESSION['message']); 
            unset($_SESSION['alert-class']); 
          ?>

        </div>
        <?php endif; ?>

        <h3 class="username"><?php echo $_SESSION['username']; ?>
          <a class="logout" href="index.php?logout=1">Logout</a>
        </h3>

        <?php if (!$_SESSION['verified']): ?>
          <div class="email-sent">
            You need to verify your account.
            An email has been sent to
            <strong><?php echo $_SESSION['email']; ?></strong>
          </div>
        <?php endif; ?>

        <?php if ($_SESSION['verified']): ?>
          <button class="btn btn-block btn-lg btn-primary">VERIFIED</button>
        <?php endif; ?>
    </div>
  </div>

</body>

</html>