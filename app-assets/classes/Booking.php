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

class Booking
{

    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    // Add New Booking
    public function add_booking($customer_id, $room_no, $pack_id, $no_of_guests, $check_in, $check_out, $total_payment,$paid,$payment_method,$status = "booked")
    {
        $customer_id = Security::hms_secure($customer_id);
        $room_no = Security::hms_secure($room_no);
        $pack_id = Security::hms_secure($pack_id);
        $no_of_guests = Security::hms_secure($no_of_guests);
        $check_in = Security::hms_secure($check_in);
        $check_out = Security::hms_secure($check_out);
        $status = Security::hms_secure($status);
        $total_payment = Security::hms_secure($total_payment);
        $paid = Security::hms_secure($paid);
        $payment_method = Security::hms_secure($payment_method);
        $stmt = $this->conn->prepare("INSERT INTO hms_booking (customer_id,room_no,pack_id,no_of_guests,check_in,check_out,total_payment,paid,payment_method,status)VALUES(:customer_id,:room_no,:pack_id,:no_of_guests,:check_in,:check_out,:total_payment,:paid,:payment_method,:status)");
        $data = [
            "customer_id" => $customer_id,
            "room_no" => $room_no,
            "pack_id" => $pack_id,
            "no_of_guests" => $no_of_guests,
            "check_in" => $check_in,
            "check_out" => $check_out,
            "total_payment"=>$total_payment,
            "paid"=>$paid,
            "payment_method"=>$payment_method,
            "status" => $status,
        ];
        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    // Get All Bookings
    public function get_all_bookings()
    {
        $stmt = $this->conn->prepare("SELECT * FROM hms_booking ORDER BY bookid DESC");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $bookings = $stmt->fetchAll();
        if ($bookings) {
            return $bookings;
        } else {
            return false;
        }
    }

    /**
     * Get Booking using Bookid
     * @param string|int $bookid Booking ID 
     */

    public function get_booking($bookid)
    {
        $bookid = Security::hms_secure($bookid);

        $stmt = $this->conn->prepare("SELECT * from hms_booking where bookid=:bookid");
        $stmt->execute(["bookid" => $bookid]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row > 0) {
            return $row;
        } else {
            return false;
        }
    }
    public function delete_booking($bookid)
    {
        $bookid = Security::hms_int_only($bookid);
        $stmt = $this->conn->prepare("DELETE FROM hms_booking where bookid=:bookid");
        if ($stmt->execute(["bookid" => $bookid])) {
            return true;
        } else {
            return false;
        }
    }
}
