<?php 
/* ---------------------------------------------------
* Projet synthèse : H2018
* Fait Par : M-A Ramsay
*--------------------------------------------------- */
  $languages = ['en','fr'];
	$header['About'] = 'About';
	$header['My Projects'] = 'My Projects';
	$header['Contact me'] = 'Contact me';
	$header['CV'] = 'CV';
  if(isset($_SESSION['lang']) && $_SESSION['lang']=='fr'){

    $header['About'] = 'À propos';
    $header['My Projects'] = 'Mes Projets';
    $header['Contact me'] = 'Me contacter';

  }
	// https://startbootstrap.com/template-overviews/freelancer/
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Marc-Andre Ramsay</title>
  
	<!-- clickjack protection -->
	<script>
		if (top != self) top.location.replace(self.location.href); 
    </script> 
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    
    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    
    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
    
    <!-- Custom styles for this template -->
    <link href="css/freelancer.css" rel="stylesheet"/>
    <link href="css/global.css" rel="stylesheet" />
    
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index#me">M-A Ramsay</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index#about"><?= $header['About'] ?></a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index#portfolio"><?= $header['My Projects'] ?></a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index#contact"><?= $header['Contact me'] ?></a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="cv"><?= $header['CV'] ?></a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="action/LangSwitch.php"><?= (isset($_SESSION['lang']) && $_SESSION['lang']=== 'fr') ?  'en': 'fr'; ?></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


