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
                            <a href="javascript:void(0)">Daily Chicken</a>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid mt-3">

                <div class="tab-content br-n pn">
                    <div id="farm-1" class="tab-pane active">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Show all daily input</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="col-2">Date</th>
                                                <th scope="col" class="col-2">House</th>
                                                <th scope="col">F.C.</th>
                                                <th scope="col">F.C.R</th>
                                                <th scope="col">Weight 1</th>
                                                <th scope="col">Weight 2</th>
                                                <th scope="col">Weight 3</th>
                                                <th scope="col">Weight 4</th>
                                                <th scope="col">Avg Weight</th>
                                                <th scope="col">Mortality</th>
                                                <th scope="col">Rejection</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($dailyList as $item)
                                            <tr>
                                                <th>{{\Carbon\Carbon::parse($item['date'])->format('m/d/Y')}}</th>
                                                <td>{{$item->chicken->house->name}}</td>
                                                <td>{{$item['feed_consumption']}}</td>
                                                <td>{{$item['fcr']}}</td>
                                                <td>{{$item['weight1']}}</td>
                                                <td>{{$item['weight2']}}</td>
                                                <td>{{$item['weight3']}}</td>
                                                <td>{{$item['weight4']}}</td>
                                                <td>{{$item['weight_avg']}}</td>
                                                <td>{{$item['mortality']}}</td>
                                                <td>{{$item['rejection']}}</td>
                                                <td>
                                                    @if($loop->iteration==1)
                                                    <span class="float-right"><a id="{{$item['id']}}" onclick="openModal(this.id)" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5 px-1"></i></a></span>
                                                    @endif
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
                    <form action="edit-daily-info" method="POST">

                        @csrf
                        <div class="row">
                            <input type="hidden" class="form-control input-default" id="edit_daily_id" name="daily_id" />
                            <input type="hidden" class="form-control input-default" id="editChickenId" name="chicken_id" />

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> Date</label>
                                    <input type="date" id="editDate" name="date" class="form-control input-default" placeholder="Today's Date" required />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> Mortality</label>
                                    <input type="number" id="editMortality" name="mortality" class="form-control input-default" placeholder="Mortality" required />

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> Rejection</label>
                                    <input type="number" id="editRejection" name="rejection" class="form-control input-default" placeholder="Rejection" required />

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> Weight 1 (for 12 chicken in gram)</label>
                                    <input type="number" id="editWeight1" name="weight1" class="form-control input-default" placeholder="Weight 1" required />


                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> Weight 2 (for 12 chicken in gram)</label>

                                    <input type="number" id="editWeight2" name="weight2" class="form-control input-default" placeholder="Weight 2" required />


                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> Weight 3 (for 12 chicken in gram)</label>

                                    <input type="number" id="editWeight3" name="weight3" class="form-control input-default" placeholder="Weight 3" required />


                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> Weight 4 (for 12 chicken in gram)</label>

                                    <input type="number" id="editWeight4" name="weight4" class="form-control input-default" placeholder="Weight 4" required />


                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> Feed Consumption (Total in KG)</label>
                                    <input type="number" id="editConsumption" name="feed_consumption" step='0.001' class="form-control input-default" placeholder="Feed Consumption" required />


                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="d-flex justify-content-center">
                                <div>
                                    <button type="submit" class="btn btn-primary px-5 mx-1">
                                        Update daily Information
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
    <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
    <!-- Edit Modal functions -->
    <script>
        function openModal(clicked_id) {
            $("#largeModal").modal("show");
            console.log(clicked_id);
            //document.getElementById("getId").value = clicked_id;
            $.ajax({
                url: '/edit-dailyChicken' + clicked_id
                , type: "GET"
                , success: function(response) {
                    console.log(response);
                    $('#editDate').val(response.daily.date);
                    $('#editMortality').val(response.daily.mortality);
                    $('#editRejection').val(response.daily.rejection);
                    $('#editWeight1').val(response.daily.weight1);
                    $('#editWeight2').val(response.daily.weight2);
                    $('#editWeight3').val(response.daily.weight3);
                    $('#editWeight4').val(response.daily.weight4);
                    $('#editConsumption').val(response.daily.feed_consumption);
                    $('#editChickenId').val(response.daily.chicken_id);

                    $('#edit_daily_id').val(clicked_id);
                }
            });
        }

    </script>


</body>
</html>
