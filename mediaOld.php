<?php

require_once 'controllers/authController.php';

if (!isset($_SESSION['id'])) {
  header('location: login.php');
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Media :: NULLSEC.gg</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- username tag -->
<div class="status">
  <h2 class="status-username">
    <?php echo $_SESSION['username']; 
      if ($_SESSION['verified']): ?>
        <h2 class="status-verified">VERIFIED</h2>
    <?php endif; ?>
  </h2>
</div>
<!-- container for logo and everything below -->
  <div class="container">
    <div class="header"> <!-- header includes logo and navigation row with nav links -->
      <a href="index.php" class="logo">
        <img src="img/nullsecNew_title.jpg">
      </a>
      <div class="navigation">
        <a class="nav-link" href="index.php">Front</a>
        <a class="nav-link" href="media.php">Media</a>
        <a class="nav-link" href="info.php">Info</a>
        <a class="nav-link" href="downloads.php">Downloads</a>
        <?php if($_SESSION['verified'] == 1):?>
          <a class="nav-link" href="invite.php" title="Do not invite fuckheads please.">Invite</a>
        <?php endif; ?>
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
            <br>
            <?php if (isset($_SESSION['resent']) && !$_SESSION['resent'] == 1 ): ?>
              <form class="form" action="index.php" method="post">
                <button type=submit name="resend-btn">Resend</button>
              </form>
            <?php endif; ?>
          </div>
        <?php endif; ?>
    </div>

    <!-- <div class="info">
        <iframe width="640" height="360"
            src="https://www.youtube.com/embed/tgbNymZ7vqY">
        </iframe> 
    </div> -->
</div>

</body>
</html>