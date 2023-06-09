<!-- @format -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Oasis- Expense Report </title>
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
                        <div class="text-right mb-2">
                            <a href="javascript:window.print()" class="btn btn-primary" id="printPageButton">
                                <i class="fa fa-print mx-2"></i>

                                Print
                            </a>
                        </div>

                        <div class="card p-3">
                            <div class="my-2 text-center">
                                <h3>Expense Report</h3>
                            </div>
                            <div class="my-2 text-center">
                                <h4>Farm : {{$farm->name}}</h4>
                                @if($duration)
                                <h4>Duration : {{$duration}}</h4>
                                @endif
                            </div>

                            <div class="">
                                <div class="table-responsive mr-2">
                                    <table class="table table-bordered text-dark">
                                        <tbody>
                                            <tr>
                                                <td>Date</td>
                                                <td>House</td>
                                                <td>Expense Type</td>
                                                <td>Expense Sector</td>
                                                <td>Paid From</td>
                                                <td>Reference</td>
                                                <td>Amount</td>
                                            </tr>
                                            @foreach ($expenseList as $item)
                                            <tr>
                                                <td>{{\Carbon\Carbon::parse($item['date'])->format('m/d/Y')}}</td>
                                                <td>
                                                    @if($item['house_id']==0)
                                                    Whole Farm
                                                    @else
                                                    {{$item->house->name}}
                                                    @endif
                                                </td>
                                                <td>{{$item->expenseType->name}}</td>
                                                <td>{{$item->expenseSector->name}}</td>
                                                <td>
                                                    @if($item['paid_from']==1)
                                                    Petty Cash
                                                    @else
                                                    Direct Payment by Head Office
                                                    @endif
                                                </td>
                                                <td>{{$item['reference']}}</td>
                                                <td>{{$item['amount']}}</td>
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
