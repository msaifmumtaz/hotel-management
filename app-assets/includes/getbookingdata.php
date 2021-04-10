<?php
// +------------------------------------------------------------------------+|
// | @author: Muhammad Saif                                                  |
// | @author_email: m.saifmumtaz@gmail.com                                   |
// | Created Date: Tuesday 30 March 2021                                     |
// +------------------------------------------------------------------------+|
// | HMS - Hotel Management System                                           |
// | Copyright (c) 2021 saifcodes All rights reserved.                       |
// +------------------------------------------------------------------------+|
require_once dirname(__FILE__, 3) . "/vendor/autoload.php";

use HMS\Classes\Booking;
use HMS\Classes\DbConnect;
use HMS\Classes\Rooms;

$db = new DbConnect;
$conn = $db->DbConnection();
$booking = new Booking($conn);
$rooms = new Rooms($conn);

$bookid = $_GET["book_id"];
// print_r($bookid);
if ($bookid != "" || !empty($bookid)) {
    $bookingdata = $booking->get_booking($bookid);
    $category = $rooms->get_category($bookingdata["catid"]);
    $bookingdata["cate_name"] = $category["category_name"];
    $subcategory = $rooms->get_subcategory($bookingdata["subcatid"]);
    $bookingdata["subcate_name"] = $subcategory["name"];
    $packagesdata=$booking->get_all_bookings_package($bookid);
} else {
    header("location: /404");
}
