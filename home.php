<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 23-9-2018
 * Time: 16:29
 */
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./img/favicon/android-icon-192x192.png">
    <title>AS'80</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.1/examples/jumbotron/jumbotron.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <!-- Fontawesome symbols -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <script src="lib/disable_collapse.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        //Laad de 1e pagina
        $(document).ready(function(){
            $('#div1').load('frontpage.php');
        });
    </script>
</head>

<body class="bg-primary">

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
    <div class="container">
    <a class="navbar-brand" href="frontpage.php"><img src="img/clublogo2.png" id="logo"/><p>V.V. AS'80</p></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <hr>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="frontpage.php" data-toggle="collapse" data-target="#navbarsExampleDefault"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="./nieuws.php" data-toggle="collapse" data-target="#navbarsExampleDefault"><i class="fas fa-newspaper"></i> Nieuws</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./media.php" data-toggle="collapse" data-target="#navbarsExampleDefault"><i class="fas fa-video"></i> Media</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./pool.php" data-toggle="collapse" data-target="#navbarsExampleDefault"><i class="fas fa-car"></i> Carpool</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./overons.php" data-toggle="collapse" data-target="#navbarsExampleDefault"><i class="fas fa-info-circle"></i> Over ons</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./contact.php" data-toggle="collapse" data-target="#navbarsExampleDefault"><i class="far fa-envelope"></i> Contact</a>
            </li>
        </ul>
    </div>
    </div>
</nav>

<main role="main">
    <div id="div1">

    </div>
</main>

<footer class="container">
    <p class="text-white">&copy; V.V. AS'80 2018. Alle rechten voorbehouden.</p>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/docs/4.1/dist/js/bootstrap.min.js"></script>
</body>
</html>

