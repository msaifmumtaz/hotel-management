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

if (!$rooms->add_room_category($catname)) {
    echo json_encode(array("status" => 400, "msg" => "Category Creation Failed Please Try Again."));
} else {
    echo json_encode(array("status" => 200, "msg" => "New Category added  Successfully"));
}
