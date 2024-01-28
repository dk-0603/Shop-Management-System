<?php
// session_start();
$images = $app['database']->selectAll('images');

require 'views/gallery.view.php';