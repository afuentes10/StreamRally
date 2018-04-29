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
  <?php
    include_once "head.php"
   ?>
  </head>

  <body>


    <!-- Navigation -->
<?php
 include_once "navbar.php"
?>
<br> <br>
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
$s = "";

if(!empty($movie_array)){
  foreach ($movie_array['results'] as $results) {
$s.="<h2> $results[original_title]</h2>";
$s.="<searchImages class= 'img'><img src=$img_url_prefix.$results[poster_path] height=150 width = 100/> </searchImages>";
$s.="<p1>$results[overview]</p1>";
$s.="<p2>Rating: $results[vote_average]/10</p2>";
$s.="<button type='button' class='btn btn-danger'>Add to Favorites <i class='fa fa-heart'></i> </button>";
$s.="<button type='button' class='btn btn-primary'>Add to WatchList <i class='fa fa-plus'></i> </button>";
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
<!-- Footer -->
<?php
  include_once 'footer.php'
 ?>

</body>

</html>
