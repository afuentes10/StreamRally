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
      <div class= "container">
        <h2 style = "font-family: Verdana;"> Popular Discussions </h2> <br>
        <p style = "font-family: Verdana; font-size: 16px;">
          None yet. Be the first one to start a discussion!
        </p>
        <br> <br> <br> <br>
      </div>
      <div class= "container">
        <h2 style = "font-family: Verdana;"> Search Discussions </h2> <br>
        <form action = "" method = "post">
          <div class="form-group">
            <input type = "text" class="form-control" name = "username" placeholder = "Search discussion" required>
          </div>
          <button type="submit" name = "submit" class="btn btn-default">Search</button>
        </form>
        <br> <br> <br> <br>
      </div>
      <div class= "container">
        <h2 style = "font-family: Verdana;"> Start a Discussion</h2> <br>
        <form action = "" method = "post">
          <div class="form-group">
            <input type = "text" class="form-control" name = "username" placeholder = "Enter your username" required>
          </div>
          <div class="form-group">
            <input type = "text" class="form-control" name = "topic" placeholder = "Enter the topic you want to discuss" required>
          </div>
          <div class="form-group">
            <textarea id = "myText" class="form-control" rows = "3" name = "recommendation" placeholder = "Description (optional)"></textarea>
          </div>
        <button type="submit" name = "submit" class="btn btn-default">Start discussion</button>
       </form>
      </div>
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
