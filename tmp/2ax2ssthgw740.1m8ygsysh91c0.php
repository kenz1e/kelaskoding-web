<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Belajar Programming, Video Tutorial, Nodejs, angular, android, java, ionic, php, mysql, postgresql, heroku">
  <meta name="author" content="Hendro Steven">

  <title>KelasKoding.com</title>
  <link rel="icon" type="image/png" href="<?= $BASE ?>/ui/img/icon.png">
  <!-- Bootstrap core CSS -->
  <link href="<?= $BASE ?>/ui/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= $BASE ?>/ui/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- <link href="<?= $BASE ?>/ui/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet"> -->
  <!-- Custom styles for this template -->
  <link href="<?= $BASE ?>/ui/css/app.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?= $BASE ?>/">
          <img src="<?= $BASE ?>/ui/img/logo-small.png" width="40px" height="40px"/>
          KelasKoding.com
        </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
        aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?= $BASE ?>/">Depan
                <span class="sr-only">(current)</span>
              </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?= $BASE ?>/kelas">Kelas</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?= $BASE ?>/blog">Blog</a>
          </li>

          <?php if (!$SESSION['member']): ?>
            
              <li>
                <a href="<?= $BASE ?>/masuk">
                  <button class="btn btn-danger">Masuk</button>
                </a>
              </li>
            
            <?php else: ?>            
              <li class="nav-item active dropdown">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $SESSION['member']['fullname'] ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?= $BASE ?>/kelassaya" class="nav-link active">Kelas Saya</a></li>
                  <li><a href="<?= $BASE ?>/keluar" class="nav-link active">Keluar</a></li>                 
                </ul>
              </li>
            
          <?php endif; ?>

        </ul>
      </div>
    </div>
  </nav>