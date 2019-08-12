<?php require_once 'controllers/authController.php'; ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<a href="index.php" class="logo">
  <img src="img/logo.png"></a>

  <div class="container">
    <div class="row">
        <form action="signup.php" method="post">

            <div class="form-group">
              <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
            </div>
            <div class="form-group">
              <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
              <input type="password" name="passwordConf" placeholder="Confirm password">
            </div>
            <div class="form-group">
              <button type="submit" name="signup-btn" class="register-btn">Submit</button>
            </div>

            <?php if(count($errors) > 0): ?>
            <div class="login-error">
              <?php foreach($errors as $error): ?>
              <li><?php echo $error; ?></li>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>

            <div class="register-msg">
              <p class="txt">Already a member? <a class="login" href="login.php">Log in</a></p>
            </div>

        </form>
    </div>
  </div>

</body>

</html>