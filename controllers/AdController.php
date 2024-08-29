<?php

declare(strict_types=1);

namespace Controller;
use App\Ads;
use PDO;

class AdController
{
    public function show($id): void
    {
        /**
         * @var $id
         */

        $ad = (new \App\Ads())->getAd($id);

        $ad->image = "../assets/images/ads/$ad->image";

        view(path: 'single-ad', args: ['ad' => $ad]);
    }

    public function createAd(): void
    {

        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = (float)$_POST['price'];
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
                16,
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

    }

}