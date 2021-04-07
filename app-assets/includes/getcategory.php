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

?>
<div class="row" id="basic-table">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Room Categories</h4>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sr No #</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($categories) {
                            $i = 1;
                            foreach ($categories as $category) {
                                echo '<tr>
                            <td>
                                <span class="font-weight-bold">' . $category["rcid"] . '</span>
                            </td>
                            <td class="font-weight-bold">' . $category["category_name"] . '</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            <button type="button" class="btn btn-outline-primary btnedit" data-toggle="modal" data-target="#inlineForm">
                                                <i data-feather="edit-2" class="mr-50"></i>
                                                <span>Edit</span>
                                            </button>
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            <button type="button" class="btn btn-outline-danger btndelete" data-toggle="modal" data-target="#DeleteForm">
                                                <i data-feather="trash" class="mr-50"></i>
                                                <span>Delete</span>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>';
                                $i++;
                            }
                        } else {
                            echo "<tr><td class='p-1'> No categories Found.</td><tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Edit Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="editcate">
                <div class="modal-body">
                    <label>Category Name: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Category Name" name="editnamecat" class="form-control category-name" />
                    </div>
                </div>
                <input type="hidden" name="rcid" class="roomcatid">
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="editcatname">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade text-left" id="DeleteForm" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="Delete">Delete Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="deletecate">
                <div class="modal-body">
                    <label>Are you want to delete? </label>
                    <div class="form-group">
                        <p class="delcategory-name text-bold text-danger"></p>
                    </div>
                </div>
                <input type="hidden" name="rcid" class="delroomcatid">
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="deletecatname">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Basic Tables end -->