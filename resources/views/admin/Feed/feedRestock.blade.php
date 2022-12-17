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
                            <a href="javascript:void(0)">All Feed</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title">Total in Stock : 50</h4>
                            </div>
                            <div class="d-flex">
                                <div class=" mr-2 ">
                                    <button type="button" class="btn mb-1 btn-primary">
                                        Add New
                                        <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                                    </button>
                                </div>
                                <div>
                                    <button type="button" class="btn mb-1 btn-primary">
                                        Restock
                                        <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Farm</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Price</th>
                                        <th class="" scope="col">
                                            <span class="float-right">Action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($feedList as $item)
                                    <tr>
                                        <td>{{$item['date']}}</td>
                                        <td>{{$item->farm->name}}</td>
                                        <td>{{$item['amount']}}</td>
                                        <td>{{$item['brand']}}</td>
                                        <td>{{$item['price']}}</td>

                                        <td>
                                            <div class="dropdown custom-dropdown float-right cursor">
                                                <div data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-v display-7"></i>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item text-danger" href="#">Edit</a>
                                                    <a class="dropdown-item text-success" href="#">View</a>
                                                </div>
                                            </div>
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
