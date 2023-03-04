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

                                                <td>{{ \Carbon\Carbon::parse($item['start_date'])->format('m/d/Y')}}</td>
                                                <td>{{ \Carbon\Carbon::parse($item['end_date'])->format('m/d/Y')}}</td>
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
                                                            {{-- <a class="dropdown-item text-primary" href="singleSale.html">View</a> --}}
                                                            <a class="dropdown-item text-warning" id="{{$item['id']}}" onclick="openModal(this.id)">Edit</a>
                                                            @if($item['status']==1)
                                                            <a class="dropdown-item text-danger" id="{{$item['id']}}" onclick="openModalComplete(this.id)">Complete Flock</a>

                                                            @endif



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

    <!-------edit-Modal------>
    <div class="modal fade bs-example-modal-center" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " style="min-width:60%;">
            <div class="modal-content">
                <div class="modal-body p-5">
                    <form action="edit-flock-info" method="POST">
                        @csrf
                        <div class="row">

                            <input type="hidden" name="flock_id" id="edit_flock_id">

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Flock Name</label>
                                    <input id="edit_flock_name" type="text" name="name" class="form-control" />

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Farm Name <span class="text-danger">*</span></label>
                                    <select id="edit_farm_id" class="form-control" disabled>
                                        @foreach ($farmList as $item)
                                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="" for="groosSalary">Start Date</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        <input id="edit_start_date" type="date" name="start_date" class="form-control" placeholder="Contact number" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="" for="groosSalary">End Date</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>

                                        <input id="edit_end_date" type="date" name="end_date" class="form-control" placeholder="Contact number" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Status <span class="text-danger">*</span></label>
                                    <select name="status" id="edit_status" class="form-control">
                                        <option value="0">Completed</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-12">
                            <div class="d-flex justify-content-center">
                                <div>
                                    <button type="submit" class="btn btn-primary px-5 mx-1">
                                        Update Farm Information
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

    <!-------complete-Modal------>
    <div class="modal fade bs-example-modal-center" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " style="min-width:60%;">
            <div class="modal-content">
                <div class="modal-body p-5">
                    <form action="edit-flock-info" method="POST">
                        @csrf
                        <div class="row">

                            <input type="hidden" name="flock_id" id="complete_flock_id">

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Flock Name</label>
                                    <input id="complete_flock_name" type="text" name="name" class="form-control" readonly />

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Farm Name <span class="text-danger">*</span></label>
                                    <select id="complete_farm_id" class="form-control" disabled>
                                        @foreach ($farmList as $item)
                                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="" for="groosSalary">Start Date</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        <input id="complete_start_date" type="date" name="start_date" class="form-control" placeholder="Contact number" readonly />

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="" for="groosSalary">End Date</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>

                                        <input id="complete_end_date" type="date" name="end_date" class="form-control" placeholder="Contact number" readonly />

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Status <span class="text-danger">*</span></label>
                                    <select name="status" id="complete_status" class="form-control">

                                        <option value="0">Completed</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-12">
                            <div class="d-flex justify-content-center">
                                <div>
                                    <button type="submit" class="btn btn-primary px-5 mx-1">
                                        Update Farm Information
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
    <!---- End of complete modal ---->



    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <!-- Edit Modal functions -->
    <script>
        function openModal(clicked_id) {
            $("#largeModal").modal("show");
            //document.getElementById("getId").value = clicked_id;
            $.ajax({
                url: '/edit-flock' + clicked_id
                , type: "GET"
                , success: function(response) {
                    console.log(response);
                    $('#edit_flock_name').val(response.data.name);
                    $('#edit_farm_id').val(response.data.farm_id);
                    $('#edit_start_date').val(response.data.start_date);
                    $('#edit_end_date').val(response.data.end_date);
                    $('#edit_status').val(response.data.status);
                    $('#edit_flock_id').val(clicked_id);
                }
            });
        }

        function openModalComplete(clicked_id) {
            $("#completeModal").modal("show");
            //document.getElementById("getId").value = clicked_id;
            $.ajax({
                url: '/edit-flock' + clicked_id
                , type: "GET"
                , success: function(response) {
                    console.log(response);
                    $('#complete_flock_name').val(response.data.name);
                    $('#complete_farm_id').val(response.data.farm_id);
                    $('#complete_start_date').val(response.data.start_date);
                    $('#complete_end_date').val(response.data.end_date);
                    $('#complete_status').val(response.data.status);
                    $('#complete_flock_id').val(clicked_id);

                }
            });
        }

    </script>

</body>
</html>
