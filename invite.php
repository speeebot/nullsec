<?php require_once 'controllers/authController.php'; 

if (!isset($_SESSION['id'])) {
  header('location: index.php');
  exit();
}

?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invite</title>
    <link rel="stylesheet" href="style.css">
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
    <form class="form" action="invite.php" method="post">
      <div class="form-group">
        <input type="email" name="inviteEmail" placeholder="E-mail" value="<?php echo $inviteEmail; ?>">
        <button type="submit" name="invite-btn" class="btn">Send</button>
      </div>
      <?php if(count($errors) > 0): ?>
  <div class="form-alerts">
    <?php foreach($errors as $error): ?>
    <li class="form-alert"><?php echo $error; ?></li>
    <?php endforeach; ?>
  </div>
    <?php endif; ?>

  </form>

  <div class="alerts">
        <?php if (isset($_SESSION['message'])): ?>
          <p class="logged-alert" <?php echo $_SESSION['alert-class']; ?>> 
            <?php echo $_SESSION['message']; 
              unset($_SESSION['message']); 
              unset($_SESSION['alert-class']); ?>
          </p>
        <?php endif; ?>

</div>

</body>
</html>