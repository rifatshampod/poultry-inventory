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
                            <a href="javascript:void(0)">User</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-4">
                                    <h3>Add User</h3>
                                </div>
                                <form action="add-user" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control input-default" placeholder="Name" required />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control input-default" placeholder="Email" required />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control input-default" placeholder="Password" required />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Phone</label>
                                            <input type="number" name="phone" class="form-control input-default" placeholder="Number" />
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Role</label>
                                                <select class="form-control input-default" name="role" onchange="showDiv(this)" required>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Farm Manager</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12" id="farmList">
                                            <div class="form-group">
                                                <label>Farm</label>
                                                <select class="form-control input-default" name="farm_id">
                                                    @foreach ($farmList as $item)
                                                    <option value={{$item['id']}}>{{$item['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
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
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All User</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Role</th>
                                                <th class="" scope="col">
                                                    <span class="float-right">Action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($userList as $item)
                                            <tr>
                                                <td>{{$item['name']}}</td>
                                                <td>{{$item['email']}}</td>

                                                <td>{{$item['phone']}}</td>

                                                @if($item['role']==1)

                                                <td>Admin</td>
                                                @else
                                                <td>Farm Manager</td>
                                                @endif
                                                <td>
                                                    <div class="dropdown custom-dropdown float-right cursor">
                                                        <div data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item text-primary" id="{{$item['id']}}" onclick="openEditModal(this.id)">Edit</a>

                                                            <button class="dropdown-item text-warning" id="{{$item['id']}}" onclick="openPasswordModal(this.id)">Change Password</button>




                                                            <a class="dropdown-item text-danger" id="{{$item['id']}}" onclick="openDeleteModal(this.id)">Delete</a>

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

        <x-footer />
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <!-------edit-Modal------>
    <div class="modal fade bs-example-modal-center" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " style="min-width:60%;">
            <div class="modal-content">
                <div class="modal-body p-5">
                    <form action="edit-user-info" method="POST">
                        @csrf
                        <div class="row">

                            <input type="hidden" name="user_id" id="userEditId">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input id="name" type="text" name="name" class="form-control input-default" placeholder="Name" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input id="email" type="email" name="email" class="form-control input-default" placeholder="Email" required />
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Phone</label>
                                    <input id="phone" type="number" name="phone" class="form-control input-default" placeholder="Number" />
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select id="role" class="form-control input-default" name="role" onchange="showDiv2(this)" required>
                                            <option value="1">Admin</option>
                                            <option value="2">Farm Manager</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" id="farmList2">
                                    <div class="form-group">
                                        <label>Farm</label>
                                        <select id="farm" class="form-control input-default" name="farm_id">
                                            <option value="0">All Farms</option>
                                            @foreach ($farmList as $item)
                                            <option value={{$item['id']}}>{{$item['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </div>

                            <div class="col-lg-12">
                                <div class="d-flex justify-content-center">
                                    <div>
                                        <button type="submit" class="btn btn-primary px-5 mx-1">
                                            Update User Information
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

    <!-------Delete-Modal------>
    <div class="modal fade bs-example-modal-center" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">


        <div class="modal-dialog modal-dialog-centered " style="min-width:60%;">
            <div class="modal-content">
                <div class="modal-body p-5">
                    <form action="delete-user-info" method="POST">
                        @csrf
                        <div class="row">

                            <input type="hidden" name="user_id" id="userDeleteId">

                            <div class="row">
                                Are you sure you want to delete?
                            </div>

                            <div class="col-lg-12">
                                <div class="d-flex justify-content-center">
                                    <div>
                                        <button type="cancel" class="btn btn-danger px-5 mx-1">
                                            No, Cancel
                                        </button>
                                        <button type="submit" class="btn btn-danger px-5 mx-1">
                                            Yes, Delete
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
    <!---- End of delete modal ---->

    <!-------password change -Modal------>
    <div class="modal fade bs-example-modal-center" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">


        <div class="modal-dialog modal-dialog-centered " style="min-width:60%;">
            <div class="modal-content">
                <div class="modal-body p-5">
                    <form action="edit-password-info" method="POST">
                        @csrf
                        <div class="row">

                            <input type="hidden" name="user_id" id="userPasswordId">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input id="name" type="text" name="name" class="form-control input-default" placeholder="Name" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input id="email" type="email" name="email" class="form-control input-default" placeholder="Email" required />
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="d-flex justify-content-center">
                                    <div>
                                        <button type="submit" class="btn btn-primary px-5 mx-1">
                                            Update Password
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
    <!---- End of password change modal ---->




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

    <script>
        function showDiv(select) {
            if (select.value == 1) {
                document.getElementById("farmList").style.display = "none";
            } else {
                document.getElementById("farmList").style.display = "block";
            }
        }

        // function showDiv2(select) {
        //     if (select.value == 1) {
        //         document.getElementById("farmList2").style.display = "none";
        //     } else {
        //         document.getElementById("farmList2").style.display = "block";
        //     }
        // }

    </script>
    <script>
        function openEditModal(clicked_id) {

            $("#largeModal").modal("show");
            //document.getElementById("getId").value = clicked_id;
            $.ajax({
                url: '/edit-user' + clicked_id
                , type: "GET"
                , success: function(response) {
                    console.log(response);
                    $('#name').val(response.user.name);
                    $('#email').val(response.user.email);
                    $('#phone').val(response.user.phone);
                    $('#role').val(response.user.role);
                    $('#farm').val(response.user.farm_id);
                    $('#userEditId').val(clicked_id);
                }
            });
        }

        function openPasswordModal(clicked_id2) {

            console.log(clicked_id2);
            $("#passwordModal").modal("show");
            //document.getElementById("getId").value = clicked_id;


            // $.ajax({
            //     url: '/edit-user' + clicked_id2
            //     , type: "GET"
            //     , success: function(response) {
            //         console.log(response);
            //         $('#name').val(response.user.name);
            //         $('#email').val(response.user.email);
            //         $('#phone').val(response.user.phone);
            //         $('#role').val(response.user.role);
            //         $('#farm').val(response.user.farm_id);
            //         $('#userEditId').val(clicked_id2);
            //     }
            // });
        }

        function openDeleteModal(clicked_id) {


            $("#deleteModal").modal("show");
            //document.getElementById("getId").value = clicked_id;

            // $.ajax({
            //     url: '/edit-user' + clicked_id
            //     , type: "GET"
            //     , success: function(response) {
            //         console.log(response);
            //         $('#name').val(response.user.name);
            //         $('#email').val(response.user.email);
            //         $('#phone').val(response.user.phone);
            //         $('#role').val(response.user.role);
            //         $('#farm').val(response.user.farm_id);
            //         $('#userEditId').val(clicked_id);
            //     }
            // });
        }

    </script>


</body>
</html>
