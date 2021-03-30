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
use HMS\Classes\User;

$db =new DbConnect;
$conn=$db->DbConnection();
$user=new User($conn);

$username=  $_POST["username"];
$password=$_POST["password"];

if(!$user->hms_login($username,$password)){
    echo json_encode(array("status" => 400, "msg" => "Username or Password is incorrect. Please try again"));
}

echo json_encode(array("status" => 200, "msg" => "Login Successfull...."));
