<!-- @format -->

<!DOCTYPE html>
<html lang="en">
<x-assets />

<body>
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <x-header />

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid mt-3">
                <div class="row">

                    {{-- Chicken in stock --}}
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Chicken in Stock</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{$chicken - $dead - $rejected}}</h2>

                                    <p class="text-white mb-0">All farms total.</p>

                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>

                    {{-- Total Expenses --}}
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Expenses</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">&#2547; {{$expense->total}}</h2>

                                    <p class="text-white mb-0">{{date('M j, y', strtotime($expense->first))}} - {{date('M j, y', strtotime($expense->last))}}</p>




                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>

                    {{-- Total Petty Cash --}}
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Petty Cash Left</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">&#2547; {{$cash}}</h2>
                                    <p class="text-white mb-0">All Farms total</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>

                    {{-- Feed in stock --}}
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Feed in Stock</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{$feed}} KG</h2>
                                    <p class="text-white mb-0">In: {{$feedRestock}} | Used: {{$consumption}}</p>
                                </div>
                                {{-- <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    {{-- Flock Summary --}}
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Active Flocks</h4>
                                <div class="table-responsive">
                                    <table class="table header-border table-hover verticle-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">Flock</th>
                                                <th scope="col">Farm</th>
                                                <th scope="col" style="text-align:right;">Age (Day)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($flockList as $item)
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->farm->name}}</td>
                                                <td style="text-align:center;">{{(Carbon\Carbon::parse($item['start_date']))->diffInDays(Carbon\Carbon::now())}}</td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- Mortality Summary --}}
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Mortality Summary</h4>
                                <div class="table-responsive">
                                    <table class="table header-border table-hover verticle-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Farm</th>
                                                <th scope="col" style="text-align:right;">Mortality</th>
                                                <th scope="col" style="text-align:center;">Rate</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($chickenList as $item)
                                            <tr>
                                                <th>{{$loop->iteration}}</th>
                                                <td>{{$item->farm->name}}</td>
                                                <td style="text-align:right;">{{$item['sum_of_mortality']}}</td>

                                                <td style="text-align:center;">

                                                    @if(($item['sum_of_mortality']/$item['sum_of_chicken'])*100 < 1) <span class="label gradient-1 btn-rounded">{{number_format(($item['sum_of_mortality']/$item['sum_of_chicken'])*100,1)}}%</span>
                                                        @elseif(($item['sum_of_mortality']/$item['sum_of_chicken'])*100 >1 && ($item['sum_of_mortality']/$item['sum_of_chicken'])*100 <2) <span class="label gradient-3 btn-rounded">{{number_format(($item['sum_of_mortality']/$item['sum_of_chicken'])*100,1)}}%</span>
                                                            @else
                                                            <span class="label gradient-2 btn-rounded">{{number_format(($item['sum_of_mortality']/$item['sum_of_chicken'])*100,1)}}%</span>
                                                            @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- Rejection Summary --}}
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Rejection Summary</h4>
                                <div class="table-responsive">
                                    <table class="table header-border table-hover verticle-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Farm</th>
                                                <th scope="col" style="text-align:right;">Rejection</th>

                                                <th scope="col" style="text-align:center;">Rate</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($chickenList as $item)
                                            <tr>
                                                <th>{{$loop->iteration}}</th>
                                                <td>{{$item->farm->name}}</td>
                                                <td style="text-align:right;">{{$item['sum_of_rejection']}}</td>

                                                <td style="text-align:center;">

                                                    @if(($item['sum_of_rejection']/$item['sum_of_chicken'])*100 < 1) <span class="label gradient-1 btn-rounded">{{number_format(($item['sum_of_rejection']/$item['sum_of_chicken'])*100,1)}}%</span>
                                                        @elseif(($item['sum_of_rejection']/$item['sum_of_chicken'])*100 >1 && ($item['sum_of_rejection']/$item['sum_of_chicken'])*100 <2) <span class="label gradient-3 btn-rounded">{{number_format(($item['sum_of_rejection']/$item['sum_of_chicken'])*100,1)}}%</span>
                                                            @else
                                                            <span class="label gradient-2 btn-rounded">{{number_format(($item['sum_of_rejection']/$item['sum_of_chicken'])*100,1)}}%</span>
                                                            @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- FCR Summary --}}
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">FCR Summary</h4>
                                <div class="table-responsive">
                                    <table class="table header-border table-hover verticle-middle">
                                        <thead style="background-color: rgb(0, 0, 0); color:#ffffff">

                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Farm</th>
                                                <th scope="col" style="text-align:right;">FCR</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($chickenList as $item)
                                            <tr>
                                                <th>{{$loop->iteration}}</th>
                                                <td>{{$item->farm->name}}</td>
                                                <td style="text-align:right;">{{number_format($item['avg_fcr'],2)}}</td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <!--
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Expense Summary</h4>
                                <div id="morris-bar-chart"></div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card card-widget">
                            <div class="card-body">
                                <h5 class="text-muted">Sales Overview </h5>
                                <h2 class="mt-4">5680</h2>
                                <span>Total Revenue</span>
                                {{-- single farm  --}}
                                <div class="mt-4">
                                    <h4>1289</h4>
                                    <h6>Batajore <span class="pull-right">30%</span></h6>
                                    <div class="progress mb-3" style="height: 7px">
                                        <div class="progress-bar bg-primary" style="width: 30%;" role="progressbar"><span class="sr-only">30% Order</span>
                                        </div>
                                    </div>
                                </div>
                                {{-- single farm  --}}
                                <div class="mt-4">
                                    <h4>5150</h4>
                                    <h6 class="m-t-10 text-muted"> Narangi 1 <span class="pull-right">50%</span></h6>

                                    <div class="progress mb-3" style="height: 7px">
                                        <div class="progress-bar bg-success" style="width: 50%;" role="progressbar"><span class="sr-only">50% Order</span>
                                        </div>
                                    </div>
                                </div>
                                {{-- single farm  --}}
                                <div class="mt-4">
                                    <h4>2120</h4>
                                    <h6 class="m-t-10 text-muted">Farm 4 <span class="pull-right">20%</span></h6>

                                    <div class="progress mb-3" style="height: 7px">
                                        <div class="progress-bar bg-warning" style="width: 20%;" role="progressbar"><span class="sr-only">20% Order</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-0">
                                <h4 class="card-title px-4 mb-3">Todo</h4>
                                <div class="todo-list">
                                    <div class="tdl-holder">
                                        <div class="tdl-content">
                                            <ul id="todo_list">
                                                <li><label><input type="checkbox"><i></i><span>Get up</span><a href='#' class="ti-trash"></a></label></li>
                                                <li><label><input type="checkbox" checked><i></i><span>Stand up</span><a href='#' class="ti-trash"></a></label></li>
                                                <li><label><input type="checkbox"><i></i><span>Don't give up the fight.</span><a href='#' class="ti-trash"></a></label></li>
                                                <li><label><input type="checkbox" checked><i></i><span>Do something else</span><a href='#' class="ti-trash"></a></label></li>
                                            </ul>
                                        </div>
                                        <div class="px-4">
                                            <input type="text" class="tdl-new form-control" placeholder="Write new item and hit 'Enter'...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            -->

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <x-footer />
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
</body>
</html>
