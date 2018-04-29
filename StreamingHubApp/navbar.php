<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">Stream Rally</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <?php
        if (isset($_SESSION['u_id'])) {
          echo "<li class='nav-item'>
            <a class='nav-link' href='forum.php' name = 'forum'>Forum</a>
          </li>";
          echo "<li class='nav-item'>
            <a class='nav-link' href='profile.php?user=$_SESSION[u_uid]'> Profile </a>
          </li>";
          echo "<li class='nav-item'>
            <a class='nav-link' href='includes/logout_inc.php' name = 'logout'>Log Out</a>
          </li>";

      }
        else {
          echo "<li class='nav-item'>
            <a class='nav-link' href='log_in.php'>Log In</a>
          </li>";
          echo "<li class='nav-item'>
            <a class='nav-link' href='sign_up.php'>Sign up</a>
          </li>";
        }
?>
      </ul>
    </div>
  </div>
</nav>
