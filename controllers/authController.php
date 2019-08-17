<?php

session_start();

require 'config/db.php';
require_once 'emailController.php';

$errors = array();
$username = "";
$email = "";
$inviteEmail = "";

//if user clicks on the sign up button
if (isset($_POST['signup-btn'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $passwordConf = $_POST['passwordConf'];

  //validation
  if (empty($username)) {
    $errors['username'] = "Username required.";
  }
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "E-mail address is invalid.";
  }
  if (empty($email)) {
    $errors['email'] = "E-mail required.";
  }
  if (empty($password)) {
    $errors['password'] = "Password required.";
  }
  if ($password !== $passwordConf) {
    $errors['password'] = "The two passwords do not match.";
  }

  $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
  $stmt = $conn->prepare($emailQuery);
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $userCount = $result->num_rows;
  $stmt->close();

  if ($userCount > 0) {
    $errors['email'] = "This E-mail already exists.";
  }

  $tokenQuery = "SELECT * FROM users WHERE inviteToken=? AND verified=1 LIMIT 1";
  $stmt = $conn->prepare($tokenQuery);
  $stmt->bind_param('s', $_SESSION['inviteToken']);
  $stmt->execute();
  $result = $stmt->get_result();
  $userCount = $result->num_rows;
  $stmt->close();

  if ($userCount > 0) {
    $errors['inviteToken'] = "This invite has already been used.";
  }

  if (count($errors) === 0) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $token = bin2hex(random_bytes(50));
    $verified = false;


    $sql = "UPDATE users SET username=?, email=?, verified=?, token=?, password=? WHERE inviteToken='$_SESSION[inviteToken]'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssdss', $username, $email, $verified, $token, $password);
    
    if ($stmt->execute()) {
      //login user
      $user_id = $conn->insert_id;
      $_SESSION['id'] = $user_id;
      $_SESSION['username'] = $username;
      $_SESSION['email'] = $email;
      $_SESSION['verified'] = $verified;

      sendVerificationEmail($email, $token);

      //set flash message
      $_SESSION['message'] = "You are now logged in.";
      $_SESSION['alert-class'] = "alert-success";
      header('location: index.php');
      exit();
    } else {
      $errors['db_error'] = "Database error: failed to register";
    }
  }
}

//if user clicks the login button
if (isset($_POST['login-btn'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  //validation
  if (empty($username)) {
    $errors['username'] = "Username/E-mail required.";
  }
  if (empty($password)) {
    $errors['password'] = "Password required.";
  }

  if (count($errors) === 0) {
    $sql = "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('ss', $username, $username);//username is email and/or username
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if(password_verify($password, $user['password'])) {
    //login success
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['verified'] = $user['verified'];
    //set flash message
    $_SESSION['message'] = "You are now logged in.";
    $_SESSION['alert-class'] = "alert-success";
    header('location: index.php');
    exit();

  } else {
    $errors['login_fail'] = "Wrong credentials";
    }
  }

}


//logout user
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['id']);
  unset($_SESSION['username']);
  unset($_SESSION['email']);
  unset($_SESSION['verified']);
  header('location: login.php');
  exit();
}


//verify user by token
function verifyUser($token)
{
  global $conn;
  $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
  $result = mysqli_query($conn, $sql);


  if (mysqli_num_rows($result) > 0){
    $user = mysqli_fetch_assoc($result);
    $update_query = "UPDATE users SET verified=1 WHERE token='$token'";

    if (mysqli_query($conn, $update_query)) {
      //log user in
      $_SESSION['id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['verified'] = 1;
      //set flash message
      $_SESSION['message'] = "Your email address was successfully verified.";
      $_SESSION['alert-class'] = "alert-success";
      header('location: index.php');
      exit();
    }
  } else {
    echo 'User not found';
  }
}

//if user clicks on the invite button
if (isset($_POST['invite-btn'])) {
  $inviteEmail = $_POST['inviteEmail']; 
  
  //validation
  if (empty($inviteEmail)) {
    $errors['inviteEmail'] = "E-mail required.";
  }

  $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
  $stmt = $conn->prepare($emailQuery);
  $stmt->bind_param('s', $inviteEmail);
  $stmt->execute();
  $result = $stmt->get_result();
  $userCount = $result->num_rows;
  $stmt->close();

  if ($userCount > 0) {
    $errors['inviteEmail'] = "E-mail already exists.";
  }

  if (count($errors) === 0) {
    $inviteToken = bin2hex(random_bytes(50));

    $sql = "INSERT INTO users (inviteToken) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $inviteToken);

    if ($stmt->execute()) {

    sendInviteEmail($inviteEmail, $inviteToken);

    //set flash message
    $_SESSION['message'] = "Invite sent to " . $inviteEmail;
    $_SESSION['alert-class'] = "alert-success";
    header('location: invite.php');
    exit();
  } else {
    $errors['db_error'] = "Database error: failed to send invite";
   }
  }
}


//verify the invite token to access registration
function verifyInvite($inviteToken)
{
  global $conn;
  $sql = "SELECT * FROM users WHERE inviteToken='$inviteToken' LIMIT 1";
  $result = mysqli_query($conn, $sql);


  if (mysqli_num_rows($result) > 0){
    $user = mysqli_fetch_assoc($result);
    $update_query = "UPDATE users SET inviteVerified=1 WHERE inviteToken='$inviteToken'";

    if (mysqli_query($conn, $update_query)) {
      $user['inviteToken'] = $inviteToken;
      $_SESSION['inviteVerified'] = 1;
      $user['inviteVerified'] = 1;
      header('location: signup.php');
      exit();
    }
  } else {
    echo 'User not found';
  }
}
