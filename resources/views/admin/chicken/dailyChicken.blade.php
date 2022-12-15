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
                            <a href="javascript:void(0)">Daily Chicken</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Show all daily input</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th scope="col">Date</th>
                                                <th scope="col">House</th>
                                                <th scope="col">F.C.</th>
                                                <th scope="col">F.C.R</th>
                                                <th scope="col">Weight 1</th>
                                                <th scope="col">Weight 2</th>
                                                <th scope="col">Weight 3</th>
                                                <th scope="col">Weight 4</th>
                                                <th scope="col">Morality</th>
                                                <th scope="col">Rejection</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dailyList as $item)
                                            <tr>
                                                <th>{{$item['date']}}</th>
                                                <td>{{$item->chicken->house->name}}</td>
                                                <td>{{$item['feed_consumption']}}</td>
                                                <td>{{$item['fcr']}}</td>
                                                <td>{{$item['weight1']}}</td>
                                                <td>{{$item['weight2']}}</td>
                                                <td>{{$item['weight3']}}</td>
                                                <td>{{$item['weight4']}}</td>
                                                <td>{{$item['mortality']}}</td>
                                                <td>{{$item['rejection']}}</td>
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
