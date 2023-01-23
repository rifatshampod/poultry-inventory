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
                                    <h3>Personal Information</h3>
                                </div>
                                <div>
                                    <p>Name: Ariful Islam</p>
                                    <p>Email: arifbipu@gmail.com</p>
                                    <p>Contact: +8801758871249</p>
                                    <p>Role: Admin (FarmHouse)</p>
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
                                <form action="">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Name</label>
                                            <input type="text" class="form-control input-default" placeholder="Name" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Contact</label>
                                            <input type="number" class="form-control input-default" placeholder="Contact" />
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
                                <div class="my-4">
                                    <h3>Edit Password</h3>
                                </div>
                                <form action="">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Current Password</label>
                                            <input type="password" class="form-control input-default" placeholder="Current Password" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>New Password</label>
                                            <input type="password" class="form-control input-default" placeholder="New Password" />
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
