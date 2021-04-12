<?php
session_start();
require dirname(__FILE__, 3) . "/app-assets/includes/getmessdata.php";

use HMS\Classes\Company;

$company = new Company;

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
    <base href="../../themes/">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Book your hotel room Today.">
    <meta name="keywords" content="Hotel Management System">
    <meta name="author" content="saifcodes">
    <title>Print Mess Report</title>
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

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="assets/css/pages/app-invoice-print.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="invoice-print p-3">
                    <div class="text-center">
                        <h2>Mess Report (<?php echo $date; ?>)</h2>
                    </div>
                    <h4 class="text-center border py-1 my-3">Breakfast Report</h4>

                    <div class="table-responsive mt-2">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th class="py-1">Sr . No</th>
                                    <th class="py-1">Room Category</th>
                                    <th class="py-1">Room SubCategory</th>
                                    <th class="py-1">Room No</th>
                                    <th class="py-1">Package</th>
                                    <th class="py-1">No of Guests</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($breakfast_report) {
                                    $i=1;
                                foreach ($breakfast_report as $breakfastdata) {
                                    echo '<tr>
                                    <td class="py-1">
                                        <strong>'.$i.'</strong>
                                    </td>
                                    <td class="py-1">
                                        <strong>' . $breakfastdata["category_name"] . '</strong>
                                    </td>
                                    <td class="py-1">
                                        <strong>' . $breakfastdata["name"] . '</strong>
                                    </td>
                                    <td class="py-1">
                                        <strong>' . $breakfastdata["room_no"] . '</strong>
                                    </td>
                                    <td class="py-1">
                                        <strong>' . $breakfastdata["package"] . '</strong>
                                    </td>
                                    <td class="py-1">
                                        <strong>' . $breakfastdata["no_of_guests"] . '</strong>
                                    </td>
                                </tr>';
                                $i++;
                                }
                            }else{
                                echo "<tr><td>No Breakfast found for current date</tr></td>";
                            }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <h4 class="text-center border py-1 my-3">Lunch Report</h4>

                    <div class="table-responsive mt-2">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th class="py-1">Sr . No</th>
                                    <th class="py-1">Room Category</th>
                                    <th class="py-1">Room SubCategory</th>
                                    <th class="py-1">Room No</th>
                                    <th class="py-1">Package</th>
                                    <th class="py-1">No of Guests</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($lunch_report) {
                                    $i = 1;
                                    foreach ($lunch_report as $lunchdata) {
                                        echo '<tr>
                                            <td class="py-1">
                                                <strong>' . $i . '</strong>
                                            </td>
                                            <td class="py-1">
                                                strong>' . $lunchdata["category_name"] . '</strong>
                                            </td>
                                            <td class="py-1">
                                                <strong>' . $lunchdata["name"] . '</strong>
                                            </td>
                                            <td class="py-1">
                                                <strong>' . $lunchdata["room_no"] . '</strong>
                                            </td>
                                            <td class="py-1">
                                                <strong>' . $lunchdata["package"] . '</strong>
                                            </td>
                                            <td class="py-1">
                                                <strong>' . $lunchdata["no_of_guests"] . '</strong>
                                            </td>
                                        </tr>';
                                        $i++;
                                    }
                                }else{
                                    echo "<tr><td>No Lunch found for current date</tr></td>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <h4 class="text-center border py-1 my-3">Dinner Report</h4>

                    <div class="table-responsive mt-2">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th class="py-1">Sr . No</th>
                                    <th class="py-1">Room Category</th>
                                    <th class="py-1">Room SubCategory</th>
                                    <th class="py-1">Room No</th>
                                    <th class="py-1">Package</th>
                                    <th class="py-1">No of Guests</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($dinner_report) {
                                    $i = 1;
                                    foreach ($dinner_report as $dinnerdata) {
                                        echo '<tr>
                                            <td class="py-1">
                                                <strong>' . $i . '</strong>
                                            </td>
                                            <td class="py-1">
                                                strong>' . $dinnerdata["category_name"] . '</strong>
                                            </td>
                                            <td class="py-1">
                                                <strong>' . $dinnerdata["name"] . '</strong>
                                            </td>
                                            <td class="py-1">
                                                <strong>' . $dinnerdata["room_no"] . '</strong>
                                            </td>
                                            <td class="py-1">
                                                <strong>' . $dinnerdata["package"] . '</strong>
                                            </td>
                                            <td class="py-1">
                                                <strong>' . $dinnerdata["no_of_guests"] . '</strong>
                                            </td>
                                        </tr>';
                                        $i++;
                                    }
                                }else{
                                    echo "<tr><td>No Dinner found for current date</tr></td>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row invoice-sales-total-wrapper mt-3">
                        <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                            <p class="card-text mb-0">
                                <span class="font-weight-bold">Report Generated By:</span> <span class="ml-75"><?php echo $_SESSION["full_name"] ?></span>
                            </p>
                        </div>
                    </div>

                    <hr class="my-2" />

                    <div class="row">
                        <div class="col-12">
                            <span class="font-weight-bold">Note:</span>
                            <span>This report is generated by Computer
                                at <?php echo $company->companyname() ?>. Thank You!</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="assets/js/core/app-menu.js"></script>
    <script src="assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="assets/js/scripts/pages/app-invoice-print.js"></script>
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