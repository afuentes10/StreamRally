<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>

    <?php
      include_once 'head.php'
    ?>

  </head>
  <body>
    <?php
      include_once 'navbar.php'
    ?>
    <br>
    <br>
    <!-- Page content -->
    <div class = "nav-login" style = "padding-top: 70px;">
      <div style = "padding-left: 20%; padding-right: 20%; text-align: center;">
        <h2 style = "font-family: Verdana"> Create Your Account </h2>
        <p> <em> Don't worry, it only takes a minute </em> </p>
        <br>
<?php
if (isset($_GET['signup']) && $_GET['signup'] == 'invalid') {
  echo "<div class='alert alert-danger'>
  Please only enter letters for your name.
</div>";
}

if (isset($_GET['signup']) && $_GET['signup'] == 'email_Invalid') {
  echo "<div class='alert alert-danger'>
  Please enter a valid email address.
</div>";
}

if (isset($_GET['signup']) && $_GET['signup'] == 'usertaken') {
  echo "<div class='alert alert-warning'>
  Warning! Username taken or user with email address already exists. Please try again.
</div>";
}

if (isset($_GET['signup']) && $_GET['signup'] == 'success') {
  echo "<div class='alert alert-success'>
  <strong> Submitted! </strong> You have successfully created an account.
  <a href='log_in.php'> Log in here! </a>
</div>";
}
?>
      <form action = "includes/signup_inc.php" method = "post">
        <div class="form-group">
          <input type = "text" class="form-control" name = "fName" placeholder = "First Name" required>
        </div>
        <div class="form-group">
          <input type = "text" class="form-control" name = "lName" placeholder = "Last Name" required>
        </div>
        <div class="form-group">
          <input type = "text" class="form-control" name = "email" placeholder = "E-mail address" required>
        </div>
        <div class="form-group">
          <input type = "text" class="form-control" name = "uid" placeholder = "Username" required>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name = "pwd" placeholder = "Password" required>
        </div>
      <button type="submit" name = "submit" class="btn btn-default">Sign Up</button>
     </form>
    <br>
      <p> Already have an account? <a href="log_in.php"> Log in here. </a> </p>
    </div>
  </div>

<div class = "container">

</div>

<?php
 include_once 'footer.php';
?>
  </body>
</html>
