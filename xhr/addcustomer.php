<?php
// +------------------------------------------------------------------------+|
// | @author: Muhammad Saif                                                  |
// | @author_email: m.saifmumtaz@gmail.com                                   |
// | Created Date: Wednesday 31 March 2021                                   |
// +------------------------------------------------------------------------+|
// | HMS - Hotel Management System                                           |
// | Copyright (c) 2021 saifcodes All rights reserved.                       |
// +------------------------------------------------------------------------+|
require_once("../vendor/autoload.php");

use HMS\Classes\Customers;
use HMS\Classes\DbConnect;


$db= new DbConnect;
$conn= $db->DbConnection();
$customer= new Customers($conn);

$fname=$_POST["fname"];
$lname=$_POST["lname"];
$phoneno=$_POST["phoneno"];
$email=$_POST["email"];
$address=$_POST["address"];
$country=$_POST["country"];
$idcard=$_POST["idcard"];
$idtype=$_POST["id_type"];
$customer_no=bin2hex(random_bytes(4));
if($customer->check_customerno($customer_no)){
    $customer_no=bin2hex(random_bytes(4))."haha";
}
if($customer->add_customer($customer_no,$fname,$lname,$address,$phoneno,$email,$idcard,$idtype,$country)){
    echo json_encode(array("status" => 200, "msg" => "New Customer Added."));
}else{
    echo json_encode(array("status" => 400, "msg" => "Customer not Added. Please try again"));
}