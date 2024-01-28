<?php

class ImageUploader {
    private $uploadDirectory;
    private $database;

    public function __construct($uploadDirectory,$database) {
        $this->uploadDirectory = $uploadDirectory;
        $this->database = $database;
    }

    public function processUpload() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handlePostRequest();
        } else {
            $this->displayForm();
        }
    }

    private function handlePostRequest() {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
            $targetPath = $this->uploadDirectory . $fileName;

            if ($this->moveUploadedFile($targetPath)) {
                $this->insertImagePathIntoDatabase($targetPath);
            } else {
                echo "Error uploading image.";
            }
        } else {
            echo "Please select an image to upload.";
        }
    }

    private function moveUploadedFile($targetPath) {
        return move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
    }

    private function insertImagePathIntoDatabase($targetPath) {
        if ($this->database->insertImagePath($targetPath)) {
            $_SESSION['image_upload_success'] = true;
        } else {
            $_SESSION['image_upload_error'] = "Error inserting image path into the database.";
        }
    }
    

    private function displayForm() {
        header("location:/uploadfunction.php");
    }
}
