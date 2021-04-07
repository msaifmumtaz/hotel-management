<?php
// +------------------------------------------------------------------------+|
// | @author: Muhammad Saif                                                  |
// | @author_email: m.saifmumtaz@gmail.com                                   |
// | Created Date: Tuesday 30 March 2021                                     |
// +------------------------------------------------------------------------+|
// | HMS - Hotel Management System                                           |
// | Copyright (c) 2021 saifcodes All rights reserved.                       |
// +------------------------------------------------------------------------+|
session_start();
require_once("../vendor/autoload.php");

use HMS\Classes\DbConnect;
use HMS\Classes\Rooms;

$db = new DbConnect;
$conn = $db->DbConnection();
$rooms = new Rooms($conn);

$subcategories = $rooms->get_all_subcategories();
if($subcategories){
foreach ($subcategories as $subcategory) {
    echo '<option value="' . $subcategory["subcatid"] . '">' . $subcategory["name"] . '</option>';
}
}else{
    echo '<option>No SubCategories Found</option>';
}