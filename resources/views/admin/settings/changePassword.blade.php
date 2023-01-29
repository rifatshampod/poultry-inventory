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
                            <a href="javascript:void(0)">Change Password</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid mt-3">
                <div class="row justify-content-center align-items-center" style="height: 65vh">
                    <div class="col-lg-6">


                        <div class="card p-3">
                            <div class="">

                                <div class="mb-4">
                                    <h5 class="modal-title">Change Password</h5>
                                    @if (Session::get('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{Session::get('error')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif

                                </div>
                                <form action="edit-user-password" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label> User Name</label>
                                                <input type="text" class="form-control input-default" value="{{$userData->name}}" readonly />
                                            </div>
                                        </div>
                                        <div class=" col-lg-6">
                                            <div class="form-group">
                                                <label> Email Address</label>
                                                <input type="text" class="form-control input-default" value="{{$userData->email}}" readonly />

                                            </div>
                                        </div>

                                        <input type="hidden" name="user_id" value="{{$userData->id}}" readonly>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label> New Password</label>
                                                <input id="newPass" name="password" type="password" class="form-control input-default" placeholder="New Password" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label> Confirm Password</label>
                                                <input id="confirmPass" name="password_confirmation" type="password" class="form-control input-default" placeholder="Confirm Password" onchange="validatePassword()" />

                                            </div>
                                        </div>
                                    </div>
                                    <p id="message" class="text-danger text-center"></p>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-danger mr-2" onclick="location.href='/users'">
                                            Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            Change
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

    {{-- <script>
        function validatePassword() {
            var password = document.getElementById("newPass").value;
            var confirmPassword = document.getElementById("confirmPass").value;
            if (password != confirmPassword) {
                document.getElementById("message").innerHTML =
                    "Password Didn't Match ! please make sure that new password and confirm password is matched.";
                setTimeout(() => {
                    document.getElementById("message").style.display = "none";
                }, 2000);
            }
        } <
        /scri

    </script> --}}

</body>
</html>
