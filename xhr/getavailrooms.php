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

$catid=$_POST["category"];
$subcatid=$_POST["subcategory"];
$check_in=$_POST["checkin"];
$check_out=$_POST["checkout"];

$room=$rooms->get_avail_rooms($check_in,$check_out,$catid,$subcatid);
if($room){
    foreach($room as $rm){
        echo '<option value="'.$rm["room_no"].'">'.$rm["room_no"].'</option>';
    }
}else{
    echo '<option value="no-rrom"> No Room Found</option>';

}