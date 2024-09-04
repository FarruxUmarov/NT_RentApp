<?php

declare(strict_types=1);

namespace Controller;
use App\Ads;
use App\Branch;
use App\Session;
use App\Status;
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

    public function create(): void
    {
        $branches = (new Branch())->getBranches();
        view('dashboard/create_ad', ['branches' => $branches]);
    }

    public function store(): void
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

//            dd($_POST);

            $newAdId = (new \App\Ads())->create(
                $title,
                $description,
                (new Session())->getId(),
                1,
                (int)$_POST['branch_id'],
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

    public function update(int $id): void{
        $branches = (new Branch())->getBranches();
        $statuses = (new Status())->getStatuses();
        view('dashboard/create_ad', ['ad' => (new \App\Ads())->getAd($id), 'branches' => $branches, 'statuses' => $statuses]);
    }

    public function edit(int $id): void{
        $user_id = (new \App\Session())->getId();
        $ad = (new \App\Ads());
        $ad->updateAds($id, $_POST['title'], $_POST['description'], (int)$user_id, (int)$_POST['status_id'], (int)$_POST['branch_id'], $_POST['address'], (float)$_POST['price'], (int)$_POST['rooms']);
        header('location: /profile');

    }

//    public function delete(int $id): void{
//        $ad = (new \App\Ads());
//        $ad->delete($id);
//        header('location: /profile');
//        exit();
//
//    }

}