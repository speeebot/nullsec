<?php 
  require_once 'controllers/authController.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Media :: NULLSEC.gg</title>
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
    <div class="media">
      <div class="media-vid">
        <iframe width="640" height="360"
            src="https://www.youtube.com/embed/we47q1VRFvk" frameborder="0" allowfullscreen>
        </iframe> 
      </div>
      <div class="media-vid">
        <iframe width="640" height="360"
            src="https://www.youtube.com/embed/MXcdCz5k4co" frameborder="0" allowfullscreen> 
        </iframe> 
      </div>
      <div class="media-vid">
        <iframe width="640" height="360"
            src="https://www.youtube.com/embed/UF0bJf1SWmQ" frameborder="0" allowfullscreen>
        </iframe> 
      </div>
    </div>
</div>

</body>
</html>