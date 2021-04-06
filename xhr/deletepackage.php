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

$packid = $_POST["pack_id"];

if ($rooms->delete_package($packid)) {
    echo json_encode(array("status" => 200, "msg" => "Package Deleted Successfully"));
} else {
    echo json_encode(array("status" => 400, "msg" => "Package Deletation Failed Please Try Again."));
}
