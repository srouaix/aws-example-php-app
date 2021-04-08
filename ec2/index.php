
<?php
include 'common.php';
include 'function.php';

?>


<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>My movies app !</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Bootstrap core CSS -->
  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="navbar-top-fixed.css" rel="stylesheet">
</head>

<body>

   <main role="main" class="container">

    <h1 class="mt-5">Films (machine <?= gethostname() ?>)</h1>

    <hr>

    <h2 class="mt-5 mb-3">Nouveau film</h2>


    <form action="validation.php" method="post">
      <div class="form-group">
        <label for="title">Titre <span style="color: red; font-weight: bold;">*</span></label>
        <input type="text" class="form-control" id="title" name="title" placeholder="titre de votre article" required="required">
      </div>

      <div class="form-group">
        <label for="author">Année <span style="color: red; font-weight: bold;">*</span></label><?php
include 'common.php';
include 'function.php';

?>


<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>My movies app</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Bootstrap core CSS -->
  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <main role="main" class="container">
    <h1 class="mt-5">Movies (AWS EC2 VM <?= gethostname() ?>)</h1>
    <hr>
    <h2 class="mt-5 mb-3">New movie</h2>
    <form action="validation.php" method="post">
      <div class="form-group">
        <label for="title">Title <span style="color: red; font-weight: bold;">*</span></label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Movie title" required="required">
      </div>

      <div class="form-group">
        <label for="author">Year <span style="color: red; font-weight: bold;">*</span></label>
        <input type="text" class="form-control" id="year" name="year" placeholder="Year" required="required">
      </div>
      <button type="submit" class="btn btn-primary">Add</button>
    </form>
    <hr>
    <h2 class="mt-5 mb-5">Movies list</h2>
    <?php
      $movies = getMovies();
      foreach ($movies as $movie) {
        ?>
        <div class="card mt-5">
          <div class="card-header">
            <h2 class="h3"><?= $movie['title'] ?> <small class="text-muted font-italic"></h2>
          </div>
          <div class="card-body">
            <p class="card-text"><?= $movie['year'] ?></p>
          </div>
        </div>
      <?php
      }
    ?>
  </main>
  <footer class="page-footer font-small bg-dark mt-5">
    <div class="footer-copyright text-center py-3 text-white">© Copyright:
      <a href="#"> My Movies app</a>
    </div>
  </footer>
</body>

</html>
        <input type="text" class="form-control" id="year" name="year" placeholder="Année" required="required">
      </div>
      <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    <hr>
    <h2 class="mt-5 mb-5">Liste de films</h2>
    <?php
      $movies = getMovies();
      foreach ($movies['Items'] as $movie) {
            ?>
        <div class="card mt-5">
          <div class="card-header">
            <h2 class="h3"><?= $movie['title'] ?> <small class="text-muted font-italic"></h2>
          </div>
          <div class="card-body">
            <p class="card-text"><?= $movie['year'] ?></p>
          </div>
        </div>
      <?php
      }
    ?>
  </main>

  <footer class="page-footer font-small bg-dark mt-5">
    <div class="footer-copyright text-center py-3 text-white">© Copyright:
      <a href="#"> My movies</a>
    </div>
  </footer>
</body>

</html>
