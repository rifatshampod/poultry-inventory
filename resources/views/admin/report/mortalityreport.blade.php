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
                                <h3>Mortality Report</h3>
                            </div>
                            <div class="mb-2 text-center">
                                <h4>Flock : {{$flock->name}} </h4>
                                <h4>Farm : {{$farm->name}}</h4>
                            </div>
                            <div class="d-flex">
                                @if($house1)
                                <div class="table-responsive mr-2">
                                    <table class="table table-bordered text-dark">
                                        <tbody>
                                            <tr>
                                                <td colspan="3">{{$house1->house->name}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Total Started : {{$house1->first_doc}}</td>
                                            </tr>
                                            <tr class="bg-light">
                                                <td>Date</td>
                                                <td class="text-center">Age (Day)</td>
                                                <td class="text-right">Dead</td>

                                            </tr>
                                            @foreach ($daily1 as $item)
                                            <tr>
                                                <td>{{$item['date']}}</td>
                                                <td class="text-center">{{Carbon\Carbon::parse($item['date'])->diffInDays(Carbon\Carbon::parse($house1->date))+1}}</td>
                                                <td class="text-right">{{$item['mortality']}}</td>

                                            </tr>

                                            @endforeach

                                            <tr class="bg-light">

                                                <td colspan="2">Total</td>
                                                <td class="text-right"><strong>{{$sum1}}</strong></td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                @endif

                                @if($house2)
                                <div class="table-responsive mr-2">
                                    <table class="table table-bordered text-dark">
                                        <tbody>
                                            <tr>
                                                <td colspan="3">{{$house2->house->name}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Total Started : {{$house2->first_doc}}</td>
                                            </tr>
                                            <tr class="bg-light">
                                                <td>Date</td>
                                                <td class="text-center">Age (Day)</td>
                                                <td class="text-right">Dead</td>

                                            </tr>
                                            @foreach ($daily2 as $item)
                                            <tr>
                                                <td>{{$item['date']}}</td>
                                                <td class="text-center">{{Carbon\Carbon::parse($item['date'])->diffInDays(Carbon\Carbon::parse($house2->date))+1}}</td>
                                                <td class="text-right">{{$item['mortality']}}</td>

                                            </tr>

                                            @endforeach

                                            <tr class="bg-light">

                                                <td colspan="2">Total</td>
                                                <td class="text-right"><strong>{{$sum2}}</strong></td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                @endif


                                @if($house3)
                                <div class="table-responsive mr-2">
                                    <table class="table table-bordered text-dark">
                                        <tbody>
                                            <tr>
                                                <td colspan="3">{{$house3->house->name}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Total Started : {{$house3->first_doc}}</td>
                                            </tr>
                                            <tr class="bg-light">
                                                <td>Date</td>
                                                <td class="text-center">Age (Day)</td>
                                                <td class="text-right">Dead</td>

                                            </tr>
                                            @foreach ($daily3 as $item)
                                            <tr>
                                                <td>{{$item['date']}}</td>
                                                <td class="text-center">{{Carbon\Carbon::parse($item['date'])->diffInDays(Carbon\Carbon::parse($house3->date))+1}}</td>
                                                <td class="text-right">{{$item['mortality']}}</td>

                                            </tr>

                                            @endforeach

                                            <tr class="bg-light">

                                                <td colspan="2">Total</td>
                                                <td class="text-right"><strong>{{$sum3}}</strong></td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                @endif

                            </div>
                            <div class="d-flex">
                                @if($house4)
                                <div class="table-responsive mr-2">
                                    <table class="table table-bordered text-dark">
                                        <tbody>
                                            <tr>
                                                <td colspan="3">{{$house4->house->name}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Total Started : {{$house4->first_doc}}</td>
                                            </tr>
                                            <tr class="bg-light">
                                                <td>Date</td>
                                                <td class="text-center">Age (Day)</td>
                                                <td class="text-right">Dead</td>

                                            </tr>
                                            @foreach ($daily4 as $item)
                                            <tr>
                                                <td>{{$item['date']}}</td>
                                                <td class="text-center">{{Carbon\Carbon::parse($item['date'])->diffInDays(Carbon\Carbon::parse($house4->date))+1}}</td>
                                                <td class="text-right">{{$item['mortality']}}</td>

                                            </tr>

                                            @endforeach

                                            <tr class="bg-light">

                                                <td colspan="2">Total</td>
                                                <td class="text-right"><strong>{{$sum4}}</strong></td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                @endif

                                @if($house5)
                                <div class="table-responsive mr-2">
                                    <table class="table table-bordered text-dark">
                                        <tbody>
                                            <tr>
                                                <td colspan="3">{{$house5->house->name}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Total Started : {{$house5->first_doc}}</td>
                                            </tr>
                                            <tr class="bg-light">
                                                <td>Date</td>
                                                <td class="text-center">Age (Day)</td>
                                                <td class="text-right">Dead</td>

                                            </tr>
                                            @foreach ($daily5 as $item)
                                            <tr>
                                                <td>{{$item['date']}}</td>
                                                <td class="text-center">{{Carbon\Carbon::parse($item['date'])->diffInDays(Carbon\Carbon::parse($house5->date))+1}}</td>
                                                <td class="text-right">{{$item['mortality']}}</td>

                                            </tr>

                                            @endforeach

                                            <tr class="bg-light">

                                                <td colspan="2">Total</td>
                                                <td class="text-right"><strong>{{$sum5}}</strong></td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                @endif


                                @if($house6)
                                <div class="table-responsive mr-2">
                                    <table class="table table-bordered text-dark">
                                        <tbody>
                                            <tr>
                                                <td colspan="3">{{$house6->house->name}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Total Started : {{$house6->first_doc}}</td>
                                            </tr>
                                            <tr class="bg-light">
                                                <td>Date</td>
                                                <td class="text-center">Age (Day)</td>
                                                <td class="text-right">Dead</td>

                                            </tr>
                                            @foreach ($daily6 as $item)
                                            <tr>
                                                <td>{{$item['date']}}</td>
                                                <td class="text-center">{{Carbon\Carbon::parse($item['date'])->diffInDays(Carbon\Carbon::parse($house6->date))+1}}</td>
                                                <td class="text-right">{{$item['mortality']}}</td>

                                            </tr>

                                            @endforeach

                                            <tr class="bg-light">

                                                <td colspan="2">Total</td>
                                                <td class="text-right"><strong>{{$sum6}}</strong></td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                @endif



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
