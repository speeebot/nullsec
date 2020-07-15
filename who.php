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
    <a href="front.php" class="logo">
      <img src="img/nullsecNew_title.jpg">
    </a>
  </div>
    <div class="navigation">
      <a class="nav-link-grey" href="who.php">Who</a>
      <a class="nav-link-grey" href="media.php">Media</a>
      <a class="nav-link" href="login.php">Members</a>
    </div>
    <ul class="list">
      <a class="list-who" target="_blank" href="https://www.twitch.tv/speee">speee</a>
      <a class="list-who" target="_blank" href="https://www.twitch.tv/waterlemonsapb">WaterLemons</a>
      <a class="list-who" target="_blank" href="https://www.youtube.com/channel/UCZgXJqOJzmtcll0giKWVmAw">lurq</a>
      <a class="list-who" target="_blank" href="https://www.youtube.com/c/claotid">Deftonez</a>
      <a class="list-who" target="_blank" href="https://www.twitch.tv/leandrakiee">Leandra</a>
      <a class="list-who" target="_blank" href="https://www.youtube.com/channel/UCzJjomTWrm3_9MV-xfd4RLg">qpple</a>
      <a class="list-who" target="_blank" href="https://www.youtube.com/channel/UCcOZ9PRd4cWF7fJShfpEGgA">Cerviel</a>
      <a class="list-who" target="_blank">Pumpster</a>
      <a class="list-who" target="_blank">Suga</a>
    </ul>
</div>

</body>
</html>