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
$book = new Booking($conn);

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$phoneno = $_POST["phoneno"];
$email = $_POST["email"];
$address = $_POST["address"];
$country = $_POST["country"];
$idcard = $_POST["idcard"];
$idtype = $_POST["id_type"];
$checkin = $_POST["checkin"];
$checkout = $_POST["checkout"];
$guests = $_POST["guests"];
$catid = $_POST["category"];
$subcatid = $_POST["subcategory"];
$room_no = $_POST["room_no"];
$packages = $_POST["packages"];
$totalpayment = $_POST["totalpayment"];
$paid = $_POST["paid"];
$paymentmethod = $_POST["paymentmethod"];
$customer_no = bin2hex(random_bytes(4));
$bookid = $_POST["bookid"];
if ($book->add_booking($bookid, $customer_no, $fname, $lname, $address, $phoneno, $email, $idcard, $idtype, $country, $catid, $subcatid, $room_no, $guests, $checkin, $checkout, $totalpayment, $paid, $paymentmethod)) {
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
        $book->add_book_package($bookid, $pname, $package["extrabed"], $breakfast, $lunch, $dinner, $package["date_time"]);
    }
    echo json_encode(array("status" => 200, "msg" => "Room Booking Successfull"));
} else {
    echo json_encode(array("status" => 400, "msg" => "Room Booking Failed Please Try Again."));
}
