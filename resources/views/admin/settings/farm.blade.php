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
                            <a href="javascript:void(0)">Farm</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-4">
                                    <h3>Add Farm</h3>
                                </div>
                                <form action="add-farm" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Farm Name</label>
                                            <input type="text" name="name" class="form-control input-default" placeholder="Farm Name" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Contact Number</label>
                                            <input type="phone" name="phone" class="form-control input-default" placeholder="Contact Number" />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Address</label>
                                            <textarea class="form-control input-default" name="address" rows="2" cols="50" placeholder="Address"></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <div>
                                                <button onclick="disableFarmCreation()" id="mySubmit" class="btn mb-1 btn-primary w-100">

                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
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
                                <h4 class="card-title">All Farm</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">Farm</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Contact Number</th>
                                                <th class="" scope="col">
                                                    <span class="float-right">Action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($farmList as $item)
                                            <tr>
                                                <td>{{$item['name']}}</td>
                                                <td>{{$item['address']}}</td>
                                                <td>{{$item['phone']}}</td>
                                                <td>
                                                    <span class="float-right">
                                                        <a id="{{$item['id']}}" onclick="openModal(this.id)" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5 px-1"></i></a>
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
        <div class="modal-dialog modal-dialog-centered " style="min-width:60%;">
            <div class="modal-content">
                <div class="modal-body p-5">
                    <form action="edit-farm-info" method="POST">
                        @csrf
                        <div class="row">

                            <input type="hidden" name="farm_id" id="farmEditId">

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Farm Name</label>
                                    <input id="farm_name" type="text" name="farm_name" class="form-control" />

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="">
                                    <label class="" for="groosSalary">Contact Number</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="icon-phone"></i></div>
                                        <input id="contact_number" type="number" name="phone" class="form-control" id="groosSalary" placeholder="Contact number" required />
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Address
                                        <i class="las la-question-circle tooltip-icon mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Remarks" rel="tooltip"></i>
                                    </label>
                                    <input id="address" class="form-control" name="address" rows="1" placeholder="Enter Address" />
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


    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>


    <script>
        function disableFarmCreation() {
            document.getElementById("mySubmit").disabled = true;
            alert('Creating new farm is disabled for inteegration purpose. Please contact the IT team to enable this feature.');
        }

    </script>
    <!-- Edit Modal functions -->
    <script>
        function openModal(clicked_id) {
            $("#largeModal").modal("show");
            //document.getElementById("getId").value = clicked_id;
            $.ajax({
                url: '/edit-farm' + clicked_id
                , type: "GET"
                , success: function(response) {
                    console.log(response);
                    $('#farm_name').val(response.farm.name);
                    $('#contact_number').val(response.farm.phone);
                    $('#address').val(response.farm.address);
                    $('#farmEditId').val(clicked_id);
                }
            });
        }

    </script>


</body>
</html>
