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
                            <a href="javascript:void(0)">All Employee</a>
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
                                    <h3>Add Employee</h3>
                                </div>
                                <form action="add-employee" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control input-default" placeholder="Name" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Phone</label>
                                            <input type="number" name="phone" class="form-control input-default" placeholder="Number" />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control input-default" placeholder="Address" />
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Farm</label>
                                                <select class="form-control input-default" name="farm_id">
                                                    <!--    <option value="" selected disabled hidden>Select Employee Designation</option> -->
                                                    @foreach ($farmList as $item)
                                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <select class="form-control input-default" name="designation_id">
                                                    <!--    <option value="" selected disabled hidden>Select Employee Designation</option> -->
                                                    @foreach ($designationList as $item)
                                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>NID</label>
                                            <input type="number" name="nid" class="form-control input-default" placeholder="NID No." />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Monthly Salary</label>
                                            <input type="number" name="salary" class="form-control input-default" placeholder="Salary" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Image</label>
                                            <input type="file" name="image" class="form-control input-default" />
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
                                <h4 class="card-title">All Employee</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Designation</th>
                                                <th scope="col">Salary</th>
                                                <th class="" scope="col">
                                                    <span class="float-right">Action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($employeeList as $item)
                                            <tr>
                                                <td>
                                                    @if($item['image'])
                                                    <img src="images/employees/{{$item['image']}}" alt="" width="50px" height="50px">

                                                    @endif {{$item['name']}}</td>
                                                <td>{{$item['phone']}}</td>
                                                <td>{{$item->designation->name}}</td>
                                                <td>{{$item['salary']}}</td>
                                                <td>
                                                    <div class="dropdown custom-dropdown float-right cursor">
                                                        <div data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item text-primary" href="singleEmployee.html">View</a>
                                                            <a class="dropdown-item text-warning" href="#">Edit</a>
                                                            <a class="dropdown-item text-danger" href="#">Delete</a>
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
</body>
</html>
