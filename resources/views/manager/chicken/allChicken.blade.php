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

                @if (Session::get('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('status')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if (Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{Session::get('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif


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
                                                <th scope="col">Flock</th>
                                                <th scope="col">House</th>
                                                <th scope="col">Age</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Balance</th>
                                                <th scope="col">Weight</th>
                                                <th scope="col">FCR</th>
                                                <th scope="col">Dead</th>
                                                <th scope="col">Avg Dead</th>
                                                <th scope="col">Rejected</th>
                                                <th scope="col">Sold</th>
                                                <th class="" scope="col">
                                                    <span class="float-right">Action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($chickenList as $item)
                                            <tr>
                                                <td>{{$item->flock->name}}</td>
                                                <td>{{$item->house->name}}</td>
                                                <td>{{(Carbon\Carbon::parse($item['date']))->diffInDays(Carbon\Carbon::now())}} days</td>
                                                <td>{{$item['first_doc']}}</td>
                                                <td>{{$item['sum_of_doc'] - $item['sum_of_mortality']-$item['sum_of_rejection']}}</td>
                                                <td>{{number_format($item['avg_weight'], 2, '.', ',')}} Kg</td>
                                                <td>{{number_format($item['avg_fcr'], 2, '.', ',')}}</td>
                                                <td>{{$item['sum_of_mortality']}}</td>
                                                <td>{{round($item['avg_of_mortality'])}}</td>
                                                <td>{{$item['sum_of_rejection']}}</td>
                                                <td>{{$item['first_doc'] - $item['sum_of_doc']}}</td>

                                                <td>
                                                    <a class="cursor text-primary" id="{{$item['id']}}" onclick="openModal(this.id)"><i class="ti-plus mr-1"></i>Add Daily Data</a>

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
                            <h5 class="modal-title">Add Daily Data</h5>
                        </div>
                        <form action="add-daily-data" method="post">
                            @csrf
                            <div class="row">

                                <input type="text" class="form-control input-default" id="chickenId" name="chicken_id" />
                                <input type="text" class="form-control input-default" id="farmId" name="farm_id" />

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Date</label>
                                        <input type="date" name="date" class="form-control input-default" min={{$flock->start_date}} placeholder="Today's Date" required />
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Mortality</label>
                                        <input type="number" name="mortality" class="form-control input-default" placeholder="Mortality" required />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Rejection</label>
                                        <input type="number" name="rejection" class="form-control input-default" placeholder="Rejection" required />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Weight 1 (for 12 chicken in gram)</label>
                                        <input type="number" name="weight1" step='1' class="form-control input-default" placeholder="Weight 1" required />

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Weight 2 (for 12 chicken in gram)</label>

                                        <input type="number" name="weight2" step='1' class="form-control input-default" placeholder="Weight 2" required />

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Weight 3 (for 12 chicken in gram)</label>

                                        <input type="number" name="weight3" step='1' class="form-control input-default" placeholder="Weight 3" required />

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Weight 4 (for 12 chicken in gram)</label>

                                        <input type="number" name="weight4" step='1' class="form-control input-default" placeholder="Weight 4" required />

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> Feed Consumption (Total in KG)</label>
                                        <input type="number" name="feed_consumption" step='0.001' class="form-control input-default" placeholder="Feed Consumption" required />

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
        function openModal(clicked_id) {
            $("#addData").modal("show");
            console.log(clicked_id);

            document.getElementById("chickenId").value = clicked_id;
            $.ajax({
                url: '/getdata-add-chicken' + clicked_id
                , type: "GET"
                , success: function(response) {
                    console.log(response);
                    $('#farmId').val(response.chicken.farm_id);
                }
            });
        }

    </script>

</body>
</html>
