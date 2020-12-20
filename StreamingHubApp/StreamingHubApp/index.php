

<?php
if(!empty($_GET['searchTitle'])){
  $movie_url = 'https://api.themoviedb.org/3/search/movie?api_key=978bf67e41a30cf0d56f7693c187992c&query=' . urlencode($_GET['searchTitle']);

  $movie_json = file_get_contents($movie_url);
  $movie_array = json_decode($movie_json, true);

 $img_url_prefix = "http://image.tmdb.org/t/p/w500/";
}

$discover_url='https://api.themoviedb.org/3/movie/269149?language=en-US&api_key=978bf67e41a30cf0d56f7693c187992c';
$discover_json = file_get_contents($discover_url);
$discover_array = json_decode($discover_json, true);


?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <link href="css/shop-homepage.css" rel="stylesheet">
    
    <?php
      include_once 'head.php';
    ?>
    <style>
    body {
      background-image: url("images/back.jpg");
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      height: 100%;
      width: 100%;
    }
    h1 {
      color: white;
    }
    </style>

  </head>

  <body>

    <!-- Navigation -->
    <?php
      include_once 'navbar.php';
    ?>

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
    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Stream Rally</h1>
          <div class="list-group">
            <?php
$genre_url='https://api.themoviedb.org/3/genre/movie/list?language=en-US&api_key=978bf67e41a30cf0d56f7693c187992c';
$genre_json = file_get_contents($genre_url);
$genre_array = json_decode($genre_json, true);



$s = "";

foreach ($genre_array['genres'] as $results) {
  $genre_name="$results[id]";
$s.="<a href='$results[name].php' name=$genre_name class='list-group-item'>$results[name]</a>";

}

echo $s;


?>

          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>


            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/sM33SANp9z6rXW8Itn7NnG1GOEs.jpg" alt="Zootopia" class="center">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/7WsyChQLEftFiDOVTGkv3hFpyyt.jpg" alt="Avengers Infinity War">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/30oXQKwibh0uANGMs0Sytw3uN22.jpg" alt="Rampage">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <div class="row">

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/sM33SANp9z6rXW8Itn7NnG1GOEs.jpg" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Zootopia</a>
                  </h4>
                  <h5>$24.99</h5>


                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/7WsyChQLEftFiDOVTGkv3hFpyyt.jpg" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Avengers Infinity War</a>
                  </h4>
                  <h5>$24.99</h5>

                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/30oXQKwibh0uANGMs0Sytw3uN22.jpg" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Rampage</a>
                  </h4>
                  <h5>$24.99</h5>

                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/uxzzxijgPIY7slzFvMotPv8wjKA.jpg" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Black Panther</a>
                  </h4>
                  <h5>$24.99</h5>

                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/coss7RgL0NH6g4fC2s5atvf3dFO.jpg" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">The Maze Runner</a>
                  </h4>
                  <h5>$24.99</h5>

                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/tWqifoYuwLETmmasnGHO7xBjEtt.jpg" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Beauty and the Beast</a>
                  </h4>
                  <h5>$24.99</h5>

                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; StreamRally 2018</p>
      </div>
      <!-- /.container -->
    </footer>

  </body>

</html>
