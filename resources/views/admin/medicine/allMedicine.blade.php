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
                            <a href="javascript:void(0)">All Medicine</a>
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
                                    <h3>Add New Medicine</h3>
                                </div>
                                <form action="add-medicine" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Medicine Name</label>
                                            <input type="text" name="name" class="form-control input-default" placeholder="Type Name" />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Usages</label>
                                            <input type="text" name="usages" class="form-control input-default" placeholder="Reason or usages of medicine" />
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
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Medicine</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th scope="col">Type</th>
                                                <th scope="col">Usages</th>
                                                <th class="" scope="col">
                                                    <span class="float-right">Action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($medicineList as $item)
                                            <tr>
                                                <td>{{$item['name']}}</td>
                                                <td>{{$item['usages']}}</td>

                                                <td>
                                                    <div class="dropdown custom-dropdown float-right cursor">
                                                        <div data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v display-7"></i>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item text-primary" href="all-house-medicine={{$item['id']}}">View</a>
                                                            <a id="{{$item['id']}}" onclick="openModal(this.id)" class="dropdown-item text-warning">Edit</a>
                                                            <a id="{{$item['id']}}" onclick="openDeleteModal(this.id)" class="dropdown-item text-danger">Delete</a>

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
        <div class="modal-dialog modal-dialog-centered " style="min-width:40%;">
            <div class="modal-content">
                <div class="modal-body p-5">
                    <form action="update-medicine" method="POST">
                        @csrf
                        <input type="hidden" class="form-control input-default" id="edit_medicine_id" name="medicine_id" />

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Medicine Name</label>
                                <input type="text" name="name" id="edit_medicine_name" class="form-control input-default" placeholder="Type Name" />

                            </div>
                            <div class="form-group col-md-12">
                                <label>Usages</label>
                                <input type="text" name="usages" id="edit_medicine_usages" class="form-control input-default" placeholder="Reason or usages of medicine" />

                            </div>
                            <div class="col-md-12">
                                <div>
                                    <button type="submit" class="btn mb-1 btn-primary w-100">
                                        Update Medicine
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

    <!-------delete-Modal------>
    <div class="modal fade bs-example-modal-center" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " style="min-width:30%;">
            <div class="modal-content">
                <div class="modal-body p-5">
                    <form action="delete-medicine" method="POST">
                        @csrf
                        <input type="hidden" class="form-control input-default" id="delete_medicine_id" name="medicine_id" />
                        <h4 class="my-4">Are you sure you want to delete this medicine?</h4>

                        <div class="row">
                            <div class="col-md-12 tex-center">
                                <button type="submit" class="btn mb-1 btn-danger w-40">
                                    Delete Medicine
                                </button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!---- End of delete modal ---->



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
                url: '/edit-medicineType' + clicked_id
                , type: "GET"
                , success: function(response) {
                    console.log(response);
                    $('#edit_medicine_name').val(response.data.name);
                    $('#edit_medicine_usages').val(response.data.usages);
                    $('#edit_medicine_id').val(clicked_id);
                }
            });
        }

        function openDeleteModal(clicked_id) {
            $("#deleteModal").modal("show");
            document.getElementById("delete_medicine_id").value = clicked_id;
        }

    </script>


</body>
</html>
