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

use HMS\Classes\Booking;
use HMS\Classes\DbConnect;

$db = new DbConnect;
$conn = $db->DbConnection();
$bookings = new Booking($conn);

$booked = $bookings->get_all_bookings();

?>
<div class="row" id="basic-table">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Bookings</h4>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sr No #</th>
                            <th>Customer Name</th>
                            <th>Room No</th>
                            <th>Check In</th>
                            <th>Check out</th>
                            <th>Package</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($booked) {
                            $i = 1;
                            foreach ($booked as $bookdata) {
                                echo '<tr>
                            <td>
                                <span class="font-weight-bold">' . $i . '</span>
                            </td>
                            <td>' . $bookdata["first_name"] . ' ' . $bookdata["last_name"] . '</td>
                            <td>' . $bookdata["room_no"] . '</td>
                            <td class="font-weight-bold">' . $bookdata["check_in"] . '</td>
                            <td class="font-weight-bold">' . $bookdata["check_out"] . '</td>
                            <td class="font-weight-bold">' . $bookdata["pack_name"] . '</td>
                            <td>
                            <div class="dropdown">
                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                <i data-feather="more-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/booking/print/'.$bookdata["bookid"].'">
                                    <i data-feather="file" class="mr-50"></i>
                                    <span>Print</span>
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);">
                                    <i data-feather="trash" class="mr-50"></i>
                                    <span>Delete</span>
                                </a>
                            </div>
                        </div>
                            </td>
                        </tr>';
                                $i++;
                            }
                        } else {
                            echo "<tr><td class='p-1'> No Booking Found.</td><tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>