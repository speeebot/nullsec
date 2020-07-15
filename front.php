<?php require_once 'controllers/authController.php'; 

/* if (isset($_SESSION['id'])) {
  header('location: index.php');
  exit();
} */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NULLSEC.gg</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<!-- container for logo and everything below -->
<div class="container">
  <div class="header"> <!-- header includes logo and navigation row with nav links -->
    <a href="#" class="logo">
      <img src="img/nullsecNew_title.jpg">
    </a>
  </div>
    <div class="navigation">
      <a class="nav-link-grey" href="who.php">Who</a>
      <a class="nav-link-grey" href="media.php">Media</a>
      <a class="nav-link" href="login.php">Members</a>
    </div>
</div>

</body>
</html>