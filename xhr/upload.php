<?php
require_once("../vendor/autoload.php");

use HMS\Classes\FileManager;

$file = $_FILES["saif"];
$uploader = new FileManager;
$path = "rooms";
$image_name = "saif";
$upload = $uploader->image_upload($file, $image_name, $path);
print_r($upload);
