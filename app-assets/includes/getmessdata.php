<?php
// +------------------------------------------------------------------------+|
// | @author: Muhammad Saif                                                  |
// | @author_email: m.saifmumtaz@gmail.com                                   |
// | Created Date: Tuesday 30 March 2021                                     |
// +------------------------------------------------------------------------+|
// | HMS - Hotel Management System                                           |
// | Copyright (c) 2021 saifcodes All rights reserved.                       |
// +------------------------------------------------------------------------+|
require_once dirname(__FILE__,3)."/vendor/autoload.php";

use HMS\Classes\Booking;
use HMS\Classes\DbConnect;

$db= New DbConnect;
$conn= $db->DbConnection();
$booking= new Booking($conn);

if(isset($_GET["date_time"]) && !empty($_GET["date_time"])){
    $date=date("Y-m-").str_pad($_GET["date_time"], 2, "0", STR_PAD_LEFT);
}else{
    $date=date("Y-m-d");
}
$breakfast_report=$booking->get_breakfast_report($date);
$lunch_report=$booking->get_lunch_report($date);
$dinner_report=$booking->get_dinner_report($date);