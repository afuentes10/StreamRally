<?php
if(!empty($_GET['searchTitle'])){
  $movie_url = 'https://api.themoviedb.org/3/search/movie?api_key=978bf67e41a30cf0d56f7693c187992c&query=' . urlencode($_GET['searchTitle']);

  $movie_json = file_get_contents($movie_url);
  $movie_array = json_decode($movie_json, true);

 $img_url_prefix = "http://image.tmdb.org/t/p/w500/";
}

$discover_url='https://api.themoviedb.org/3/discover/movie?api_key=978bf67e41a30cf0d56f7693c187992c';
$discover_json = file_get_contents($discover_url);
$discover_array = json_decode($discover_json, true);


?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Stream Rally</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

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
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

 <div class="container">
 	<div class="jumbotron">
 		<h3 class="text-center">Search for Any Movie</h3>
 		<form id="searchForm" action="search.php" method="GET">
 			<input type="text" class="form-control" name="searchTitle" placeholder="Search Movie">
      <br/>

 		</form>
 	</div>
 </div>

 <div class="container">
 	<div id="movies" class="row"></div>
 </div>
 <div class="container">
  <div class="jumbotron">
<?php


if(!empty($movie_array)){
  foreach ($movie_array['results'] as $results) {
#echo <'img src="'.$image['page'][1]['results']['poster_path'].'"alt=""/>';
$s.="<h2> $results[original_title]</h2>";
$s.="<searchImages class= 'img'><img src=$img_url_prefix.$results[poster_path] height=150 width = 100/> </searchImages>";
$s.="<p1>$results[overview]</p1>";
$s.="<p2>Rating: $results[vote_average]/10</p2>";
$s.="<hr>\n\n\n";
}

echo $s;

}

else{
$s="<p> -No Result </p>";
echo $s;
  }

?>
    </div>
  </div>
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
  </div>
  <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
