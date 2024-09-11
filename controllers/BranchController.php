<?php

namespace Controller;

use App\Branch;
use App\Image;
use App\Status;
use App\User;

class BranchController
{
    public function show(int $id): void
    {
        $branch = (new Branch())->getBranch($id);
        view('single-branch', ['branch' => $branch]);
    }

    public function create(): void
    {
//        $users = (new User())->getUsers();

        view('dashboard/create_branch');
    }

    public function storeBranch(): void
    {
        $name = $_POST['name'];
        $address = $_POST['address'];
        (new Branch())->create($name, $address);

        redirect('/adminBranches');
    }

    public function getAllBranches(): void
    {

        $branches = (new Branch())->getBranches();
        view('adminBranches', ['branches' => $branches]);
    }

    public function deleteBranch($id): void
    {
//dd($_POST);
        $imageHandle = (new Image());
        $image = $imageHandle->getImagesId($id);

        if ($image) {
            $uploadPath = basePath('public/assets/images/ads');
            $imageName = $image->getName();
            $filePath = $uploadPath . $imageName;
            if ($filePath !== 'image.jpg') {
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                $imageHandle->deleteImage($id);
            }
        }
        (new Branch())->delete($id);
        redirect('/adminBranches');
    }

    public function homeBranches(): void
    {
        $branches = (new Branch())->getBranches();
        view('branches', ['branches' => $branches]);
    }

}