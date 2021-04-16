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

$catid = $_POST["category"];
$subcatid = $_POST["subcategory"];
$packages = $_POST["packages"];
$data = array();
foreach ($packages as $package) {
    $package_name = $package["package"];
    if ($package_name == "room") {
        $pname = "Room Only";
    } elseif ($package_name == "breakfast") {
        $pname = "Breakfast Only";
    } elseif ($package_name == "lunch") {
        $pname = "Lunch Only";
    } elseif ($package_name == "dinner") {
        $pname = "Dinner Only";
    } elseif ($package_name == "breakfast,dinner") {
        $pname = "Breakfast & Dinner";
    } elseif ($package_name == "breakfast,lunch") {
        $pname = "Breakfast & Lunch";
    } elseif ($package_name == "lunch,dinner") {
        $pname = "Lunch & Dinner";
    } elseif ($package_name == "breakfast,lunch,dinner") {
        $pname = "Breakfast, Lunch & Dinner";
    }
    $package_data = $rooms->get_package($pname, $catid, $subcatid);
    if ($package_data) {
        $data[] = array("price" => $package_data["price"], "extrabed" => "<option value='" . $package_data["extra_bed"] . "'>" . $package_data["extra_bed"] . "</option><option value='0'>No</option>");
    } else {
        $data[] = array("price" => "Package Not Found", "extrabed" => "<option>Package Not FOund</option>");
    }
}
echo json_encode($data);
