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
$pack_name=$_POST["package"];

$package=$rooms->get_package($pack_name,$catid,$subcatid);
if($package){
    echo json_encode(array("price"=>$package["price"],"extrabed"=>"<option value='".$package["extra_bed"]."'>".$package["extra_bed"]."</option><option value='no'>No</option>"));
}else{
    echo json_encode(array("price"=>"Package Not Found","extrabed"=>"<option>Package Not FOund</option>"));
}