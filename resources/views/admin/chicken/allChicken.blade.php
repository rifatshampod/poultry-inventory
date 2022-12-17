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
                            <a href="javascript:void(0)">All Chicken</a>
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
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="card-title">All Chicken</h4>
                                    </div>

                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th scope="col">House</th>
                                                <th scope="col">Age</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Balance</th>
                                                <th scope="col">Weight</th>
                                                <th scope="col">FCR</th>
                                                <th scope="col">Dead</th>
                                                <th scope="col">Rejected</th>
                                                <th scope="col">Sold</th>
                                                <th class="" scope="col">
                                                    <span class="float-right">Action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($chickenList1 as $item)
                                            <tr>
                                                <td>{{$item->house->name}}</td>
                                                <td>{{(Carbon\Carbon::parse($item['date']))->diffInDays(Carbon\Carbon::now())+1}} days</td>
                                                <td>{{$item['sum_of_doc']}}</td>
                                                <td>{{$item['sum_of_doc'] - $item['sum_of_mortality']}}</td>
                                                <td>{{number_format($item['avg_weight'], 2, '.', ',')}} Kg</td>
                                                <td>{{number_format($item['avg_fcr'], 2, '.', ',')}}</td>
                                                <td>{{$item['sum_of_mortality']}}</td>
                                                <td>{{$item['sum_of_rejection']}}</td>
                                                <td>100</td>
                                                <td>
                                                    <div class="dropdown custom-dropdown float-right cursor">
                                                        <div data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v display-7 display-7"></i>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <button value="{{$item['id']}}" class="dailyBtn dropdown-item text-primary">
                                                                <i class="ti-plus mr-1"></i>Add Daily Data
                                                            </button>
                                                            <a class="dropdown-item text-warning" href="#">Sale</a>
                                                            <a class="dropdown-item text-danger" href="#">View</a>
                                                            <a class="dropdown-item text-success" href="#">Edit</a>
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
                    <div id="farm-2" class="tab-pane">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="card-title">All Chicken</h4>
                                    </div>
                                    <div>
                                        <button type="button" class="btn mb-1 btn-primary" data-toggle="modal" data-target="#addDoc">
                                            Add Doc
                                            <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th scope="col">House</th>
                                                <th scope="col">Age</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Balance</th>
                                                <th scope="col">Weight</th>
                                                <th scope="col">FCR</th>
                                                <th scope="col">Dead</th>
                                                <th scope="col">Rejected</th>
                                                <th scope="col">Sold</th>
                                                <th class="" scope="col">
                                                    <span class="float-right">Action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($chickenList2 as $item)
                                            <tr>
                                                <td>{{$item->house->name}}</td>
                                                <td>{{(Carbon\Carbon::parse($item['date']))->diffInDays(Carbon\Carbon::now())+1}} days</td>
                                                <td>{{$item['sum_of_doc']}}</td>
                                                <td>{{$item['sum_of_doc'] - $item['sum_of_mortality']}}</td>
                                                <td>{{number_format($item['avg_weight'], 2, '.', ',')}} Kg</td>
                                                <td>{{number_format($item['avg_fcr'], 2, '.', ',')}}</td>
                                                <td>{{$item['sum_of_mortality']}}</td>
                                                <td>{{$item['sum_of_rejection']}}</td>
                                                <td>100</td>
                                                <td>
                                                    <div class="dropdown custom-dropdown float-right cursor">
                                                        <div data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v display-7 display-7"></i>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <button value="{{$item['id']}}" class="dailyBtn dropdown-item text-primary">
                                                                <i class="ti-plus mr-1"></i>Add Daily Data
                                                            </button>

                                                            <a class="dropdown-item text-warning" href="#">Sale</a>
                                                            <a class="dropdown-item text-danger" href="#">View</a>
                                                            <a class="dropdown-item text-success" href="#">Edit</a>
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
                    <div id="farm-3" class="tab-pane">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="card-title">All Chicken</h4>
                                    </div>
                                    <div>
                                        <button type="button" class="btn mb-1 btn-primary" data-toggle="modal" data-target="#addDoc">
                                            Add Doc
                                            <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th scope="col">House</th>
                                                <th scope="col">Age</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Balance</th>
                                                <th scope="col">Weight</th>
                                                <th scope="col">FCR</th>
                                                <th scope="col">Dead</th>
                                                <th scope="col">Rejected</th>
                                                <th scope="col">Sold</th>
                                                <th class="" scope="col">
                                                    <span class="float-right">Action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($chickenList3->isEmpty())
                                            No data
                                            @else
                                            @foreach ($chickenList3 as $item)
                                            <tr>
                                                {{-- <td>{{$item->house->name}}</td> --}}
                                                <td>{{(Carbon\Carbon::parse($item['date']))->diffInDays(Carbon\Carbon::now())+1}} days</td>
                                                <td>{{$item['sum_of_doc']}}</td>
                                                <td>{{$item['sum_of_doc'] - $item['sum_of_mortality']}}</td>
                                                <td>{{number_format($item['avg_weight'], 2, '.', ',')}} Kg</td>
                                                <td>{{number_format($item['avg_fcr'], 2, '.', ',')}}</td>
                                                <td>{{$item['sum_of_mortality']}}</td>
                                                <td>{{$item['sum_of_rejection']}}</td>
                                                <td>100</td>
                                                <td>
                                                    <div class="dropdown custom-dropdown float-right cursor">
                                                        <div data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v display-7 display-7"></i>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <button value="{{$item['id']}}" class="dailyBtn dropdown-item text-primary">
                                                                <i class="ti-plus mr-1"></i>Add Daily Data
                                                            </button>

                                                            <a class="dropdown-item text-warning" href="#">Sale</a>
                                                            <a class="dropdown-item text-danger" href="#">View</a>
                                                            <a class="dropdown-item text-success" href="#">Edit</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                            @endif


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="farm-4" class="tab-pane">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="card-title">All Chicken</h4>
                                    </div>
                                    <div>
                                        <button type="button" class="btn mb-1 btn-primary" data-toggle="modal" data-target="#addDoc">
                                            Add Doc
                                            <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th scope="col">House</th>
                                                <th scope="col">Age</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Balance</th>
                                                <th scope="col">Weight</th>
                                                <th scope="col">FCR</th>
                                                <th scope="col">Dead</th>
                                                <th scope="col">Rejected</th>
                                                <th scope="col">Sold</th>
                                                <th class="" scope="col">
                                                    <span class="float-right">Action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($chickenList4 as $item)
                                            <tr>
                                                <td>{{$item->house->name}}</td>
                                                <td>{{(Carbon\Carbon::parse($item['date']))->diffInDays(Carbon\Carbon::now())+1}} days</td>
                                                <td>{{$item['sum_of_doc']}}</td>
                                                <td>{{$item['sum_of_doc'] - $item['sum_of_mortality']}}</td>
                                                <td>{{number_format($item['avg_weight'], 2, '.', ',')}} Kg</td>
                                                <td>{{number_format($item['avg_fcr'], 2, '.', ',')}}</td>
                                                <td>{{$item['sum_of_mortality']}}</td>
                                                <td>{{$item['sum_of_rejection']}}</td>
                                                <td>100</td>
                                                <td>
                                                    <div class="dropdown custom-dropdown float-right cursor">
                                                        <div data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v display-7 display-7"></i>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <button value="{{$item['id']}}" class="dailyBtn dropdown-item text-primary">
                                                                <i class="ti-plus mr-1"></i>Add Daily Data
                                                            </button>

                                                            <a class="dropdown-item text-warning" href="#">Sale</a>
                                                            <a class="dropdown-item text-danger" href="#">View</a>
                                                            <a class="dropdown-item text-success" href="#">Edit</a>
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
            </div>
        </div>

        <!--------------------Modal Start----------------------->


        <!-------------------Add Data Modal start ------------------->
        <div class="modal fade" id="addData" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="mb-4">
                            <h5 class="modal-title">Add Data</h5>
                        </div>
                        <form action="">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Mortality</label>
                                        <input type="number" class="form-control input-default" placeholder="Mortality" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Rejection</label>
                                        <input type="number" class="form-control input-default" placeholder="Rejection" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Weight 1</label>
                                        <input type="number" class="form-control input-default" placeholder="Weight 1" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Weight 2</label>
                                        <input type="number" class="form-control input-default" placeholder="Weight 2" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Weight 3</label>
                                        <input type="number" class="form-control input-default" placeholder="Weight 3" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Weight 4</label>
                                        <input type="number" class="form-control input-default" placeholder="Weight 4" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label> Feed Consumption</label>
                                        <input type="number" class="form-control input-default" placeholder="Feed Consumption" />
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Add Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-------------------Add Data Modal End ------------------->
        <!---------------------Modal End------------------------>
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
    <script src="plugin/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- jquery vendor -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
    <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

    <script>
        //daily production
        $(document).ready(function() {
            $(document).on('click', '.dailyBtn', function() {
                var daily_id = $(this).val();
                console.log(daily_id);
                jQuery.noConflict();
                $('#addData').modal('show');
                // $.ajax({
                //     url: '/edit-production' + daily_id
                //     , type: "GET"
                //     , success: function(response) {
                //         console.log(response);
                //         $('#target_daily').val(response.production.total_receive);
                //         $('#total_production').val(response.production.total_production);
                //         // $('#inhand').val(response.production.balance);
                //         $('#daily_id').val(daily_id);
                //     }
                // });
                // $('#daily_id').val(daily_id);

            });
        });

    </script>
</body>
</html>
