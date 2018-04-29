<?php

if (isset($_POST['submit'])) {
  include_once 'dbh_inc.php';
  $fName = mysqli_real_escape_string($conn, $_POST['fName']);
  $lName = mysqli_real_escape_string($conn, $_POST['lName']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $uid = mysqli_real_escape_string($conn, $_POST['uid']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

//Error handlers
 if (empty($fName) || empty($lName) || empty($email) || empty($uid) || empty($pwd))
 {
  header("Location: ../signup.php?signup=empty");
  exit();
 }
 else {
   //Check if input characters are valid
      if (!preg_match("/^[a-zA-Z]*$/", $fName) || !preg_match("/^[a-zA-Z]*$/", $lName)) {
        header("Location: ../sign_up.php?signup=invalid");
        exit();
      }
      //if input characters are valid
      else {
        //Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          header("Location: ../sign_up.php?signup=email");
          exit();
        }
        else {
          $sql = "SELECT * FROM users WHERE user_uid='$uid'";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);

          if ($resultCheck > 0) {
            header("Location: ../sign_up.php?signup=usertaken");
            exit();
          }
          else {
            //Hashes the password
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            //Insert the user into the database
            $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd)
            VALUES ('$fName', '$lName', '$email', '$uid', '$hashedPwd');";
            mysqli_query($conn, $sql);
            header("Location: ../sign_up.php?signup=success");
            exit();
          }
        }
      }
    }
}

 else {
  header("Location: ../sign_up.php");
  exit();
}
