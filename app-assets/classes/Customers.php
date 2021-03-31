<?php
// +------------------------------------------------------------------------+|
// | @author: Muhammad Saif                                                  |
// | @author_email: m.saifmumtaz@gmail.com                                   |
// | Created Date: Tuesday 30 March 2021                                     |
// +------------------------------------------------------------------------+|
// | HMS - Hotel Management System                                           |
// | Copyright (c) 2021 saifcodes All rights reserved.                       |
// +------------------------------------------------------------------------+|
namespace HMS\Classes;

use PDO;

class Customers
{

    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    // Add New Customer
    public function add_customer($customer_no, $first_name, $last_name, $address, $phone_no, $email, $id_card, $id_card_type, $country)
    {
        $customer_no = Security::hms_secure($customer_no);
        $first_name = Security::hms_secure($first_name);
        $last_name = Security::hms_secure($last_name);
        $address = Security::hms_secure($address);
        $phone_no = Security::hms_secure($phone_no);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $id_card = Security::hms_secure($id_card);
        $id_card_type = Security::hms_secure($id_card_type);
        $country = Security::hms_secure($country);

        $stmt = $this->conn->prepare("INSERT into hms_customers (customer_no,first_name,last_name,address,email,phone_no,id_card,id_card_type,country) VALUES(:customer_no,:first_name,:last_name,:address,:email,:phone_no,:id_card,:id_card_type,:country)");
        $data = [
            "customer_no" => $customer_no,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "address" => $address,
            "email" => $email,
            "phone_no" => $phone_no,
            "id_card" => $id_card,
            "id_card_type" => $id_card_type,
            "country" => $country
        ];
        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    // Check if customer no exist
    public function check_customerno($customer_no)
    {
        $customer_no = Security::hms_secure($customer_no);

        $stmt = $this->conn->prepare("SELECT * from hms_customers where customer_no=:customer_no");
        $stmt->execute(["customer_no" => $customer_no]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row > 0) {
            return true;
        } else {
            return false;
        }
    }
    // Get All Customers
    public function get_all_customers()
    {
        $stmt = $this->conn->prepare("SELECT * FROM hms_customers ORDER BY cid DESC");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $customers = $stmt->fetchAll();
        if ($customers) {
            return $customers;
        } else {
            return false;
        }
    }
    // Delete Customer
    public function delete_customer($cid)
    {
        $cid = Security::hms_int_only($cid);
        $stmt = $this->conn->prepare("DELETE FROM hms_customers where cid=:cid");
        if ($stmt->execute(["cid" => $cid])) {
            return true;
        } else {
            return false;
        }
    }
}
