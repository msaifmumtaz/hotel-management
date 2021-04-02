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
    public function update_room_category($category_name,$rcid)
    {
        $category_name = Security::hms_secure($category_name);
        $rcid=Security::hms_int_only($rcid);
        $stmt = $this->conn->prepare("UPDATE hms_rooms_categories set category_name=:category_name where rcid=:rcid");
        $data = [
            "category_name" => $category_name,
            "rcid"=>$rcid
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
    /** Delete Room Categories */
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
    public function update_rooms_subcategory($subcategory_name,$subcatid)
    {
        $subcategory_name = Security::hms_secure($subcategory_name);
        $subcatid=Security::hms_int_only($subcatid);
        $stmt = $this->conn->prepare("UPDATE hms_rooms_subcategories set name=:name where subcatid=:subcatid");
        $data = [
            "name" => $subcategory_name,
            "subcatid"=>$subcatid
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
    /**
     * Add Rooms
     */
    public function add_rooms($category_id, $subcategory_id,$room_no,$status="available")
    {
        $category_id = Security::hms_secure($category_id);
        $subcategory_id = Security::hms_secure($subcategory_id);
        $room_no = Security::hms_secure($room_no);
        $status = Security::hms_secure($status);
        $stmt = $this->conn->prepare("INSERT INTO hms_rooms (category_id,subcategory_id,room_no,status)VALUES(:category_id,:subcategory_id,:room_no,:status)");
        $data = [
            "category_id" => $category_id,
            "subcategory_id" => $subcategory_id,
            "room_no"=>$room_no,
            "status"=>$status
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
    public function update_room($category_id,$subcategory_id,$room_no,$status,$rid){
        $category_id = Security::hms_secure($category_id);
        $subcategory_id = Security::hms_secure($subcategory_id);
        $room_no = Security::hms_secure($room_no);
        $status = Security::hms_secure($status);
        $rid=Security::hms_int_only($rid);

        $stmt=$this->conn->prepare("UPDATE hms_rooms set category_id=:category_id,subcategory_id=:subcategory_id,room_no=:room_no,status=:status where rid=:rid");
        $data = [
            "category_id" => $category_id,
            "subcategory_id" => $subcategory_id,
            "room_no"=>$room_no,
            "status"=>$status,
            "rid"=>$rid
        ];

        if($stmt->execute($data)){
            return true;
        }else{
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
    /**
     * Get Last Room ID
     */
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
    /**
     * Add Package
     */

    public function add_package($catid,$subcatid,$extra_bed,$price)
    {
        $catid=Security::hms_secure($catid);
        $subcatid=Security::hms_secure($subcatid);
        $extra_bed=Security::hms_secure($extra_bed);
        $price=Security::hms_secure($price);

        $stmt = $this->conn->prepare("INSERT into hms_packages (catid,subcatid,extra_bed,price) VALUES(:catid,:subcatid,:extra_bed,:price)");
        $data = [
            "catid"=>$catid,
            "subcatid"=>$subcatid,
            "extra_bed"=>$extra_bed,
            "price"=>$price
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

    public function update_package($catid,$subcatid,$extra_bed,$price,$pack_id){
        $catid=Security::hms_secure($catid);
        $subcatid=Security::hms_secure($subcatid);
        $extra_bed=Security::hms_secure($extra_bed);
        $price=Security::hms_secure($price);
        $pack_id=Security::hms_int_only($pack_id);
        $stmt=$this->conn->prepare("UPDATE hms_packages set catid=:catid,subcatid=:subcatid,extra_bed=:extra_bed,price=:price where pack_id=:pack_id");
        $data = [
            "catid"=>$catid,
            "subcatid"=>$subcatid,
            "extra_bed"=>$extra_bed,
            "price"=>$price,
            "pack_id"=>$pack_id
        ];

        if($stmt->execute($data)){
            return true;
        }else{
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
