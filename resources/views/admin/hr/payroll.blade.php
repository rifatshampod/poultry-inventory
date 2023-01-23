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
                            <a href="javascript:void(0)">Payroll</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="card-title">All Payroll</h4>
                                    </div>
                                    <div class="d-flex">
                                        <div class="mr-2">
                                            <button type="button" class="btn mb-1 btn-primary" data-toggle="modal" data-target="#addEmployee">
                                                Add employee
                                                <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                                            </button>
                                        </div>
                                        <div class="mr-2">
                                            <button type="button" class="btn mb-1 btn-primary" data-toggle="modal" data-target="#addSpecificEmployee">
                                                Specific Employee
                                                <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                                            </button>
                                        </div>
                                        <div class="mr-2">
                                            <button type="button" class="btn mb-1 btn-primary" data-toggle="modal" data-target="#addOvertime">
                                                Add Overtime
                                                <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th scope="col">Employee</th>
                                                <th scope="col">Start</th>
                                                <th scope="col">End</th>
                                                <th scope="col">Duration</th>
                                                <th class="" scope="col">
                                                    <span class="float-right">Action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Arif Bipu</td>
                                                <td>01-01-2023</td>
                                                <td>01-02-2023</td>
                                                <td>2 Month</td>
                                                <td>
                                                    <div class="dropdown custom-dropdown float-right cursor">
                                                        <div data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item text-primary" href="#">View</a>
                                                            <a class="dropdown-item text-warning" href="#">Edit</a>
                                                            <a class="dropdown-item text-danger" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Arif Bipu</td>
                                                <td>01-01-2023</td>
                                                <td>01-02-2023</td>
                                                <td>2 Month</td>
                                                <td>
                                                    <div class="dropdown custom-dropdown float-right cursor">
                                                        <div data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item text-primary" href="#">View</a>
                                                            <a class="dropdown-item text-warning" href="#">Edit</a>
                                                            <a class="dropdown-item text-danger" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Arif Bipu</td>
                                                <td>01-01-2023</td>
                                                <td>01-02-2023</td>
                                                <td>2 Month</td>
                                                <td>
                                                    <div class="dropdown custom-dropdown float-right cursor">
                                                        <div data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item text-primary" href="#">View</a>
                                                            <a class="dropdown-item text-warning" href="#">Edit</a>
                                                            <a class="dropdown-item text-danger" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Arif Bipu</td>
                                                <td>01-01-2023</td>
                                                <td>01-02-2023</td>
                                                <td>2 Month</td>
                                                <td>
                                                    <div class="dropdown custom-dropdown float-right cursor">
                                                        <div data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item text-primary" href="#">View</a>
                                                            <a class="dropdown-item text-warning" href="#">Edit</a>
                                                            <a class="dropdown-item text-danger" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
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
