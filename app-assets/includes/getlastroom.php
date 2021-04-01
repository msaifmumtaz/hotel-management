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
use HMS\Classes\Rooms;

$db= new DbConnect;
$conn=$db->DbConnection();
$rooms=new Rooms($conn);

$lastroomid=$rooms->get_last_roomid();

if (empty($lastroomid)|| $lastroomid==""){
    $room_id= 001;
}else{
    $room_id=$lastroomid+1;
}