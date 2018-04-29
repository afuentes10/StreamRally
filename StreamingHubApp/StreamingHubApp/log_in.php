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
        <h2 style = "font-family: Verdana"> Welcome Back! </h2>
        <br>
      <form>
        <div class="form-group">
          <input type = "text" class="form-control" name = "uid" placeholder = "Username/e-mail" required>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name = "pwd" placeholder = "Password" required>
        </div>
      <button type="submit" class="btn btn-default">Submit</button>
     </form>
    <br>
      <p> Don't have an account? <a href="sign_up.php"> Sign up here. </a> </p>
    </div>
  </div>

<div class = "container">

</div>

<?php
 include_once 'footer.php';
?>
  </body>
</html>
