<?php
// +------------------------------------------------------------------------+|
// | @author: Muhammad Saif                                                  |
// | @author_email: m.saifmumtaz@gmail.com                                   |
// | Created Date: Tuesday 30 March 2021                                     |
// +------------------------------------------------------------------------+|
// | HMS - Hotel Management System                                           |
// | Copyright (c) 2021 saifcodes All rights reserved.                       |
// +------------------------------------------------------------------------+|
require_once dirname(__FILE__, 3) . "/vendor/autoload.php";

use HMS\Classes\DbConnect;
use HMS\Classes\Rooms;

$db = new DbConnect;
$conn = $db->DbConnection();
$rooms = new Rooms($conn);

$categories = $rooms->get_room_categories();
$subcategories = $rooms->get_all_subcategories();
$data = array();
if ($categories & $subcategories) {
    foreach ($categories as $category) {
        $catename = $category["category_name"];
        foreach ($subcategories as $subcategory) {
            $subcatename = $subcategory["name"];
            $d1 = $rooms->get_rooms($category["rcid"], $subcategory["subcatid"]);
            if (!empty($d1) || $d1 != "") {
                $d2 = array("cate_name" => $catename, "subcate_name" => $subcatename, "rooms_no" => $d1, "catid" => $category["rcid"], "subcatid" => $subcategory["subcatid"]);
                $data[] = $d2;
            }
        }
    }
}
?>
<div class="row" id="basic-table">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Rooms</h4>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sr No #</th>
                            <th>Category Name</th>
                            <th>SubCategory Name</th>
                            <th>Room No</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($data) {
                            $i = 1;
                            foreach ($data as $roomdata) {
                                echo '<tr>
                            <td>
                                <span class="font-weight-bold">' . $i . '</span>
                            </td>
                            <td>' . $roomdata["cate_name"] . '</td>
                            <td>' . $roomdata["subcate_name"] . '</td>
                            <td class="font-weight-bold text-success">' . $roomdata["rooms_no"] . '</td>
                            <td>
                            <form id="delroom">
                            <input type="hidden" value="' . $roomdata["catid"] . '" name="catid">
                            <input type="hidden" value="' . $roomdata["subcatid"] . '" name="subcatid">
                            <button type="button" class="btn btn-outline-danger btndelete" id="deleterooms">
                                <i data-feather="trash" class="mr-50"></i>
                                <span>Delete</span>
                            </button>
                            </form>
                            </td>
                        </tr>';
                                $i++;
                            }
                        } else {
                            echo "<tr><td class='p-1'> No Rooms Found.</td><tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>