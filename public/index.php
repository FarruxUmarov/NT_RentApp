<?php
//ini_set('display_errors', 1);
////ini_set('display_startup_errors', 1);
////error_reporting(E_ALL);


require __DIR__.'/../vendor/autoload.php';
require '../bootstrap.php';
require '../helpers.php';
require '../router.php';
?>

<!doctype html>
<html lang="eng">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./styles/main.css" rel="stylesheet">
    <title>NTRA - Rent helder</title>
</head>
<body>

<!-- Navbar -->

<?php require 'partials/navbar.php';?>

<!-- Content -->

<?php require 'partials/content.php';?>

<!-- Footer -->


</body>
</html>