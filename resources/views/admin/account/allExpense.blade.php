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
                                        <td>{{$item['date']}}</td>
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
                                            <div class="dropdown custom-dropdown float-right cursor">
                                                <div data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item text-primary" href="#" data-toggle="modal" data-target="#addExpense">Add Expense</a>
                                                    <a class="dropdown-item text-warning" href="singleExpense.html">View Farm</a>
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
