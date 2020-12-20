<html lang="en">

  <head>
    <?php
      include_once 'head.php';
    ?>
  <!-- Missing stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script>
/*  var myText = document.getElementById('myText');
  var wordCount = document.getElementById('wordCount');
  var warning = document.getElementById('warning');
  myText.addEventListener("input", function(){
    var characters = myText.value.split('');
    wordCount.innerText = characters.length;
  }); */
  </script>
  </head>

  <body>
    <!-- Navigation -->

    <?php
      include_once 'navbar.php';
      //$sql = "SELECT * FROM users WHERE user_uid = '$uid' OR user_email = '$uid'";
      //$result = mysqli_query($conn, $sql);
    ?>
<br>
<br>
    <!-- Page Content -->
    <div class="container" style = "padding-top:70px;">
      <?php
      include_once 'includes/dbh_inc.php';
      if (isset($_GET['user'])) {
        $uid = $_GET['user'];
        $sql = "SELECT * FROM users WHERE user_uid = '$uid' OR user_email = '$uid'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
      //  echo $row['user_first'];
      }

      if (isset($_POST['submit'])) {
        include 'includes/dbh_inc.php';
        $uid = $_GET['user']; //$uid is the username of the user's page
        $sender = mysqli_real_escape_string($conn, $_SESSION['u_uid']); //$_SESSION['u_uid'] is the current user
        $recommend = mysqli_real_escape_string($conn, $_POST['recommendation']);
        //echo $sender;
        //echo $recommend;
      //error handling
       date_default_timezone_set('America/New_York');
       $time = date("Y-m-d H:i:s");
       //echo $time;
       //echo $uid;
      //check to see if recommendation is 500 characters long or less
        if (strlen($recommend) > 500) {
          header("Location: ./user.php?user=$uid&recommendation=too_long");
          exit();
        }

      /*  $sql = "INSERT INTO recommendations (user_uid, user_comment, user_time, user_for)
        VALUES ('$sender', '$recommend', NOW(), $uid);"; */
        $sql = "INSERT INTO recommendations (user_uid, user_comment, user_time, user_for)
        VALUES ('$sender', '$recommend', '$time', '$uid');";
        mysqli_query($conn, $sql);
        //header("Location: ./user.php?user=$uid&recommendation=success");
        //exit();
      }

      if (isset($_POST['newFriend'])) {
        header("Location: ./user.php?user=$uid&addFriend=success");
        $_SESSION['friend'] = "yep";
        exit();
      }

      if (isset($_POST['removeFriend'])) {
        header("Location: ./user.php?user=$uid&removeFriend=success");
        $_SESSION['friend'] = "nope";
        exit();
      }

      ?>
      <?php
      if (isset($_GET['addFriend']) && $_GET['addFriend'] == 'success') {
        echo "<div class='alert alert-success'>
        You are now following " . $row['user_uid'] ."!</div>";
      }

      if (isset($_GET['removeFriend']) && $_GET['removeFriend'] == 'success') {
        echo "<div class='alert alert-success'>
        You are no longer following " . $row['user_uid'] ."!</div>";
      }

      ?>
      <h2 style = "font-family: Verdana; display: inline;"> <?php echo $row['user_uid'];?> </h2>
    <form action = "" method = "post" style = "display:inline">
    <?php
    if ($_SESSION['friend'] == "yep") {
      echo "<i class='fa fa-check' style = 'font-size: 16px; color: green'> </i> <p style = 'color: green; font-size: 16px; display: inline'> Following </p>";
      echo "<button type='submit' class='btn btn-danger' name = 'removeFriend' style = 'display:inline'> Remove friend";
    }
    else {
      echo "<button type='submit' class='btn btn-primary' name = 'newFriend' style = 'display:inline'> Add Friend";
    }
    ?>
    </button></form>
      <br> <br>
      <div class = "row">
        <div class =  "col-md-6">
          <img src = "images/photo.jpg" style = "height: auto; width: 50%;"/>
          <br> <br>
          <h4 style = "font-family: Verdana"> Bio: </h4>
          <p style = "font-family: Verdana; font-size: 16px;">
            <?php echo $row['user_bio']; ?>
          </p>
          <br>
          <h4 style = "font-family: Verdana"> Interests: </h4>
          <p style = "font-family: Verdana; font-size: 16px:">
            <?php echo $row['user_interests']; ?>
          </p> <br>
        </div>
        <div class = "col-md-6">
          <h4 style = "font-family: Verdana"> Favorite Movies/Shows: </h4>
            <p style = "font-family: Verdana; font-size: 16px;"> <?php echo $row['user_faves']; ?> </p>
          <br>
          <h4 style = "font-family: Verdana"> Friends: </h4>
            <p style = "font-family: Verdana; font-size: 16px;"> You haven't added any friends yet! </p>
          </h4>
        </div>
      </div>
      <br>
      <hr style = "border-width: 4px;">
      <h4 style = "font-family: Verdana"> Recommendations: </h4> <br>
      <?php
      $sql = "SELECT * FROM recommendations WHERE user_for = '$uid' ORDER BY user_time DESC";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class = 'container' style = 'border:2px solid'>";
        echo "<p style = 'font-family: Verdana; font-size: 16px'>" . $row['user_comment'] . "</p>";
        echo "<p style = 'font-family: Verdana; font-size: 12px'> Submitted by " . $row['user_uid'] . " - " . "<em>" . $row['user_time'] . "</em></p>" .
      "</div> <br>";
    }
      ?>
      <p style = "font-family: Verdana; font-size: 16px;"> Write a recommendation: </p>
      <form action = "" method = "post">
        <div class="form-group">
          <textarea id = "myText" class="form-control" rows = "3" name = "recommendation" placeholder = "What would you recommend to <?php echo$row['user_uid'];?>? (500 character max)" required></textarea>
      <?php
      if (isset($_GET['recommendation']) && $_GET['recommendation'] == 'too_long') {
        echo "<div class='alert alert-warning'>
        You exceeded the 500 character limit! Please try again.
      </div>";
      }
      ?>
      <!--    <p id = "warning"> <span id = "wordCount">0</span>/500 Characters </p> -->
        </div>
        <button type="submit" name = "submit" class="btn btn-default">Submit</button>
      </form>
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
