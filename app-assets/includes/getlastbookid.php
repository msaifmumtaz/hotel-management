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

use HMS\Classes\DbConnect;
use HMS\Classes\Booking;

$db= new DbConnect;
$conn=$db->DbConnection();
$booking=new Booking($conn);

$lastbookid=$booking->get_last_bookid();

if (empty($lastbookid)|| $lastbookid==""){
    $bookid= 1;
}else{
    $bookid=$lastbookid+1;
}