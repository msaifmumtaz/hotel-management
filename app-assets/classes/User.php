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
use PDOException;
class User
{
    protected $conn;
    function __construct($conn)
    {
        $this->conn = $conn;
    }
    //User Login
    public function hms_login($username, $password)
    {
        if (empty($username) || empty($password)) {
            return false;
        }
        $username = Security::hms_secure($username);
        $stmt = $this->conn->prepare("SELECT * from hms_users where username= :username");
        $stmt->bindParam("username", $username, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row["password"])) {
                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["uid"] = $row["uid"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["login_time"] = time();
                $_SESSION["full_name"] = $row["full_name"];
                $_SESSION["role_id"] = $row["role_id"];
                $_SESSION["profile_pic"] = $row["profile_pic"];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

        
    }
    //Register New User
    public function hms_register($full_name, $username, $email, $phone_no, $password, $role_id, $profile_pic)
    {
        $pwd_change = date('Y-m-d H:i:s');
        if (empty($username) || empty($password)) {
            return false;
        }
        $username = Security::hms_secure($username);
        $full_name = Security::hms_secure($full_name);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $phone_no = Security::hms_secure($phone_no);
        $role_id = Security::hms_int_only($role_id);
        $password = password_hash($password, PASSWORD_DEFAULT);
        try {
            //code...
            $stmt = $this->conn->prepare("INSERT into hms_users (full_name,username,email,phone_no,password,role_id,profile_pic) VALUES(:full_name,:username,:email,:phone_no,:password,:role_id,:profile_pic)");
            $stmt->execute([
                "full_name" => $full_name,
                "username" => $username,
                "email" => $email,
                "phone_no" => $phone_no,
                "password" => $password,
                "role_id" => $role_id,
                "profile_pic" => $profile_pic,
            ]);
            return true;
        } catch (PDOException $e) {
            if ($e->getCode() == 1062) {
                // Take some action if there is a key constraint violation, i.e. duplicate name
            } else {
                throw $e;
            }
            return false;
        }
        
    }
    //update user data
    public function hms_update_user($uid, $full_name, $email, $phone_no, $profile_pic, $designation, $role_id)
    {
        $full_name = Security::hms_secure($full_name);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $designation = Security::hms_secure($designation);
        $phone_no = Security::hms_secure($phone_no);
        $role_id = Security::hms_int_only($role_id);
        $stmt = $this->conn->prepare("UPDATE users SET full_name=:full_name, email=:email, phone_no = :phone_no, profile_pic= :profile_pic, designation= :designation, role_id= :role_id where uid=:uid");
        $data = [
            "full_name" => $full_name,
            "email" => $email,
            "phone_no" => $phone_no,
            "profile_pic" => $profile_pic,
            "designation" => $designation,
            "role_id" => $role_id,
            "uid" => $uid
        ];
        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    // change password
    public function hms_change_pwd($uid, $oldpassword, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM hms_users WHERE uid=:uid");
        $stmt->execute(["uid" => $uid]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row > 0) {
            if (password_verify($oldpassword, $row["password"])) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $pwd_change = date('Y-m-d H:i:s');
                $stmt = $this->conn->prepare("UPDATE hms_users set password= :password, pwd_change=:pwd_change where uid=:uid");
                $data = [
                    "password" => $password,
                    "pwd_change" => $pwd_change,
                    "uid" => $uid
                ];
                if ($stmt->execute($data)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
        
    }
    // Delete User 
    public function hms_delete_user($uid)
    {
        $stmt = $this->conn->prepare("DELETE FROM hms_users where uid=:uid");
        if ($stmt->execute(["uid" => $uid])) {
            return true;
        } else {
            return false;
        }
    }

}