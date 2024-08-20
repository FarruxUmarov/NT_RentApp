<?php

declare(strict_types=1);

//view('admin/create_ad');
//dd($_POST);
//echo "Create ad controller"; // Error ishlab ketdi

$title = $_POST['title'];
$description = $_POST['description'];
$price = (float) $_POST['price'];
$gender = $_POST['gender'];
$branch = (int) $_POST['branch'];
$address = $_POST['address'];
$rooms = (int) $_POST['rooms'];

$newAd = (new \App\Ads())->getAds(
    $title,
    $description,
    1,
    1,
    1,
    $address,
    $rooms,
    $price
);

dd($newAd);