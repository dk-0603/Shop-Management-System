 <?php

 $uploadDirectory = 'Assets/images/gallery/';

$uploader = new ImageUploader($uploadDirectory,$app['database']);

// Process the image upload.
$uploader->processUpload();
