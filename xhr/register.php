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
use HMS\Classes\FileManager;
use HMS\Classes\User;

$db =new DbConnect;
$conn=$db->DbConnection();
$user=new User($conn);
$uploader= new FileManager;

$username=  $_POST["username"];
$fullname=$_POST["fullname"];
$phoneno=$_POST["phoneno"];
$email=$_POST["email"];
$profilepic=$_FILES["profilepic"];
$password=$_POST["password"];
$role_id=$_POST["roleid"];

$fileupload=$uploader->image_upload($profilepic,$username,"profile");
if($fileupload["status"]!=200){
    echo json_encode(array("status" => 400, "msg" => $fileupload["message"]));
}

if(!$user->hms_register($fullname,$username,$email,$phoneno,$password,$role_id,$fileupload["path"])){
    echo json_encode(array("status" => 400, "msg" => "User Registeration Failed. Please Try Again."));
}

echo json_encode(array("status" => 200, "msg" => "Registeration  Successfull...."));