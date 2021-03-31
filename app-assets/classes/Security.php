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

class Security
{
    /**
     * Secure User Input
     * 
     * @param string $string User Typed String 
     */
    public static function hms_secure($string, $br = true, $strip = 0)
    {
        $string = trim($string);
        $string = preg_replace("/&#?[a-z0-9]+;/i", "", $string);
        $string = htmlspecialchars($string, ENT_QUOTES);
        if ($br == true) {
            $string = str_replace('\r\n', " <br>", $string);
            $string = str_replace('\n\r', " <br>", $string);
            $string = str_replace('\r', " <br>", $string);
            $string = str_replace('\n', " <br>", $string);
        } else {
            $string = str_replace('\r\n', "", $string);
            $string = str_replace('\n\r', "", $string);
            $string = str_replace('\r', "", $string);
            $string = str_replace('\n', "", $string);
        }
        if ($strip == 1) {
            $string = stripslashes($string);
        }
        $string = str_replace('&amp;#', '&#', $string);
        return $string;
    }

    /**
     * Secure Unserialization of Data
     * @param string $data Serialized Data
     */
    public static function secure_unserialize($data)
    {
        $data = str_replace("&quot;", '"', $data);
        $data = unserialize($data);
        return $data;
    }

    /**
     * Convert String to Int or float
     * @param string $string Get Mixed Value
     */
    public static function hms_int_only($string)
    {
        $converted = preg_replace('/[^\d.+$]/', "", $string);
        return $converted;
    }

    /**
     * CSRF Protection 
     *  
     * @param string $token CSRF Protection Token
     */

    public static function create_token()
    {
        // create token
        $token = bin2hex(random_bytes(32));
        //Save in Session
        $_SESSION['token'] = $token;
        //create hidden field
        echo "<input type='hidden' name='token' value='$token'/>";
    }
    public static function validate_token($token)
    {
        //Validate Token
        return isset($_SESSION["token"]) && $_SESSION["token"] == $token;
    }
}
