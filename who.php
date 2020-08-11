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
    <title>Who :: NULLSEC.gg</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<!-- container for logo and everything below -->
  <div class="container">
    <div class="header"> <!-- header includes logo and navigation row with nav links -->
      <a href="front.php" class="logo">
        <img src="img/nullsecNew_title.jpg">
      </a>
    </div>

    <div class="navigation">
      <a class="nav-link-grey" href="who.php">Who</a>
      <a class="nav-link-grey" href="media.php">Media</a>
      <a class="nav-link" href="login.php">Members</a>
    </div>

    <div class = "list-members">
      <ul>
        <li><a target="_blank" href="https://www.twitch.tv/speee">speee</a></li>
        <li><a target="_blank" href="https://www.twitch.tv/waterlemonsapb">WaterLemons</a></li>
        <li><a target="_blank" href="https://www.youtube.com/channel/UCZgXJqOJzmtcll0giKWVmAw">lurq</a>
        <li><a target="_blank" href="https://www.youtube.com/c/claotid">Deftonez</a></li>
        <li><a target="_blank" href="https://www.twitch.tv/leandrakiee">Leandra</a></li>
        <li><a target="_blank" href="https://www.youtube.com/channel/UCzJjomTWrm3_9MV-xfd4RLg">qpple</a></li>
        <li><a target="_blank" href="https://www.youtube.com/channel/UCcOZ9PRd4cWF7fJShfpEGgA">Cerviel</a></li>
        <li><a target="_blank">Pumpster</a></li>
        <li><a target="_blank">Suga</a></li>
        <li><a target="_blank" href="https://www.twitch.tv/prolix_tv">Prolix</a></li>
        <li><a target="_blank">Kacey</a></li>
        <li><a target="_blank">revealed</a></li>
      </ul>
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