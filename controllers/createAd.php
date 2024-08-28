<?php

declare(strict_types=1);

$title = $_POST['title'];
$description = $_POST['description'];
$price = (float)$_POST['price'];
//$branch = (int)$_POST['branch'] ?? null;
$address = $_POST['address'];
$rooms = (int)$_POST['rooms'];

if ($_POST['title']
    && $_POST['description']
    && $_POST['price']
    && $_POST['address']
    && $_POST['rooms']) {


    $newAdId = (new \App\Ads())->create(
        $title,
        $description,
        1,
        1,
        1,
        $address,
        $price,
        $rooms
    );

//    dd($newAdId);

    if ($newAdId) {

        $imageHandler = new \App\Image();
        $fileName = $imageHandler->handleUpload();

        if (!$fileName) {
            exit('file failed to load');
        }

        $imageHandler->addImage((int) $newAdId, $fileName);

        header('location: /');
        exit();
    }
    return;
}
echo "Please fill all the fields";
