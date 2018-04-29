<html lang="en">

  <head>
    <?php
      include_once 'head.php';
    ?>
  <style>

  </style>
  </head>

  <body>
    <!-- Navigation -->

    <?php
      include_once 'navbar.php'
    ?>
<br>
<br>
    <!-- Page Content -->
    <div class="container" style = "padding-top:70px;">
      <h2 style = "font-family: Verdana" > <?php echo $_SESSION['u_uid']; ?> </h2>
      <br>
      <div class = "row">
        <div class =  "col-md-6">
          <img src = "images/photo.jpg" style = "height: auto; width: 50%;"/>
          <br> <br>
          <h4 style = "font-family: Verdana"> Bio: </h4>
          <p style = "font-family: Verdana; font-size: 16px;">
            <?php echo $_SESSION['u_bio']; ?>
          </p>
          <br>
          <h4 style = "font-family: Verdana"> Interests: </h4>
          <p style = "font-family: Verdana; font-size: 16px:">
              <?php echo $_SESSION['u_interests']; ?>
          </p> <br>
        </div>
        <div class = "col-md-6">
          <h4 style = "font-family: Verdana"> Favorite Movies/Shows: </h4>
            <p style = "font-family: Verdana; font-size: 16px;"> <?php echo $_SESSION['u_faves']; ?> </p>
          <br>
          <h4 style = "font-family: Verdana"> Friends: </h4>
            <div class = "row">
              <div class = "col-sm-3">
                <a href = "user.php?user=jgraham"><img src = "images/photo2.png" style = "height: 30px; width: auto;" /> </a>
              </div>
              <div class = "col-sm-3">
                <img src = "images/photo2.png" style = "height: 30px; width: auto;" />
              </div>
            </div>
        </div>
      </div>
      <br>
      <h4 style = "font-family: Verdana"> Recommendations: </h4>
      <p style = "font-family: Verdana; font-size: 16px;"> You have no recommendations yet! </p>
    </div>
    <!-- /.container -->
<br>
<br>
    <!-- Footer -->
    <?php
      include_once 'footer.php';
      ?>


  </body>

</html>
