<?php
session_start();

if (isset($_POST['submit'])) {
  include 'dbh_inc.php';

  $uid = mysqli_real_escape_string($conn, $_POST['uid']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
//Error handlers

//Check if inputs are empty
if (empty($uid) || empty($pwd)) {
  header("Location: ../log_in.php?login=error");
  exit();
}
else {
  $sql = "SELECT * FROM users WHERE user_uid = '$uid' OR user_email = '$uid'";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck < 1) {
        header("Location: ../log_in.php?login=error");
        exit();
    }
  else {
    if ($row = mysqli_fetch_assoc($result)) {
      //de-hashing the password
      $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
      if ($hashedPwdCheck == false) {
          header("Location: ../log_in.php?login=error");
          exit();
      }
      elseif ($hashedPwdCheck == true) {
         //log in the user
         $_SESSION['u_id'] = $row['user_id'];
         $_SESSION['u_fname'] = $row['user_first'];
         $_SESSION['u_lname'] = $row['user_last'];
         $_SESSION['u_email'] = $row['user_email'];
         $_SESSION['u_uid'] = $row['user_uid'];
         $_SESSION['u_bio'] = $row['user_bio'];
         $_SESSION['u_interests'] = $row['user_interests'];
         $_SESSION['u_faves'] = $row['user_faves'];
         $_SESSION['friend'] = ""; 
         echo "<h5> Fifth Success </h5>";
         header("Location: ../index.php?login=success");
         exit();

      }
    }
  }
}
}

else {
  header("Location: ../log_in.php?login=error");
  exit();
}
