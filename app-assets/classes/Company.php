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

class Company{
    private $name="HMS";
    private $address="13-km Sheikhupura Road Kot Abdul Malik";
    private $phone_no="+92 300 0000 00 00";
    private $email="admin@example.com";

    public function companyname(){
        return $this->name;
    }

    public function companyaddress(){
        return $this->address;
    }

    public function companyphone(){
        return $this->phone_no;
    }

    public function companyemail(){
        return $this->email;
    }
}