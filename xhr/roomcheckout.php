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

use HMS\Classes\Booking;
use HMS\Classes\DbConnect;
use HMS\Classes\Rooms;

$db = new DbConnect;
$conn = $db->DbConnection();
$rooms = new Rooms($conn);
$booking = new Booking($conn);

$totalpayment = (int) $_POST["totalpayment"];
$nowpaid = (int) $_POST["paid"];
$expaid = (int) $_POST["expaid"];

$bookid = $_POST["bookid"];
$paid = $nowpaid + $expaid;
if($paid!=$totalpayment){
    echo json_encode(array("status" => 400, "msg" => "You can not checkout without full payment."));
    exit;
}
if ($booking->room_checkout($bookid,$paid)) {
    echo json_encode(array("status" => 200, "msg" => "Room Checkout Successfull"));
} else {
    echo json_encode(array("status" => 400, "msg" => "Room CheckOut Failed Please Try Again."));
}
