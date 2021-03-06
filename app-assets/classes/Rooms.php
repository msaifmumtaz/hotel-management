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

class Rooms
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    /**  Add Room Categories */

    public function add_room_category($category_name)
    {
        $category_name = Security::hms_secure($category_name);
        $stmt = $this->conn->prepare("INSERT INTO hms_rooms_categories (category_name)VALUES(:category_name)");
        $data = [
            "category_name" => $category_name,
        ];
        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Update Category
     */
    public function update_room_category($category_name, $rcid)
    {
        $category_name = Security::hms_secure($category_name);
        $rcid = Security::hms_int_only($rcid);
        $stmt = $this->conn->prepare("UPDATE hms_rooms_categories set category_name=:category_name where rcid=:rcid");
        $data = [
            "category_name" => $category_name,
            "rcid" => $rcid
        ];
        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    /** Get All Categories */
    public function get_room_categories()
    {
        $stmt = $this->conn->prepare("SELECT * FROM hms_rooms_categories");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $categories = $stmt->fetchAll();
        if ($categories) {
            return $categories;
        } else {
            return false;
        }
    }
    /**
     * Get Category 
     */

    public function get_category($rcid)
    {
        $rcid = Security::hms_int_only($rcid);
        $stmt = $this->conn->prepare("SELECT * from hms_rooms_categories where rcid=:rcid");
        $stmt->execute(["rcid" => $rcid]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row > 0) {
            return $row;
        } else {
            return false;
        }
    }
    /** Delete Room Categories */
    public function delete_room_category($rcid)
    {
        $cid = Security::hms_int_only($rcid);
        $stmt = $this->conn->prepare("DELETE FROM hms_rooms_categories where rcid=:rcid");
        if ($stmt->execute(["rcid" => $rcid])) {
            return true;
        } else {
            return false;
        }
    }
    /** Add room sub category */
    public function add_rooms_subcategory($subcategory_name)
    {
        $subcategory_name = Security::hms_secure($subcategory_name);
        $stmt = $this->conn->prepare("INSERT INTO hms_rooms_subcategories (name)VALUES(:name)");
        $data = [
            "name" => $subcategory_name
        ];
        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Update Sub Category
     */
    public function update_rooms_subcategory($subcategory_name, $subcatid)
    {
        $subcategory_name = Security::hms_secure($subcategory_name);
        $subcatid = Security::hms_int_only($subcatid);
        $stmt = $this->conn->prepare("UPDATE hms_rooms_subcategories set name=:name where subcatid=:subcatid");
        $data = [
            "name" => $subcategory_name,
            "subcatid" => $subcatid
        ];
        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    /** 
     * Get All SubCategories
     */
    public function get_all_subcategories()
    {
        $stmt = $this->conn->prepare("SELECT * FROM hms_rooms_subcategories");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $subcategories = $stmt->fetchAll();
        if ($subcategories) {
            return $subcategories;
        } else {
            return false;
        }
    }
    /**
     * Delete Room Sub Categories
     */
    public function delete_rooms_subcategory($subcatid)
    {
        $subcatid = Security::hms_int_only($subcatid);
        $stmt = $this->conn->prepare("DELETE FROM hms_rooms_subcategories where subcatid=:subcatid");
        if ($stmt->execute(["subcatid" => $subcatid])) {
            return true;
        } else {
            return false;
        }
    }
    /** Get room SubCategory */
    public function get_subcategory($subcatid)
    {
        $rcid = Security::hms_int_only($subcatid);
        $stmt = $this->conn->prepare("SELECT * from hms_rooms_subcategories where subcatid=:subcatid");
        $stmt->execute(["subcatid" => $subcatid]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row > 0) {
            return $row;
        } else {
            return false;
        }
    }
    /**
     * Add Rooms
     */
    public function add_rooms($category_id, $subcategory_id, $room_no, $status = "available")
    {
        $category_id = Security::hms_secure($category_id);
        $subcategory_id = Security::hms_secure($subcategory_id);
        $room_no = Security::hms_secure($room_no);
        $status = Security::hms_secure($status);
        $stmt = $this->conn->prepare("INSERT INTO hms_rooms (category_id,subcategory_id,room_no,status)VALUES(:category_id,:subcategory_id,:room_no,:status)");
        $data = [
            "category_id" => $category_id,
            "subcategory_id" => $subcategory_id,
            "room_no" => $room_no,
            "status" => $status
        ];
        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Update Rooms
     */
    public function update_room($category_id, $subcategory_id, $room_no, $status, $rid)
    {
        $category_id = Security::hms_secure($category_id);
        $subcategory_id = Security::hms_secure($subcategory_id);
        $room_no = Security::hms_secure($room_no);
        $status = Security::hms_secure($status);
        $rid = Security::hms_int_only($rid);

        $stmt = $this->conn->prepare("UPDATE hms_rooms set category_id=:category_id,subcategory_id=:subcategory_id,room_no=:room_no,status=:status where rid=:rid");
        $data = [
            "category_id" => $category_id,
            "subcategory_id" => $subcategory_id,
            "room_no" => $room_no,
            "status" => $status,
            "rid" => $rid
        ];

        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    /**Get Room */
    public function get_room($rid)
    {
        $rid = Security::hms_int_only($rid);
        $stmt = $this->conn->prepare("SELECT * from hms_rooms where rid=:rid");
        $stmt->execute(["rid" => $rid]);
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return false;
        }
    }
    /**
     * Get All Rooms
     */
    public function get_all_rooms()
    {
        $stmt = $this->conn->prepare("SELECT * FROM hms_rooms");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rooms = $stmt->fetchAll();
        if ($rooms) {
            return $rooms;
        } else {
            return false;
        }
    }

    public function get_rooms($category_id, $subcategory_id)
    {
        $category_id = Security::hms_secure($category_id);
        $subcategory_id = Security::hms_secure($subcategory_id);
        $stmt = $this->conn->prepare("SELECT * FROM hms_rooms where category_id=:category_id and subcategory_id=:subcategory_id");
        $stmt->execute(["category_id" => $category_id, "subcategory_id" => $subcategory_id]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rooms = $stmt->fetchAll();
        $room_nos = "";
        foreach ($rooms as $room) {
            $room_nos .= $room["room_no"] . ", ";
        }
        $room_nos = rtrim($room_nos, ', ');
        if ($room_nos) {
            return $room_nos;
        } else {
            return false;
        }
    }
    /**
     * Get Last Room ID
     */
    public function get_last_roomid()
    {
        $stmt = $this->conn->prepare("SELECT * from hms_rooms order by rid DESC LIMIT 1");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row["rid"];
        } else {
            return false;
        }
    }
    /** Get Available Rooms */
    public function get_avail_rooms($check_in, $check_out, $category_id, $subcategory_id)
    {
        $check_in = Security::hms_secure($check_in);
        $check_out = Security::hms_secure($check_out);
        $category_id = Security::hms_secure($category_id);
        $subcategory_id = Security::hms_secure($subcategory_id);

        $stmt = $this->conn->prepare("SELECT *
        FROM hms_rooms
        WHERE room_no NOT IN (
           SELECT DISTINCT room_no
           FROM hms_booking
           WHERE check_in <= :check_in AND check_out >= :check_out AND status='booked') AND category_id=:category_id AND subcategory_id=:subcategory_id");
        $data = [
            "check_in" => $check_in,
            "check_out" => $check_out,
            "category_id" => $category_id,
            "subcategory_id" => $subcategory_id
        ];
        $stmt->execute($data);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rooms = $stmt->fetchAll();
        if ($rooms) {
            return $rooms;
        } else {
            return false;
        }
    }
    /** Get Available Rooms */
    public function get_recentlybooked_rooms()
    {
        $stmt = $this->conn->prepare("SELECT * FROM hms_booking WHERE created_at BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 2 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $bookrooms = $stmt->fetchAll();
        if ($bookrooms) {
            return $bookrooms;
        } else {
            return false;
        }
    }
    /** Get Available Rooms */
    public function book_room($room_no)
    {
        $room_no = Security::hms_secure($room_no);
        $status = "booked";
        $stmt = $this->conn->prepare("SELECT * from hms_rooms set status=:status where room_no=:room_no");
        if ($stmt->execute(["status" => $status, "room_no" => $room_no])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete Room of given ID
     */
    public function delete_room($rid)
    {
        $rid = Security::hms_int_only($rid);
        $stmt = $this->conn->prepare("DELETE FROM hms_rooms where rid=:rid");
        if ($stmt->execute(["rid" => $rid])) {
            return true;
        } else {
            return false;
        }
    }
    public function delete_rooms($category_id, $subcategory_id)
    {
        $category_id = Security::hms_secure($category_id);
        $subcategory_id = Security::hms_secure($subcategory_id);
        $stmt = $this->conn->prepare("DELETE FROM hms_rooms where category_id=:category_id and subcategory_id=:subcategory_id");
        if ($stmt->execute(["category_id" => $category_id, "subcategory_id" => $subcategory_id])) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Add Package
     */

    public function add_package($catid, $subcatid, $pack_name, $extra_bed, $price)
    {
        $catid = Security::hms_secure($catid);
        $subcatid = Security::hms_secure($subcatid);
        $extra_bed = Security::hms_secure($extra_bed);
        $price = Security::hms_secure($price);
        $pack_name = Security::hms_secure($pack_name);

        $stmt = $this->conn->prepare("INSERT into hms_packages (catid,subcatid,pack_name,extra_bed,price) VALUES(:catid,:subcatid,:pack_name,:extra_bed,:price)");
        $data = [
            "catid" => $catid,
            "subcatid" => $subcatid,
            "extra_bed" => $extra_bed,
            "price" => $price,
            "pack_name" => $pack_name
        ];

        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Update Package
     */

    public function update_package($catid, $subcatid, $pack_name, $extra_bed, $price, $pack_id)
    {
        $catid = Security::hms_secure($catid);
        $subcatid = Security::hms_secure($subcatid);
        $extra_bed = Security::hms_secure($extra_bed);
        $price = Security::hms_secure($price);
        $pack_name = Security::hms_secure($pack_name);
        $pack_id = Security::hms_int_only($pack_id);
        $stmt = $this->conn->prepare("UPDATE hms_packages set catid=:catid,subcatid=:subcatid,pack_name=:pack_name,extra_bed=:extra_bed,price=:price where pack_id=:pack_id");
        $data = [
            "catid" => $catid,
            "subcatid" => $subcatid,
            "extra_bed" => $extra_bed,
            "price" => $price,
            "pack_name" => $pack_name,
            "pack_id" => $pack_id
        ];

        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    /** Get Package */
    public function get_package($pack_name, $catid, $subcatid)
    {
        $pack_name = Security::hms_secure($pack_name);
        $catid = Security::hms_secure($catid);
        $subcatid = Security::hms_secure($subcatid);
        $stmt = $this->conn->prepare("SELECT * FROM hms_packages where pack_name=:pack_name and catid=:catid and subcatid=:subcatid Limit 1");
        $stmt->execute(["pack_name" => $pack_name, "catid" => $catid, "subcatid" => $subcatid]);
        $package = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($package > 0) {
            return $package;
        } else {
            return false;
        }
    }
    /**
     * Get All Packages
     */
    public function get_all_packages()
    {
        $stmt = $this->conn->prepare("SELECT * FROM hms_packages");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $packages = $stmt->fetchAll();
        if ($packages) {
            return $packages;
        } else {
            return false;
        }
    }
    // Delete Packages
    public function delete_package($pack_id)
    {
        $pack_id = Security::hms_int_only($pack_id);
        $stmt = $this->conn->prepare("DELETE FROM hms_packages where pack_id=:pack_id");
        if ($stmt->execute(["pack_id" => $pack_id])) {
            return true;
        } else {
            return false;
        }
    }
}
