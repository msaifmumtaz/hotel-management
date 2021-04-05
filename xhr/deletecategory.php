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
use HMS\Classes\Rooms;

$db = new DbConnect;
$conn = $db->DbConnection();
$rooms = new Rooms($conn);
$rcid=$_POST["subcatid"];

if (!$rooms->delete_room_category($rcid)) {
    echo json_encode(array("status" => 400, "msg" => "SubCategory Deleted Failed Please Try Again."));
} else {
    echo json_encode(array("status" => 200, "msg" => "SubCategory Deleted Successfully"));
}
