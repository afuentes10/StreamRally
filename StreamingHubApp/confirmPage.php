<html lang="en">

  <head>
    <?php
      include_once 'head.php';
    ?>

  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Stream Rally</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

        </div>
      </div>
    </nav>
<br>
<br>
    <!-- Page Content -->
    <div class="container" style = "padding-top:70px; margin-bottom: 25%;">
      <h2 style = "font-family: Verdana; text-align: center;"> Success! </h2>
      <hr>
      <br>
      <p style = "font-family: Verdana; text-align: center; font-size: 16px;">
        Thank you for signing up. You are now being redirected to the homepage... </p>
      <img src =
    </div>
    <!-- /.container -->
    <?php
    echo "<script>setTimeout(\"location.href = './index.php';\",2500);</script>";

    ?>
    <!-- Footer -->
    <?php
      include_once 'footer.php';
      ?>


  </body>

</html>
