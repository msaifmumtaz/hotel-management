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

$catid = $_POST["catid"];
$subcatid = $_POST["subcatid"];

if ($rooms->delete_rooms($catid,$subcatid)) {
    echo json_encode(array("status" => 200, "msg" => "Rooms Deleted Successfully"));
} else {
    echo json_encode(array("status" => 400, "msg" => "Rooms Deletation Failed Please Try Again."));
}
