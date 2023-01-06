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
                            <a href="javascript:void(0)">Leave Request</a>
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
                                    <h3>Add Leave Request</h3>
                                </div>
                                <form action="add-leave" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Employee Name</label>
                                            <select class="form-control input-default" name="employee_id">
                                                <!--  <option value="" selected disabled hidden>Select Employee Designation</option> -->
                                                @foreach ($employeeList as $item)
                                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Leave From</label>
                                            <input type="date" name="from" class="form-control input-default" id="startDate" placeholder="" />

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Leave To</label>
                                            <input type="date" name="to" class="form-control input-default" id="endDate" onchange="getDateDifference()" placeholder="" />

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Duration (in Days)</label>
                                            <input type="text" name="duration" class="form-control input-default" placeholder="Duration." id="result" readonly />

                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Reason</label>
                                            <textarea class="w-100 p-3" name="reason" id="" rows="7" placeholder=" Enter Reason"></textarea>
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
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Leave Request</h4>
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
                                            @foreach ($leaveList as $item)
                                            <tr>
                                                <td>{{$item->employee->name}}</td>
                                                <td>{{$item['from']}}</td>
                                                <td>{{$item['to']}}</td>
                                                <td>{{$item['duration']}} days</td>
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

    <script>
        function getDateDifference() {
            // Get the start and end date values
            var startDate = document.getElementById('startDate').value;
            var endDate = document.getElementById('endDate').value;

            // Convert the strings to Date objects
            var start = new Date(startDate);
            var end = new Date(endDate);

            // Calculate the difference in milliseconds
            var difference = end - start;

            // Convert the difference to days
            var days = Math.round(difference / (1000 * 60 * 60 * 24));

            // Set the value of the result field
            document.getElementById('result').value = days + ' days';
        }

    </script>
</body>
</html>
