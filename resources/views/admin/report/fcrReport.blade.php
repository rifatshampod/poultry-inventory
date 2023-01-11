<!-- @format -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Oasis</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png" />
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet" />
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css" />
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css" />
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="css/print.css" type="text/css" media="print" /> -->
</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="my-5">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="card p-3">
                            <div class="my-2 text-center">
                                <h3>FCR Report</h3>
                            </div>
                            <div class="">
                                <div class="table-responsive mr-2">
                                    <table class="table table-bordered text-dark">
                                        <tbody>
                                            <tr>
                                                <td>Date</td>
                                                <td>House</td>
                                                <td>Age</td>
                                                <td>Standard Feed Consumption (gram)</td>
                                                <td>Counted Feed Consumption (gram)</td>
                                                <td>Standard FCR </td>
                                                <td>Counted FCR </td>
                                            </tr>
                                            <tr>
                                                <td>12.10.22</td>
                                                <td>House 1</td>
                                                <td>4 day</td>
                                                <td>23</td>
                                                <td>24</td>
                                                <td>0.679</td>
                                                <td>0.68</td>
                                            </tr>
                                            <tr>
                                                <td>13.10.22</td>
                                                <td>House 1</td>
                                                <td>5 day</td>
                                                <td>27</td>
                                                <td>22</td>
                                                <td>0.773</td>
                                                <td>0.61</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
    <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
</body>
</html>
