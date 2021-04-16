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
$checkout = $_POST["checkout"];
$packages = $_POST["packages"];
$totalpayment = $_POST["totalpayment"];
$nowpaid = (int) $_POST["paid"];
$expaid = (int) $_POST["expaid"];

$paymentmethod = $_POST["paymentmethod"];
$bookid = $_POST["bookid"];
$paid=$nowpaid+$expaid;
if ($booking->extend_booking($bookid, $checkout, $totalpayment, $paid)) {
    foreach ($packages as $package) {
        $package_name = $package["package"];
        if ($package_name == "room") {
            $pname = "Room Only";
            $breakfast = "no";
            $lunch = "no";
            $dinner = "no";
        } elseif ($package_name == "breakfast") {
            $pname = "Breakfast Only";
            $breakfast = "yes";
            $lunch = "no";
            $dinner = "no";
        } elseif ($package_name == "lunch") {
            $pname = "Lunch Only";
            $breakfast = "no";
            $lunch = "yes";
            $dinner = "no";
        } elseif ($package_name == "dinner") {
            $pname = "Dinner Only";
            $breakfast = "no";
            $lunch = "no";
            $dinner = "yes";
        } elseif ($package_name == "breakfast,dinner") {
            $pname = "Breakfast & Dinner";
            $breakfast = "yes";
            $lunch = "no";
            $dinner = "yes";
        } elseif ($package_name == "breakfast,lunch") {
            $pname = "Breakfast & Lunch";
            $breakfast = "yes";
            $lunch = "yes";
            $dinner = "no";
        } elseif ($package_name == "lunch,dinner") {
            $pname = "Lunch & Dinner";
            $breakfast = "no";
            $lunch = "yes";
            $dinner = "yes";
        } elseif ($package_name == "breakfast,lunch,dinner") {
            $pname = "Breakfast, Lunch & Dinner";
            $breakfast = "yes";
            $lunch = "yes";
            $dinner = "yes";
        }
        // var_dump($package); 
        if (!$booking->add_book_package($bookid, $pname, $package["extrabed"], $breakfast, $lunch, $dinner, $package["date_time"])) {
            echo json_encode(array("status" => 400, "msg" => "Room Booking Extend Failed Please Try Again."));
        }
    }
    echo json_encode(array("status" => 200, "msg" => "Room Booking Extended Successfull"));
} else {
    echo json_encode(array("status" => 400, "msg" => "Room Booking Extend Failed Please Try Again."));
}
