<?php
// +------------------------------------------------------------------------+|
// | @author: Muhammad Saif                                                  |
// | @author_email: m.saifmumtaz@gmail.com                                   |
// | Created Date: Tuesday 30 March 2021                                     |
// +------------------------------------------------------------------------+|
// | HMS - Hotel Management System                                           |
// | Copyright (c) 2021 saifcodes All rights reserved.                       |
// +------------------------------------------------------------------------+|
require_once("../vendor/autoload.php");

use HMS\Classes\DbConnect;
use HMS\Classes\FileManager;
use HMS\Classes\Rooms;

$db = new DbConnect;
$conn = $db->DbConnection();
$rooms = new Rooms($conn);
$uploader = new FileManager;

$catname = $_POST["catname"];
$price = $_POST["price"];
$image = $_FILES["roomimage"];
$imagename = bin2hex(random_bytes(2));
$fileupload = $uploader->image_upload($image, $imagename, "rooms");
if ($fileupload["status"] != 200) {
    echo json_encode(array("status" => 400, "msg" => $fileupload["message"]));
} elseif (!$rooms->add_room_category($catname,$price,$fileupload["path"])) {
    echo json_encode(array("status" => 400, "msg" => "Category Creation Failed Please Try Again."));
} else {
    echo json_encode(array("status" => 200, "msg" => "New Category added  Successfully"));
}
