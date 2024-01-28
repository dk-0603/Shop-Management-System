<?php

class ImageUploader {
    private $uploadDirectory;
    private $uploadedImagePaths = [];

    public function __construct($uploadDirectory) {
        $this->uploadDirectory = $uploadDirectory;
    }

    public function processMultipleUpload() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handlePostRequest();
        } else {
            $this->displayForm();
        }
    }

    private function handlePostRequest() {
        if (!empty($_FILES['images']['name'][0])) {
            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                $fileName = uniqid() . '_' . basename($_FILES['images']['name'][$key]);
                $targetPath = $this->uploadDirectory . $fileName;

                if ($this->moveUploadedFile($tmp_name, $targetPath)) {
                    $this->uploadedImagePaths[] = $targetPath;
                } else {
                    echo "Error uploading image.";
                }
            }

            $_SESSION['uploaded_image_paths'] = $this->uploadedImagePaths;
        } else {
            echo "Please select at least one image to upload.";
        }
    }

    private function moveUploadedFile($tmp_name, $targetPath) {
        return move_uploaded_file($tmp_name, $targetPath);
    }

    private function displayForm() {
        return;
    }

    public function getUploadedImagePaths() {
        return $this->uploadedImagePaths;
    }
}
