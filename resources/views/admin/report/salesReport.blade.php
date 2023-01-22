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
                                <h3>Sales Report</h3>
                            </div>
                            <div class="my-2 text-center">
                                <h4>Farm : {{$farm->name}}</h4>
                                <h4>Farm : {{$flock->name}}</h4>

                            </div>

                            <div class="">
                                <div class="table-responsive mr-2">
                                    <table class="table table-bordered text-dark">
                                        <tbody>
                                            <tr>
                                                <td class="col-2">Date</td>
                                                <td>House</td>
                                                <td>Car</td>
                                                <td>Catching Slip No</td>
                                                <td>Payment</td>
                                                <td>Customer</td>
                                                <td>Bird Age (Day)</td>
                                                <td>Total Bird</td>
                                                <td>Total Weight (kg)</td>
                                                <td>Std B.Wt (kg)</td>
                                                <td>Actual B.Wt (kg)</td>
                                                <td>Price/kg</td>
                                                <td>Total Price</td>
                                            </tr>
                                            @foreach ($saleList as $item)
                                            <tr>
                                                <td>{{$item['date']}}</td>
                                                <td>{{$item->house->name}}</td>
                                                <td>{{$item['car_no']}}</td>
                                                <td>{{$item['catching_slip']}}</td>

                                                <td>{{$item['payment_method']}}</td>

                                                <td>{{$item['customer']}}</td>

                                                <td>-</td>
                                                <td>{{$item['total_birds']}}</td>

                                                <td>{{$item['total_weight']}}</td>

                                                <td>//standard</td>

                                                <td>{{$item['avg_weight']}}</td>

                                                <td>{{$item['per_kg_price']}}</td>

                                                <td>{{$item['total_price']}}</td>

                                            </tr>

                                            @endforeach

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
