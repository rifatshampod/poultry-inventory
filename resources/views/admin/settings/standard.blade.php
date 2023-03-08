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
                            <a href="javascript:void(0)">Standard Values</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid mt-3">
                <div class="row">
                    {{-- <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-4">
                                    <h3>Add Standard Value</h3>
                                </div>
                                <form action="add-standard" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>weight (gram)</label>
                                            <input type="number" name="weight" class="form-control input-default" placeholder="weight" required />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Daily gain (gram)</label>
                                            <input type="number" name="daily_gain" class="form-control input-default" placeholder="Daily gain" required />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>fcr</label>
                                            <input type="number" name="fcr" step="0.001" class="form-control input-default" placeholder="fcr value" required />

                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Daily Feed Consumption (gram)</label>
                                            <input type="number" name="dfc" class="form-control input-default" placeholder="daily consumption" />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Cumulative Feed Consumption (gram)</label>
                                            <input type="number" name="cfc" class="form-control input-default" placeholder="cumulative consumption" />
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
                    </div> --}}
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center mb-2">Standard Value According to Age</h4>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-bordered zero-configuration text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col">Age (day)</th>
                                                <th scope="col" class="col-2">Weight</th>
                                                <th scope="col" class="col-2">Daily Gain</th>
                                                <th scope="col" class="col-2">FCR</th>
                                                <th scope="col">Daily Feed Consumption</th>
                                                <th scope="col">Cumulative Feed Consumption</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($standardList as $item)
                                            <tr>
                                                <td>{{$item['age']}}</td>
                                                <td>{{$item['weight']}}</td>
                                                <td>{{$item['daily_gain']}}</td>
                                                <td>{{$item['fcr']}}</td>
                                                <td>{{$item['dfc']}}</td>
                                                <td>{{$item['cfc']}}</td>
                                                <td>
                                                    <div class="dropdown custom-dropdown float-right cursor">
                                                        <div data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item text-primary" id="{{$item['id']}}" onclick="openEditModal(this.id)">Edit</a>
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
                    <form action="edit-standard-info" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Age (day)</label>
                                <input type="number" name="id" class="form-control input-default" id="edit_age" readonly />
                            </div>

                            <div class="form-group col-md-12">
                                <label>weight (gram)</label>
                                <input type="number" name="weight" class="form-control input-default" id="edit_weight" />
                            </div>
                            <div class="form-group col-md-12">
                                <label>Daily gain (gram)</label>
                                <input type="number" name="daily_gain" class="form-control input-default" id="edit_daily_gain" />

                            </div>
                            <div class="form-group col-md-12">
                                <label>fcr</label>
                                <input type="number" name="fcr" step="0.001" class="form-control input-default" id="edit_fcr" />

                            </div>
                            <div class="form-group col-md-12">
                                <label>Daily Feed Consumption (gram)</label>
                                <input type="number" name="dfc" class="form-control input-default" id="edit_dfc" />

                            </div>
                            <div class="form-group col-md-12">
                                <label>Cumulative Feed Consumption (gram)</label>
                                <input type="number" name="cfc" class="form-control input-default" id="edit_cfc" />

                            </div>

                            <div class="col-md-12">
                                <div>
                                    <button type="submit" class="btn mb-1 btn-primary w-100">
                                        Submit
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
    <!---- End of edit modal ---->
    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
    <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>



    <script>
        function openEditModal(clicked_id) {

            $("#largeModal").modal("show");
            //document.getElementById("getId").value = clicked_id;
            $.ajax({
                url: '/edit-standard' + clicked_id
                , type: "GET"
                , success: function(response) {
                    console.log(response);
                    $('#edit_weight').val(response.standard.weight);
                    $('#edit_daily_gain').val(response.standard.daily_gain);
                    $('#edit_fcr').val(response.standard.fcr);
                    $('#edit_dfc').val(response.standard.dfc);
                    $('#edit_cfc').val(response.standard.cfc);
                    $('#edit_age').val(clicked_id);
                }
            });
        }

    </script>
</body>
</html>
