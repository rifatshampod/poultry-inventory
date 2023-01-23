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
                            <a href="javascript:void(0)">Profile</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid mt-3">
                <div class="row">


                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                <div class="mb-4">
                                    @if (Session::get('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{Session::get('status')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif



                                    <h3>Personal Information</h3>
                                </div>
                                <div>
                                    <p>Name: {{Auth::user()->name}}</p>
                                    <p>Email: {{Auth::user()->email}}</p>
                                    <p>Contact: {{Auth::user()->phone}}</p>
                                    @if(Auth::user()->role==1)
                                    <p>Role: Admin</p>
                                    @else
                                    <p>Role: Farm Manager ({{Auth::user()->farm->name}})</p>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-4">
                                    <h3>Edit Information</h3>
                                </div>
                                <form action="update-profile" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control input-default" placeholder="Name" value="{{Auth::user()->name}}" />

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Contact Number</label>
                                            <input type="number" name="phone" class="form-control input-default" placeholder="Contact" value="{{Auth::user()->phone}}" />

                                        </div>
                                        <div class="col-md-12">
                                            <div>
                                                <button type="submit" class="btn mb-1 btn-primary w-100">
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="my-4">
                                    <h3>Edit Password</h3>
                                </div>
                                @if (Session::get('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{Session::get('error')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif

                                <form action="update-profile-password" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Current Password</label>
                                            <input type="password" name="oldPassword" class="form-control input-default" placeholder="Current Password" required />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>New Password</label>
                                            <input type="password" name="newPassword" class="form-control input-default" placeholder="New Password" required />
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
