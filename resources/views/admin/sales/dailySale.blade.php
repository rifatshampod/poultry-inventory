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
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="javascript:void(0)">Sales Data</a>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid mt-3">
                <div>
                    <ul class="nav nav-pills mb-3">
                        <li class="nav-item">
                            <a href="#farm-1" class="nav-link rounded active" data-toggle="tab" aria-expanded="false">{{$farm1->name}} Farm</a>

                        </li>
                        <li class="nav-item">
                            <a href="#farm-2" class="nav-link rounded" data-toggle="tab" aria-expanded="false">{{$farm2->name}} Farm</a>

                        </li>
                        <li class="nav-item">
                            <a href="#farm-3" class="nav-link rounded" data-toggle="tab" aria-expanded="true">{{$farm3->name}} Farm</a>

                        </li>
                        <li class="nav-item">
                            <a href="#farm-4" class="nav-link rounded" data-toggle="tab" aria-expanded="true">{{$farm4->name}} Farm</a>

                        </li>
                    </ul>
                </div>
                <div class="tab-content br-n pn">
                    <div id="farm-1" class="tab-pane active">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Show all daily Sales</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th scope="col">Date</th>
                                                <th scope="col">House</th>
                                                <th scope="col">Birds sold</th>
                                                <th scope="col">Weight</th>
                                                <th scope="col">Avg Weight</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Avg Price</th>
                                                <th scope="col">Price/KG</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Car No</th>
                                                <th scope="col">Catching Slip</th>
                                                <th scope="col">Payment Method</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($soldList1 as $item)
                                            <tr>
                                                <th>{{\Carbon\Carbon::parse($item['date'])->format('m/d/Y')}}</th>
                                                <td>{{$item->house->name}}</td>
                                                <td>{{$item['total_birds']}}</td>
                                                <td>{{$item['total_weight']}}</td>
                                                <td>{{$item['avg_weight']}}</td>
                                                <td>{{number_format($item['total_price'], 2, '.', ',')}}</td>
                                                <td>{{$item['avg_price']}}</td>
                                                <td>{{$item['per_kg_price']}}</td>
                                                <td>{{$item['customer']}}</td>
                                                <td>{{$item['car_no']}}</td>
                                                <td>{{$item['catching_slip']}}</td>
                                                <td>{{$item['payment_method']}}</td>
                                                <td>{{$item['branch']}}</td>
                                                <td>
                                                    <span class="float-right"><a id="{{$item['id']}}" onclick="openModal(this.id)" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5 px-1"></i></a></span>
                                                </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="farm-2" class="tab-pane">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Show all daily input</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th scope="col">Date</th>
                                                <th scope="col">House</th>
                                                <th scope="col">Birds sold</th>
                                                <th scope="col">Weight</th>
                                                <th scope="col">Avg Weight</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Avg Price</th>
                                                <th scope="col">Price/KG</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Car No</th>
                                                <th scope="col">Catching Slip</th>
                                                <th scope="col">Payment Method</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Action</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($soldList2 as $item)
                                            <tr>
                                                <th>{{\Carbon\Carbon::parse($item['date'])->format('m/d/Y')}}</th>
                                                <td>{{$item->house->name}}</td>
                                                <td>{{$item['total_birds']}}</td>
                                                <td>{{$item['total_weight']}}</td>
                                                <td>{{$item['avg_weight']}}</td>
                                                <td>{{number_format($item['total_price'], 2, '.', ',')}}</td>
                                                <td>{{$item['avg_price']}}</td>
                                                <td>{{$item['per_kg_price']}}</td>
                                                <td>{{$item['customer']}}</td>
                                                <td>{{$item['car_no']}}</td>
                                                <td>{{$item['catching_slip']}}</td>
                                                <td>{{$item['payment_method']}}</td>
                                                <td>{{$item['branch']}}</td>
                                                <td>
                                                    <span class="float-right"><a id="{{$item['id']}}" onclick="openModal(this.id)" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5 px-1"></i></a></span>
                                                </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div id="farm-3" class="tab-pane">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Show all daily input</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th scope="col">Date</th>
                                                <th scope="col">House</th>
                                                <th scope="col">Birds sold</th>
                                                <th scope="col">Weight</th>
                                                <th scope="col">Avg Weight</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Avg Price</th>
                                                <th scope="col">Price/KG</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Car No</th>
                                                <th scope="col">Catching Slip</th>
                                                <th scope="col">Payment Method</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Action</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($soldList3 as $item)
                                            <tr>
                                                <th>{{\Carbon\Carbon::parse($item['date'])->format('m/d/Y')}}</th>
                                                <td>{{$item->house->name}}</td>
                                                <td>{{$item['total_birds']}}</td>
                                                <td>{{$item['total_weight']}}</td>
                                                <td>{{$item['avg_weight']}}</td>
                                                <td>{{number_format($item['total_price'], 2, '.', ',')}}</td>
                                                <td>{{$item['avg_price']}}</td>
                                                <td>{{$item['per_kg_price']}}</td>
                                                <td>{{$item['customer']}}</td>
                                                <td>{{$item['car_no']}}</td>
                                                <td>{{$item['catching_slip']}}</td>
                                                <td>{{$item['payment_method']}}</td>
                                                <td>{{$item['branch']}}</td>
                                                <td>
                                                    <span class="float-right"><a id="{{$item['id']}}" onclick="openModal(this.id)" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5 px-1"></i></a></span>
                                                </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div id="farm-4" class="tab-pane">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Show all daily input</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th scope="col">Date</th>
                                                <th scope="col">House</th>
                                                <th scope="col">Birds sold</th>
                                                <th scope="col">Weight</th>
                                                <th scope="col">Avg Weight</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Avg Price</th>
                                                <th scope="col">Price/KG</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Car No</th>
                                                <th scope="col">Catching Slip</th>
                                                <th scope="col">Payment Method</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Action</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($soldList4 as $item)
                                            <tr>
                                                <th>{{\Carbon\Carbon::parse($item['date'])->format('m/d/Y')}}</th>
                                                <td>{{$item->house->name}}</td>
                                                <td>{{$item['total_birds']}}</td>
                                                <td>{{$item['total_weight']}}</td>
                                                <td>{{$item['avg_weight']}}</td>
                                                <td>{{number_format($item['total_price'], 2, '.', ',')}}</td>
                                                <td>{{$item['avg_price']}}</td>
                                                <td>{{$item['per_kg_price']}}</td>
                                                <td>{{$item['customer']}}</td>
                                                <td>{{$item['car_no']}}</td>
                                                <td>{{$item['catching_slip']}}</td>
                                                <td>{{$item['payment_method']}}</td>
                                                <td>{{$item['branch']}}</td>
                                                <td>
                                                    <span class="float-right"><a id="{{$item['id']}}" onclick="openModal(this.id)" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5 px-1"></i></a></span>
                                                </td>

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
    <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

</body>
</html>
