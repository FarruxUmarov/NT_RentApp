<?php

declare(strict_types=1);

$title       = $_POST['title'];
$description = $_POST['description'];
$price       = (float) $_POST['price'];
$gender      = $_POST['gender'];
$branch      = (int) $_POST['branch'];
$address     = $_POST['address'];
$rooms       = (int) $_POST['rooms'];


$name = $_POST['image']['name'];
$path = $_FILES['image']['tmp_name'];

//dd($_FILES);

if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $uploadPath =  basePath('/public/assets/images/ads');
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath);
    }
    move_uploaded_file($path, $uploadPath . '/' . $name);

}

$image = new \App\Image();
//$image->addImage('');

if ($_POST['title']
    && $_POST['description']
    && $_POST['price']
    && $_POST['address']
    && $_POST['rooms']
) {

    $newAd = (new \App\Ads())->create(
        $title,
        $description,
        5,
        1,
        1,
        $address,
        $price,
        $rooms
    );

    if($newAd){
        header('Location: /');
        exit();
    }
    return;
}
echo "Iltimos, barcha bo'sh maydonlarni to'ldiring";
