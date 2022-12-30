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
                            <a href="#farm-1" class="nav-link rounded active" data-toggle="tab" aria-expanded="false">Farm 1</a>
                        </li>
                        <li class="nav-item">
                            <a href="#farm-2" class="nav-link rounded" data-toggle="tab" aria-expanded="false">Farm 2</a>
                        </li>
                        <li class="nav-item">
                            <a href="#farm-3" class="nav-link rounded" data-toggle="tab" aria-expanded="true">Farm 3</a>
                        </li>
                        <li class="nav-item">
                            <a href="#farm-4" class="nav-link rounded" data-toggle="tab" aria-expanded="true">Farm 4</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content br-n pn">
                    <div id="farm-1" class="tab-pane active">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Show Farm Wise Sales information</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>

                                                <th scope="col">House</th>
                                                <th scope="col">Total Sold</th>
                                                <th scope="col">Total Weight</th>
                                                <th scope="col">Average Weight</th>
                                                <th scope="col">Total Price</th>
                                                <th scope="col">Avg Price/Bird</th>
                                                <th scope="col">Avg price/KG</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($saleList1 as $item)
                                            <tr>

                                                <td>{{$item->house->name}}</td>
                                                <td>{{$item['sum_of_birds']}}</td>
                                                <td>{{$item['sum_of_weight']}}</td>
                                                <td>{{$item['avg_of_weight']}}</td>
                                                <td>{{$item['sum_of_price']}}</td>
                                                <td>{{$item['avg_of_price']}}</td>
                                                <td>{{$item['avg_kg_price']}}</td>
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

                                                <th scope="col">House</th>
                                                <th scope="col">Total Sold</th>
                                                <th scope="col">Total Weight</th>
                                                <th scope="col">Average Weight</th>
                                                <th scope="col">Total Price</th>
                                                <th scope="col">Avg Price/Bird</th>
                                                <th scope="col">Avg price/KG</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($saleList2 as $item)
                                            <tr>

                                                <td>{{$item->house->name}}</td>
                                                <td>{{$item['sum_of_birds']}}</td>
                                                <td>{{$item['sum_of_weight']}}</td>
                                                <td>{{$item['avg_of_weight']}}</td>
                                                <td>{{$item['sum_of_price']}}</td>
                                                <td>{{$item['avg_of_price']}}</td>
                                                <td>{{$item['avg_kg_price']}}</td>
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
                                                <th scope="col">House</th>
                                                <th scope="col">Total Sold</th>
                                                <th scope="col">Total Weight</th>
                                                <th scope="col">Average Weight</th>
                                                <th scope="col">Total Price</th>
                                                <th scope="col">Avg Price/Bird</th>
                                                <th scope="col">Avg price/KG</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($saleList3 as $item)
                                            <tr>
                                                <td>{{$item->house->name}}</td>
                                                <td>{{$item['sum_of_birds']}}</td>
                                                <td>{{$item['sum_of_weight']}}</td>
                                                <td>{{$item['avg_of_weight']}}</td>
                                                <td>{{$item['sum_of_price']}}</td>
                                                <td>{{$item['avg_of_price']}}</td>
                                                <td>{{$item['avg_kg_price']}}</td>
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
                                                <th scope="col">House</th>
                                                <th scope="col">Total Sold</th>
                                                <th scope="col">Total Weight</th>
                                                <th scope="col">Average Weight</th>
                                                <th scope="col">Total Price</th>
                                                <th scope="col">Avg Price/Bird</th>
                                                <th scope="col">Avg price/KG</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($saleList4 as $item)
                                            <tr>
                                                <td>{{$item->house->name}}</td>
                                                <td>{{$item['sum_of_birds']}}</td>
                                                <td>{{$item['sum_of_weight']}}</td>
                                                <td>{{$item['avg_of_weight']}}</td>
                                                <td>{{$item['sum_of_price']}}</td>
                                                <td>{{$item['avg_of_price']}}</td>
                                                <td>{{$item['avg_kg_price']}}</td>
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
