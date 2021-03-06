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
    public function add_booking($bookid, $customer_no, $first_name, $last_name, $address, $phone_no, $email, $id_card, $id_card_type, $country, $catid, $subcatid, $room_no, $no_of_guests, $check_in, $check_out, $total_payment, $paid, $payment_method, $status = "booked")
    {
        $bookid = Security::hms_int_only($bookid);
        $customer_no = Security::hms_secure($customer_no);
        $first_name = Security::hms_secure($first_name);
        $last_name = Security::hms_secure($last_name);
        $address = Security::hms_secure($address);
        $phone_no = Security::hms_secure($phone_no);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $id_card = Security::hms_secure($id_card);
        $id_card_type = Security::hms_secure($id_card_type);
        $country = Security::hms_secure($country);
        $room_no = Security::hms_secure($room_no);
        $catid = Security::hms_secure($catid);
        $subcatid = Security::hms_secure($subcatid);
        $no_of_guests = Security::hms_secure($no_of_guests);
        $check_in = Security::hms_secure($check_in);
        $check_out = Security::hms_secure($check_out);
        $status = Security::hms_secure($status);
        $total_payment = Security::hms_secure($total_payment);
        $paid = Security::hms_secure($paid);
        $payment_method = Security::hms_secure($payment_method);
        $stmt = $this->conn->prepare("INSERT INTO hms_booking (bookid,customer_no,first_name,last_name,address,email,phone_no,id_card,id_card_type,country,catid,subcatid,room_no,no_of_guests,check_in,check_out,total_payment,paid,payment_method,status)VALUES(:bookid,:customer_no,:first_name,:last_name,:address,:email,:phone_no,:id_card,:id_card_type,:country,:catid,:subcatid,:room_no,:no_of_guests,:check_in,:check_out,:total_payment,:paid,:payment_method,:status)");
        $data = [
            "bookid" => $bookid,
            "customer_no" => $customer_no,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "address" => $address,
            "email" => $email,
            "phone_no" => $phone_no,
            "id_card" => $id_card,
            "id_card_type" => $id_card_type,
            "country" => $country,
            "catid" => $catid,
            "subcatid" => $subcatid,
            "room_no" => $room_no,
            "no_of_guests" => $no_of_guests,
            "check_in" => $check_in,
            "check_out" => $check_out,
            "total_payment" => $total_payment,
            "paid" => $paid,
            "payment_method" => $payment_method,
            "status" => $status,
        ];
        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    public function update_booking($customer_no, $first_name, $last_name, $address, $phone_no, $email, $id_card, $id_card_type, $country,  $catid, $subcatid, $room_no, $no_of_guests, $check_in, $check_out, $total_payment, $paid, $payment_method, $status, $bookid)
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
        $room_no = Security::hms_secure($room_no);
        $catid = Security::hms_secure($catid);
        $subcatid = Security::hms_secure($subcatid);
        $no_of_guests = Security::hms_secure($no_of_guests);
        $check_in = Security::hms_secure($check_in);
        $check_out = Security::hms_secure($check_out);
        $status = Security::hms_secure($status);
        $total_payment = Security::hms_secure($total_payment);
        $paid = Security::hms_secure($paid);
        $payment_method = Security::hms_secure($payment_method);
        $bookid = Security::hms_int_only($bookid);
        $stmt = $this->conn->prepare("UPDATE hms_booking set customer_no=:customer_no,first_name=:first_name,last_name=:last_name,address=:address,email=:email,phone_no=:phone_no,id_card=:id_card,id_card_type=:id_card_type,country=:country,catid=:catid,subcatid=:subcatid,room_no=:room_no,no_of_guests=:no_of_guests,check_in=:check_in,check_out=:check_out,total_payment=:total_payment,paid=:paid,payment_method=:payment_method,status=:status where bookid=:bookid");
        $data = [
            "customer_no" => $customer_no,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "address" => $address,
            "email" => $email,
            "phone_no" => $phone_no,
            "id_card" => $id_card,
            "id_card_type" => $id_card_type,
            "country" => $country,
            "catid" => $catid,
            "subcatid" => $subcatid,
            "room_no" => $room_no,
            "no_of_guests" => $no_of_guests,
            "check_in" => $check_in,
            "check_out" => $check_out,
            "total_payment" => $total_payment,
            "paid" => $paid,
            "payment_method" => $payment_method,
            "status" => $status,
            "bookid" => $bookid
        ];
        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }

    public function extend_booking($bookid, $check_out, $total_payment, $paid)
    {
        $bookid = Security::hms_int_only($bookid);
        $check_out = Security::hms_secure($check_out);
        $total_payment = Security::hms_secure($total_payment);
        $paid = Security::hms_secure($paid);

        $stmt = $this->conn->prepare("UPDATE hms_booking SET check_out=:check_out,total_payment=:total_payment,paid=:paid WHERE bookid=:bookid");
        $data = [
            "check_out" => $check_out,
            "total_payment" => $total_payment,
            "paid" => $paid,
            "bookid" => $bookid
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
    // Get Last Bookid
    public function get_last_bookid()
    {
        $stmt = $this->conn->prepare("SELECT * from hms_booking order by bookid DESC LIMIT 1");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row["bookid"];
        } else {
            return false;
        }
    }
    // Room Checkout
    public function room_checkout($bookid,$paid,$status="checkedout"){
        $paid=Security::hms_secure($paid);
        $status=Security::hms_secure($status);
        $bookid=Security::hms_secure($bookid);

        $stmt=$this->conn->prepare("UPDATE hms_booking set paid=:paid, status=:status WHERE bookid=:bookid");
        $data=[
            "paid"=>$paid,
            "status"=>$status,
            "bookid"=>$bookid
        ];
        if($stmt->execute($data)){
            return true;
        }else{
            return false;
        }
    }
    // Add Booking Packages
    public function add_book_package($bookid, $package, $extra_bed, $breakfast, $lunch, $dinner, $date)
    {
        $bookid = Security::hms_secure($bookid);
        $package = Security::hms_secure($package);
        $date = Security::hms_secure($date);
        $extra_bed = Security::hms_secure($extra_bed);
        $breakfast = Security::hms_secure($breakfast);
        $lunch = Security::hms_secure($lunch);
        $dinner = Security::hms_secure($dinner);

        $stmt = $this->conn->prepare("INSERT into hms_book_package (bookid,package,extra_bed,breakfast,lunch,dinner,date_time) VALUES(:bookid,:package,:extra_bed,:breakfast,:lunch,:dinner,:date_time)");
        $data = [
            "bookid" => $bookid,
            "package" => $package,
            "extra_bed" => $extra_bed,
            "breakfast" => $breakfast,
            "lunch" => $lunch,
            "dinner" => $dinner,
            "date_time" => $date
        ];
        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    // Edit Booking Package
    public function update_book_package($bookid, $package, $extra_bed,  $breakfast, $lunch, $dinner, $date, $bpid)
    {
        $bookid = Security::hms_secure($bookid);
        $package = Security::hms_secure($package);
        $date = Security::hms_secure($date);
        $extra_bed = Security::hms_secure($extra_bed);
        $breakfast = Security::hms_secure($breakfast);
        $lunch = Security::hms_secure($lunch);
        $dinner = Security::hms_secure($dinner);
        $stmt = $this->conn->prepare("UPDATE hms_book_package SET bookid=:bookid,package=:package,extra_bed=:extra_bed,breakfast=:breakfast,lunch=:lunch,dinner=:dinner,date_time=:date_time WHERE bpid=:bpid");
        $data = [
            "bookid" => $bookid,
            "package" => $package,
            "extra_bed" => $extra_bed,
            "breakfast" => $breakfast,
            "lunch" => $lunch,
            "dinner" => $dinner,
            "date_time" => $date,
            "bpid" => $bpid
        ];
        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    // Get All Booking Packages
    public function get_all_bookings_package($bookid)
    {
        $bookid = Security::hms_int_only($bookid);
        $stmt = $this->conn->prepare("SELECT * FROM hms_book_package WHERE bookid=:bookid");
        $stmt->execute(["bookid" => $bookid]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $book_pack = $stmt->fetchAll();
        if ($book_pack) {
            return $book_pack;
        } else {
            return false;
        }
    }
    // Delete All Booking Packages
    public function delete_booking_pack($bookid)
    {
        $bookid = Security::hms_int_only($bookid);
        $stmt = $this->conn->prepare("DELETE * FROM hms_book_package WHERE bookid=:bookid");
        if ($stmt->execute(["bookid" => $bookid])) {
            return true;
        } else {
            return false;
        }
    }
    // Get BreakfasT oNLY
    public function get_breakfast_report($date)
    {
        $date = Security::hms_secure($date);
        $breakfast = "yes";
        $stmt = $this->conn->prepare("SELECT P.package,P.breakfast,P.extra_bed,P.date_time,B.bookid,B.room_no,B.no_of_guests,RC.category_name,RSC.name FROM hms_book_package as P,hms_booking as B, hms_rooms_categories as RC, hms_rooms_subcategories as RSC WHERE P.bookid=B.bookid AND B.catid=RC.rcid AND B.subcatid=RSC.subcatid AND P.date_time=:date_time AND P.breakfast=:breakfast");
        $stmt->execute(["date_time" => $date, "breakfast" => $breakfast]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        if ($data) {
            return $data;
        } else {
            return false;
        }
    }
    // Get Lunch oNLY
    public function get_lunch_report($date)
    {
        $date = Security::hms_secure($date);
        $lunch = "yes";
        $stmt = $this->conn->prepare("SELECT P.package,P.breakfast,P.extra_bed,P.date_time,B.bookid,B.room_no,B.no_of_guests,RC.category_name,RSC.name FROM hms_book_package as P,hms_booking as B, hms_rooms_categories as RC, hms_rooms_subcategories as RSC WHERE P.bookid=B.bookid AND B.catid=RC.rcid AND B.subcatid=RSC.subcatid AND P.date_time=:date_time AND P.lunch=:lunch");
        $stmt->execute(["date_time" => $date, "lunch" => $lunch]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        if ($data) {
            return $data;
        } else {
            return false;
        }
    }
    // Dinner Only Report
    public function get_dinner_report($date)
    {
        $date = Security::hms_secure($date);
        $dinner = "yes";
        $stmt = $this->conn->prepare("SELECT P.package,P.breakfast,P.extra_bed,P.date_time,B.bookid,B.room_no,B.no_of_guests,RC.category_name,RSC.name FROM hms_book_package as P,hms_booking as B, hms_rooms_categories as RC, hms_rooms_subcategories as RSC WHERE P.bookid=B.bookid AND B.catid=RC.rcid AND B.subcatid=RSC.subcatid AND P.date_time=:date_time AND P.dinner=:dinner");
        $stmt->execute(["date_time" => $date, "dinner" => $dinner]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        if ($data) {
            return $data;
        } else {
            return false;
        }
    }
}
