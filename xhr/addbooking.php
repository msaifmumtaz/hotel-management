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
$book=new Booking($conn);

$fname=$_POST["fname"];
$lname=$_POST["lname"];
$phoneno=$_POST["phoneno"];
$email=$_POST["email"];
$address=$_POST["address"];
$country=$_POST["country"];
$idcard=$_POST["idcard"];
$idtype=$_POST["id_type"];
$checkin=$_POST["checkin"];
$checkout=$_POST["checkout"];
$guests=$_POST["guests"];
$catid=$_POST["category"];
$subcatid=$_POST["subcategory"];
$room_no=$_POST["room_no"];
$package=$_POST["package"];
$price=$_POST["price"];
$extrabed=$_POST["extrabed"];
$totalpayment=$_POST["totalpayment"];
$paid=$_POST["paid"];
$paymentmethod=$_POST["paymentmethod"];
$customer_no=bin2hex(random_bytes(4));

if ($book->add_booking($customer_no,$fname,$lname,$address,$phoneno,$email,$idcard,$idtype,$country,$catid,$subcatid,$room_no,$extrabed,$package,$guests,$checkin,$checkout,$totalpayment,$paid,$paymentmethod)) {
    echo json_encode(array("status" => 200, "msg" => "Room Booking Successfull"));
} else {
    echo json_encode(array("status" => 400, "msg" => "Room Booking Failed Please Try Again."));

}
