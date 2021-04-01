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
    public function add_rooms($category_id, $subcategory_id)
    {
        $category_id = Security::hms_secure($category_id);
        $subcategory_id = Security::hms_secure($subcategory_id);
        $stmt = $this->conn->prepare("INSERT INTO hms_rooms (category_id,subcategory_id)VALUES(:category_id,:subcategory_id)");
        $data = [
            "category_id" => $category_id,
            "subcategory_id" => $subcategory_id,
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
    // Get Last Room
    public function get_last_roomid(){
        $stmt= $this->conn->prepare("SELECT * from hms_rooms order by rid DESC LIMIT 1");
        $stmt->execute();
        if($stmt->rowCount()>0){
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            return $row["rid"];
        }else{
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
    public function add_subrooms($room_id, $room_no, $bedding_type, $status="available")
    {
        $room_id = Security::hms_int_only($room_id);
        $room_no = Security::hms_secure($room_no);
        $status = Security::hms_secure($status);
        $bedding_type = Security::hms_secure($bedding_type);
        $stmt = $this->conn->prepare("INSERT INTO hms_rooms_subrooms (room_id,room_no,bedding_type,status)VALUES(:room_id,:room_no,:bedding_type,:status)");
        $data = [
            "room_id" => $room_id,
            "room_no" => $room_no,
            "bedding_type"=>$bedding_type,
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

    // Add Packages

    public function add_package($package_name, $package_desc)
    {
        $package_name = Security::hms_secure($package_name);
        $package_desc = Security::hms_secure($package_desc);

        $stmt = $this->conn->prepare("INSERT into hms_packages (package_name,package_description) VALUES(:package_name,:package_description)");
        $data = [
            "package_name" => $package_name,
            "package_description" => $package_desc
        ];

        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    // Get All Packages
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
