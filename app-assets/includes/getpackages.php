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
$packages = $rooms->get_all_packages();

function searchcatename($catid, $catearray)
{
    foreach ($catearray as $categ) {
        if ($categ['rcid'] == $catid) {
            return $categ["category_name"];
        }
    }
    return null;
}
function searchsubcatename($subcatid, $subcatearray)
{
    foreach ($subcatearray as $categ) {
        if ($categ['subcatid'] == $subcatid) {
            return $categ["name"];
        }
    }
    return null;
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
                            <th>Package</th>
                            <th>Price</th>
                            <th>Extra Bed Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($packages) {
                            $i = 1;
                            foreach ($packages as $package) {
                                echo '<tr>
                            <td>
                                <span class="font-weight-bold">' . $i . '</span>
                            </td>
                            <td>' . searchcatename($package["catid"], $categories) . '</td>
                            <td>' . searchsubcatename($package["subcatid"], $subcategories) . '</td>
                            <td class="font-weight-bold">' . $package["pack_name"] . '</td>
                            <td class="font-weight-bold">' . $package["price"] . '</td>
                            <td class="font-weight-bold">' . $package["extra_bed"] . '</td>
                            <td>
                            <form id="delpackage">
                            <input type="hidden" value="' . $package["pack_id"] . '" name="pack_id">
                            <button type="button" class="btn btn-outline-danger btndelete" id="deletepackage">
                                <i data-feather="trash" class="mr-50"></i>
                                <span>Delete</span>
                            </button>
                            </form>
                            </td>
                        </tr>';
                                $i++;
                            }
                        } else {
                            echo "<tr><td class='p-1'> No Packages Found.</td><tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>