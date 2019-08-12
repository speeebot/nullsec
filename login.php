<?php require_once 'controllers/authController.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<a href="index.php" class="logo">
  <img src="img/logo.png"></a>

  <div class="container">
        <form action="login.php" method="post">
          

            <div class="form-group">
              <input type="text" value="<?php echo $username; ?>" name="username" placeholder="Username or E-mail">
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
              <button type="submit" name="login-btn" class="login-btn">Log in</button>
            </div>

            <?php if(count($errors) > 0): ?>
            <div class="login-error-line">
              <?php foreach($errors as $error): ?>
              <li class="login-error"><?php echo $error; ?></li>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
          <div class="login-msg">
            <p class="txt">Not a member? <a href="signup.php" class= "register">Register</a></p> 
          </div>

        </form>
  </div>

</body>

</html>