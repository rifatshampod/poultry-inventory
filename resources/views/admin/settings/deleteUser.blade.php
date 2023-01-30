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
                        <li class="breadcrumb-item">
                            <a href="user.html">User</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="javascript:void(0)">Delete User</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid mt-3">
                <div class="row justify-content-center align-items-center" style="height: 65vh">
                    <div class="col-lg-6">
                        <div class="card p-4">
                            <div class="">
                                <form action="delete-userdata" method="POST">
                                    @csrf

                                    <div class=" mb-4">
                                        <div class="text-center mb-4">
                                            <h4>User Information</h4>
                                        </div>
                                        <div>
                                            Name : {{$userData->name}}
                                        </div>
                                        <div>
                                            Email : {{$userData->email}}

                                        </div>
                                        <div>
                                            @if($userData->role==1)
                                            Role : Admin
                                            @else
                                            Role : Farm Manager
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <h5 class="modal-title text-center mb-4">
                                            Are You sure you Want To delete this user? <br>
                                            If yes please
                                            write
                                            <span class="text-danger" style="font-weight: 600">confirm</span>
                                            to this input field which is given below !
                                        </h5>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                <input type="hidden" name="user_id" value="{{$userData->id}}">
                                                <div class="form-group">
                                                    <input type="text" class="form-control input-default" placeholder="Enter confirm to delete" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-danger mr-2" onclick="location.href='users'">
                                            Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            Delete
                                        </button>
                                    </div>
                                </form>

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
