<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

}else{
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
    <title>Add Customer</title>
    <link rel="apple-touch-icon" href="assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="assets/css/plugins/forms/form-validation.css">

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
                            <h2 class="content-header-title float-left mb-0">Customers</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Customers</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">Add Customer</a>
                                    </li>
                                </ol>
                            </div>
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
                                    <h4 class="card-title">Add Customer</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" id="customer">
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
                                                        <option value="admin" selected>CNIC</option>
                                                        <option value="booker">Passport</option>
                                                        <option value="customer">Audhar Card</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary mr-1" id="addcustomer">Submit</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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

    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="assets/js/core/app-menu.js"></script>
    <script src="assets/js/core/app.js"></script>
    <!-- END: Theme JS-->
    <script src="assets/js/scripts/pages/addcustomer.js"></script>

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
</body>
<!-- END: Body-->

</html>