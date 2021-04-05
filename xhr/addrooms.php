<?php
// +------------------------------------------------------------------------+|
// | @author: Muhammad Saif                                                  |
// | @author_email: m.saifmumtaz@gmail.com                                   |
// | Created Date: Tuesday 30 March 2021                                     |
// +------------------------------------------------------------------------+|
// | HMS - Hotel Management System                                           |
// | Copyright (c) 2021 saifcodes All rights reserved.                       |
// +------------------------------------------------------------------------+|
session_start();
require_once("../vendor/autoload.php");

use HMS\Classes\DbConnect;
use HMS\Classes\Rooms;

$db = new DbConnect;
$conn = $db->DbConnection();
$rooms = new Rooms($conn);

$subrooms = $_POST["subrooms"];
$roomid = $_POST["roomsid"];
$category = $_POST["category"];
$subcategory = $_POST["subcategory"];

if ($rooms->add_rooms($category, $subcategory,$roomno)) {
    echo json_encode(array("status" => 200, "msg" => "New Rooms Added Successfully"));
} else {
    echo json_encode(array("status" => 400, "msg" => "Rooms Creation Failed Please Try Again."));
}
