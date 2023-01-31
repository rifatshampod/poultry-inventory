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
                            <a href="javascript:void(0)">Flock</a>
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
                                    <h3>Add Flock</h3>
                                </div>
                                <form action="add-flock" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Flock Name</label>
                                            <input type="text" name="name" class="form-control input-default" placeholder="Flock Name" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Farm Name <span class="text-danger">*</span></label>
                                            <select name="farm_id" class="form-control input-default" required>
                                                @foreach ($farmList as $item)
                                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Start Date</label>
                                            <input type="date" name="start_date" class="form-control input-default" placeholder="date" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Assumed complete date</label>
                                            <input type="date" name="end_date" class="form-control input-default" placeholder="Assumed complete date" />
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
                                <h4 class="card-title">All Flock</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">Flock</th>
                                                <th scope="col">Farm</th>
                                                <th scope="col">Start</th>
                                                <th scope="col">End</th>
                                                <th scope="col">Status</th>
                                                <th class="" scope="col">
                                                    <span class="float-right">Action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($flockList as $item)
                                            <tr>
                                                <td>{{$item['name']}}</td>
                                                <td>{{$item->farm->name}}</td>

                                                <td>{{ \Carbon\Carbon::parse($item['start_date'])->format('d/m/Y')}}</td>
                                                <td>{{ \Carbon\Carbon::parse($item['end_date'])->format('d/m/Y')}}</td>
                                                <td>
                                                    @if($item['status']==1)
                                                    <span class="label gradient-1 btn-rounded">Active</span>
                                                    @else
                                                    <span class="label gradient-2 btn-rounded">Completed</span>
                                                    @endif

                                                </td>
                                                <td>
                                                    <div class="dropdown custom-dropdown float-right cursor">
                                                        <div data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v display-7"></i>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item text-primary" href="singleSale.html">View</a>
                                                            <a class="dropdown-item text-warning" href="#">Edit</a>
                                                            <a class="dropdown-item text-warning" href="#">Complete</a>
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
