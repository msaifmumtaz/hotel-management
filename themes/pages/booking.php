<?php
session_start();
require_once dirname(__FILE__, 3) . "/app-assets/includes/getlastbookid.php";
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
} else {
    header("location: /auth/login");
    exit;
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <base href="../themes/">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Book your hotel room Today.">
    <meta name="keywords" content="Hotel Management System">
    <meta name="author" content="saifcodes">
    <title>Booking</title>
    <link rel="apple-touch-icon" href="assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/pickers/flatpickr/flatpickr.min.css">

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/core/menu/menu-types/vertical-menu.css">
    <!-- END: Page CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <?php
    require dirname(__FILE__, 3) . "/app-assets/includes/navbar.php";
    ?>
    <ul class="main-search-list-defaultlist d-none">
        <li class="d-flex align-items-center"><a href="javascript:void(0);">
                <h6 class="section-label mt-75 mb-0"></h6>
            </a></li>
    </ul>
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span class="mr-75" data-feather="alert-circle"></span><span>No results found.</span></div>
            </a></li>
    </ul>
    <!-- END: Header-->
    <?php
    require dirname(__FILE__, 3) . "/app-assets/includes/mainmenu.php";
    ?>
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Booking</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Booking</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">Add Booking</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Booking</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" id="bookForm">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">First Name</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="First Name" name="fname" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">Last Name</label>
                                                    <input type="text" id="last-name-column" class="form-control" placeholder="Last Name" name="lname" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="phone-column">Phone No</label>
                                                    <input type="text" id="phone-column" class="form-control" placeholder="Phone No" name="phoneno" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="email-column">Email</label>
                                                    <input type="email" id="email-column" class="form-control" placeholder="Email" name="email" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="address-column">Address</label>
                                                    <input type="text" id="address-column" class="form-control" placeholder="Address" name="address" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="country-floating">Country</label>
                                                    <input type="text" id="country-floating" class="form-control" name="country" placeholder="Country" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="idcard-column">ID Card</label>
                                                    <input type="text" id="idcard-column" class="form-control" placeholder="ID Card" name="idcard" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="idtype">ID Type</label>
                                                    <select class="form-control" id="idtype" name="id_type">
                                                        <option value="CNIC" selected>CNIC</option>
                                                        <option value="Passport">Passport</option>
                                                        <option value="Audhar Card">Audhar Card</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="fp-date-time">Check In Date & Time</label>
                                                    <input type="text" id="fp-date-time" name="checkin" data-input="saif" class="form-control flatpickr-date-time" placeholder="YYYY-MM-DD HH:MM" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="checkout-date-time">Check Out Date & Time</label>
                                                    <input type="text" id="checkout-date-time" name="checkout" class="form-control flatpickr-date-time" placeholder="YYYY-MM-DD HH:MM" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="categories">Category Name</label>
                                                    <select class="form-control" id="categories" name="category" onchange="getPrices();">
                                                        <option>Select Category</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="subcategory">SubCategory Name</label>
                                                    <select class="form-control" id="subcategory" name="subcategory" onchange="getPrices();">
                                                        <option>Select SubCategory</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="availroms">Available Rooms</label>
                                                    <select class="form-control" id="availroms" name="room_no">
                                                        <option>Select Avialable Rooms</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 divider divider-primary">
                                                <div class="divider-text text-primary">Choose Package</div>
                                            </div>
                                            <div class="repeater-default w-100 p-1">
                                                <div data-repeater-list="packages">
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="col-md-3 col-12">
                                                                <div class="form-group">
                                                                    <label for="date-time">Package Date</label>
                                                                    <input type="date" id="date-time" name="date_time" class="form-control" placeholder="Package Date YYYY-MM-DD" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-12">
                                                                <div class="form-group">
                                                                    <label for="package">Package</label>
                                                                    <select class="form-control package" id="package" name="package" onchange="getPrices();">
                                                                        <option selected>Select Package</option>
                                                                        <option value="Room Only">Room Only</option>
                                                                        <option value="Breakfast Only">Breakfast Only</option>
                                                                        <option value="Lunch Only">Lunch Only</option>
                                                                        <option value="Dinner Only">Dinner Only</option>
                                                                        <option value="Breakfast & Dinner">Breakfast & Dinner</option>
                                                                        <option value="Breakfast & Lunch">Breakfast & Lunch</option>
                                                                        <option value="Lunch & Dinner">Lunch & Dinner</option>
                                                                        <option value="Breakfast, Lunch & Dinner">Breakfast, Lunch & Dinner</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 col-12">
                                                                <div class="form-group">
                                                                    <label for="price">Price</label>
                                                                    <input type="text" id="price" class="form-control" placeholder="Price" name="price" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 col-12">
                                                                <div class="form-group">
                                                                    <label for="extrabed">Extra Bed</label>
                                                                    <select class="form-control" id="extrabed" name="extrabed">
                                                                        <option>Yes</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="form-group">
                                                                    <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                                        <i data-feather="x" class="mr-25"></i>
                                                                        <span>Delete</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <hr />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-50">
                                                    <div class="col-12">
                                                        <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                            <i data-feather="plus" class="mr-25"></i>
                                                            <span>Add New</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="guests">No of Guests</label>
                                                    <input type="text" id="guests" name="guests" class="form-control" placeholder="No of Guests" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="total-payment">Total Payment</label>
                                                    <input type="text" id="total-payment" name="totalpayment" class="form-control" placeholder="Total Payment" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="paid">Paid</label>
                                                    <input type="text" id="paid" name="paid" class="form-control" placeholder="Paid" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="payment-method">Payment Method</label>
                                                    <select class="form-control" name="paymentmethod" id="payment-method">
                                                        <option value="Cash" selected>Cash</option>
                                                        <option value="Card">Debit/Credit Card</option>
                                                        <option value="Paytm">Paytm</option>
                                                        <option value="Paypal">PayPal</option>
                                                    </select>
                                                </div>
                                            </div>
                                                <input type="hidden" name="bookid" value="<?php echo $bookid;?>">
                                            <div class="col-12">
                                                <button class="btn btn-primary mr-1" id="addbooking">Add Booking</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
                require dirname(__FILE__, 3) . "/app-assets/includes/getbooking.php";
                ?>
                <!-- Basic Floating Label Form section end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <?php
    require dirname(__FILE__, 3) . "/app-assets/includes/footer.php";
    ?>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="assets/vendors/js/vendors.min.js"></script>
    <script src="assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="assets/vendors/js/jquery.form.min.js"></script>
    <script src="assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>

    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="assets/js/scripts/forms/form-repeater.js"></script>
    <script src="assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="assets/js/core/app-menu.js"></script>
    <script src="assets/js/core/app.js"></script>
    <script src="assets/js/scripts/pages/fetcher.js"></script>
    <script src="assets/js/scripts/pages/getavailrooms.js"></script>
    <script src="assets/js/scripts/pages/getpackage.js"></script>
    <script src="assets/js/scripts/pages/addbooking.js"></script>
    <script src="assets/js/scripts/forms/pickers/form-pickers.js"></script>

    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    <script>
        $(document).ready(function() {
            getallcategories();
            getallsubcategories();
        });
    </script>
</body>
<!-- END: Body-->

</html>