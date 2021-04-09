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
$packages=$_POST["packages"];
$data=array();
foreach ($packages as $package){
    $package_data=$rooms->get_package($package["package"],$catid,$subcatid);
    if($package_data){
        $data[]=array("price"=>$package_data["price"],"extrabed"=>"<option value='".$package_data["extra_bed"]."'>".$package_data["extra_bed"]."</option><option value='no'>No</option>");
    }else{
        $data[]=array("price"=>"Package Not Found","extrabed"=>"<option>Package Not FOund</option>");
    }
}
echo json_encode($data);