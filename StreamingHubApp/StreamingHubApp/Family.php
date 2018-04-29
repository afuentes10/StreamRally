<?php
$genre_url='https://api.themoviedb.org/3/genre/movie/list?language=en-US&api_key=978bf67e41a30cf0d56f7693c187992c';
$genre_json = file_get_contents($genre_url);
$genre_array = json_decode($genre_json, true);



$s = "";

foreach ($genre_array['genres'] as $results) {

if($results[name]=="Family")
  $genre_id="$results[id]";


}
$page_number="1";
$query_string="/genre/$genre_id/movies?page=$page_number&sort_by=created_at.asc&include_adult=false&language=en-US&api_key=978bf67e41a30cf0d56f7693c187992c";

 $finder_url="https://api.themoviedb.org/3". $query_string;

  $finder_json = file_get_contents($finder_url);
  $finder_array = json_decode($finder_json, true);

 $img_url_prefix = "http://image.tmdb.org/t/p/w500/";




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

if(!empty($finder_array)){
  foreach ($finder_array['results'] as $results) {
#echo <'img src="'.$image['page'][1]['results']['poster_path'].'"alt=""/>';
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
