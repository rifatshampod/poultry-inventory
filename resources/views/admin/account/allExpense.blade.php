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
                            <a href="javascript:void(0)">All Expense</a>
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

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Expense</h4>


                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Farm</th>
                                        <th scope="col">House</th>
                                        <th scope="col">Flock</th>
                                        <th scope="col">Expense Type</th>
                                        <th scope="col">Expense Sector</th>
                                        <th scope="col">Paid From</th>
                                        <th scope="col">Approver</th>
                                        <th scope="col">Reference</th>
                                        <th scope="col">Amount</th>
                                        <th class="" scope="col">
                                            <span class="float-right">Action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expenseList as $item)
                                    <tr>
                                        <td>{{\Carbon\Carbon::parse($item['date'])->format('d/m/Y')}}</td>


                                        <td>{{$item->farm->name}}</td>
                                        <td>{{$item->house->name}}</td>
                                        <td>{{$item->flock->name}}</td>
                                        <td>{{$item->expenseType->name}}</td>
                                        <td>{{$item->expenseSector->name}}</td>
                                        @if($item['paid_from']==1)
                                        <td>Petty Cash</td>
                                        @elseif($item['paid_from']==2)
                                        <td>Head Office</td>
                                        @endif
                                        <td>{{$item['approver']}}</td>
                                        <td>{{$item['reference']}}</td>
                                        <td>{{$item['amount']}}</td>
                                        <td>

                                            <span class="float-right">
                                                <a id="{{$item['id']}}" onclick="openModal(this.id)" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i>
                                                </a>
                                            </span>

                                            {{-- <div class="dropdown custom-dropdown float-right cursor">
                                                <div data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item text-primary" href="#" data-toggle="modal" data-target="#addExpense">Add Expense</a>
                                                    <a class="dropdown-item text-warning" href="singleExpense.html">View Farm</a>
                                                </div>
                                            </div> --}}
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
    <!-------edit-Modal------>
    <div class="modal fade bs-example-modal-center" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " style="min-width:60%;">
            <div class="modal-content">
                <div class="modal-body p-5">
                    <form action="edit-expense-info" method="POST">
                        @csrf

                        <input type="hidden" class="form-control input-default" id="edit_expense_id" name="expense_id" />

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Farm Name</label>
                                <select class="form-control input-default" name="farm_id" id="edit_farm_id" required>
                                    <option value="" selected disabled hidden>Select Farm</option>
                                    @foreach ($farmList as $item)
                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>House Name</label>
                                <select class="form-control input-default" name="house_id" id="edit_house_id" required>


                                    <option value="" selected disabled hidden>Select House</option>
                                    @foreach ($houseList as $item)
                                    <option value="{{$item['id']}}">{{$item['name']}} ({{$item->farm->name}})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Flock</label>
                                <select class="form-control input-default" name="flock_id" id="edit_flock_id" required>

                                    @foreach($flockList as $flockList)
                                    <option value="{{$flockList->id}}" selected>{{$flockList->name}} ({{$flockList->farm->name}})</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-md-6">
                                <label>Date</label>
                                <input type="date" class="form-control input-default" id="edit_date" name="date" placeholder="Input Start Date" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Expense Sector</label>
                                <select class="form-control input-default" name="expense_sector_id" id="edit_expense_sector_id">
                                    <option value="" selected disabled hidden>Select Expense Sector</option>
                                    @foreach ($sectorList as $item)
                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Expense Type</label>
                                <select class="form-control input-default" name="expense_type_id" id="edit_expense_type_id">
                                    <option value="" selected disabled hidden>Select Expense Type</option>
                                    @foreach ($typeList as $item)
                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Amount</label>
                                <input type="number" class="form-control input-default" name="amount" id="edit_amount" placeholder="Input amount" />
                                <input type="hidden" class="form-control input-default" name="previous_amount" id="edit_previous_amount" placeholder="Input amount" />

                            </div>

                            <div class="form-group col-md-6">
                                <label>Paid From</label>
                                <select class="form-control input-default" name="paid_from" id="edit_paid_from">
                                    <option value="1" selected>Petty Cash</option>
                                    <option value="2">Direct Payment by Head Office</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Approver</label>
                                <select class="form-control input-default" name="approver" id="edit_approver">
                                    <option selected>Head Office</option>
                                    <option> Farm Manager</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Reference </label>
                                <input type="text" class="form-control input-default" name="reference" id="edit_reference" placeholder="Type Reference" />
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
            console.log(clicked_id);
            //document.getElementById("getId").value = clicked_id;
            $.ajax({
                url: '/edit-expense' + clicked_id
                , type: "GET"
                , success: function(response) {
                    console.log(response);
                    $('#edit_farm_id').val(response.data.farm_id);
                    $('#edit_house_id').val(response.data.house_id);
                    $('#edit_flock_id').val(response.data.flock_id);
                    $('#edit_date').val(response.data.date);
                    $('#edit_expense_sector_id').val(response.data.expense_sector_id);
                    $('#edit_expense_type_id').val(response.data.expense_type_id);
                    $('#edit_amount').val(response.data.amount);
                    $('#edit_previous_amount').val(response.data.amount);
                    $('#edit_paid_from').val(response.data.paid_from);
                    $('#edit_approver').val(response.data.approver);
                    $('#edit_reference').val(response.data.reference);
                    $('#edit_expense_id').val(clicked_id);
                }
            });
        }

    </script>


</body>
</html>
