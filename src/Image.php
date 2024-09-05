<?php

namespace App;

use PDO;

class Image
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function addImage(int $adsId, string $name)
    {
        $query = "INSERT INTO ads_image (ads_id, name) VALUES (:ads_id, :name)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':ads_id', $adsId);
        $stmt->bindParam(':name', $name);

        return $stmt->execute();
    }

    public function handleUpload(): string
    {
            // Check if file uploaded
            if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
                if ($_FILES['image']['error'] == 4) {
                    return 'imag.jpg';
                }
                exit('Error: ' . $_FILES['image']['error']);
            }

            // Extract file name and path
            $name = $_FILES['image']['name'];
            $path = $_FILES['image']['tmp_name'];

            $uploadPath = basePath('/public/assets/images/ads');

            // check if upload directory exists
            if (!is_dir($uploadPath)) {

                mkdir($uploadPath);
            }

            // Rename file
            $filename = uniqid() . '___' . $name;
            $fullFilePath = "$uploadPath/$filename";

            // upload file
            $fileUploaded = move_uploaded_file($path, $fullFilePath);

            if (!$fileUploaded) {
                exit("File could not be uploaded");
            }
            return $filename;

    }

    public function getImagesId(int $adsId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM ads_image WHERE ads_id = :ads_id");
        $stmt->bindParam(':ads_id', $adsId);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function deleteimage(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM ads_image WHERE ads_id = :ads_id");
        $stmt->bindParam('ads_id', $id);
        return $stmt->execute();
    }

}