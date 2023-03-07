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
                            <a href="dashboard">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="javascript:void(0)">All Petty Cash</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-4">
                                    <h3>Add Petty Cash</h3>
                                </div>
                                <form action="add-petty-cash" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Farm Name</label>
                                            <select class="form-control input-default" name="farm_id">
                                                @foreach ($farmList as $item)
                                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Date</label>
                                            <input type="date" class="form-control input-default" name="date" placeholder="Input Start Date" />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Amount (BDT)</label>
                                            <input type="number" class="form-control input-default" name="amount" placeholder="Input amount" />
                                        </div>

                                        <div class="col-md-12">
                                            <div>
                                                <button type="submit" class="btn mb-1 btn-primary w-100">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        @if (Session::get('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{Session::get('status')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <h3 class="pt-3 pb-5">Farm Wise Petty Cash Left</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">Farm</th>
                                                <th scope="col">Cash In Stock</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pettyCash as $item)
                                            <tr>
                                                <td>{{$item->farm->name}}</td>
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
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Added Petty Cash</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">Date (mm/dd/yyyy)</th>
                                                <th scope="col">Farm</th>
                                                <th scope="col">Cash Added</th>
                                                <th class="" scope="col">
                                                    <span class="float-right">Action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($singleCash as $item)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($item['date'])->format('m/d/Y')}}</td>

                                                <td>{{$item->farm->name}}</td>
                                                <td>{{$item['amount']}}</td>


                                                <td>
                                                    <span class="float-right"><a id="{{$item['id']}}" onclick="openModal(this.id)" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i>
                                                        </a>
                                                        {{-- <a href="#" data-toggle="tooltip" data-placement="top" title="End"><i class="fa fa-trash color-muted m-r-5"></i>
                                                        </a> --}}
                                                    </span>
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
    <!-------edit-Modal------>
    <div class="modal fade bs-example-modal-center" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " style="min-width:40%;">
            <div class="modal-content">
                <div class="modal-body p-5">
                    <form action="edit-pettycash-info" method="POST">
                        @csrf

                        <input type="hidden" class="form-control input-default" id="edit_pettycash_id" name="pettycash_id" />

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Farm Name</label>
                                <select class="form-control input-default" name="farm_id" id="edit_farm_id" required>
                                    <option value="" selected disabled hidden>Select Farm</option>
                                    @foreach ($farmList as $item)
                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-md-6">
                                <label>Date</label>
                                <input type="date" class="form-control input-default" id="edit_date" name="date" placeholder="Input Start Date" />
                            </div>

                            <div class="form-group col-md-6">
                                <label>Amount</label>
                                <input type="number" class="form-control input-default" name="amount" id="edit_amount" placeholder="Input amount" />
                                <input type="hidden" class="form-control input-default" name="previous_amount" id="edit_previous_amount" placeholder="Input amount" />

                            </div>


                            <div class="col-md-12 mt-4 text-center">
                                <div>
                                    <button type="submit" class="btn mb-1 btn-primary w-50">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!---- End of edit modal ---->


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
    <!-- Edit Modal functions -->
    <script>
        function openModal(clicked_id) {
            $("#largeModal").modal("show");
            //document.getElementById("getId").value = clicked_id;
            $.ajax({
                url: '/edit-pettycash' + clicked_id
                , type: "GET"
                , success: function(response) {
                    console.log(response);
                    $('#edit_farm_id').val(response.data.farm_id);
                    $('#edit_date').val(response.data.date);
                    $('#edit_amount').val(response.data.amount);
                    $('#edit_previous_amount').val(response.data.amount);
                    $('#edit_pettycash_id').val(clicked_id);
                }
            });
        }

    </script>


</body>
</html>
