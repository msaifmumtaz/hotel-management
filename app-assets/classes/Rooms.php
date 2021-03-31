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

    // Add Room Categories

    public function add_room_category($category_name, $price, $image)
    {
        $category_name = Security::hms_secure($category_name);
        $price = Security::hms_secure($price);
        $stmt = $this->conn->prepare("INSERT INTO hms_rooms_categories (category_name,price,room_image)VALUES(:category_name,:price,:room_image)");
        $data = [
            "category_name" => $category_name,
            "price" => $price,
            "room_image" => $image
        ];
        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }

    // Get All Categories
    public function get_room_categories()
    {
        $stmt = $this->conn->prepare("SELECT * FROM hms_rooms_categories ORDER BY rcid DESC");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $categories = $stmt->fetchAll();
        if ($categories) {
            return $categories;
        } else {
            return false;
        }
    }
    // Delete Room Categories
    public function delete_room_category($rcid)
    {
        $cid = Security::hms_int_only($rcid);
        $stmt = $this->conn->prepare("DELETE FROM hms_rooms_categories where rcid=:rcid");
        if ($stmt->execute(["cid" => $rcid])) {
            return true;
        } else {
            return false;
        }
    }
    // Add room sub category
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
    // Get All Categories
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
    // Delete Room Sub Categories
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
    // Add rooms
    public function add_rooms($category_id, $subcategory_id, $status, $total_rooms, $available_rooms)
    {
        $category_id = Security::hms_secure($category_id);
        $subcategory_id = Security::hms_secure($subcategory_id);
        $status = Security::hms_secure($status);
        $total_rooms = Security::hms_secure($total_rooms);
        $available_rooms = Security::hms_secure($available_rooms);
        $stmt = $this->conn->prepare("INSERT INTO hms_rooms (category_id,subcategory_id,status,total_rooms,available_rooms)VALUES(:category_id,:subcategory_id,:status,:total_rooms,:available_rooms)");
        $data = [
            "category_id" => $category_id,
            "subcategory_id" => $subcategory_id,
            "status" => $status,
            "total_rooms" => $total_rooms,
            "available_rooms" => $available_rooms
        ];
        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    // Get All Rooms
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
    // Delete Room
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
    // Add Sub Rooms
    public function add_subrooms($room_id, $room_no, $status)
    {
        $room_id = Security::hms_int_only($room_id);
        $room_no = Security::hms_secure($room_no);
        $status = Security::hms_secure($status);
        $stmt = $this->conn->prepare("INSERT INTO hms_rooms_subrooms (room_id,room_no,status)VALUES(:room_id,:room_no,:status)");
        $data = [
            "room_id" => $room_id,
            "room_no" => $room_no,
            "status" => $status,
        ];
        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    // Get All subRooms
    public function get_all_subrooms()
    {
        $stmt = $this->conn->prepare("SELECT * FROM hms_rooms_subrooms");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $subrooms = $stmt->fetchAll();
        if ($subrooms) {
            return $subrooms;
        } else {
            return false;
        }
    }
    // Delete SubRoom
    public function delete_subroom($subroom_id)
    {
        $subroom_id = Security::hms_int_only($subroom_id);
        $stmt = $this->conn->prepare("DELETE FROM hms_rooms where subroom_id=:subroom_id");
        if ($stmt->execute(["subroom_id" => $subroom_id])) {
            return true;
        } else {
            return false;
        }
    }
}
