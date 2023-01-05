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
                                                            <a class="dropdown-item text-primary" href="#">Edit</a>
                                                            <a class="dropdown-item text-warning" href="#">Change Password</a>
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

        <x-footer />
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

    <script>
        function showDiv(select) {
            if (select.value == 1) {
                document.getElementById("farmList").style.display = "none";
            } else {
                document.getElementById("farmList").style.display = "block";
            }
        }

    </script>

</body>
</html>
