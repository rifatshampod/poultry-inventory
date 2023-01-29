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
                <div>
                    <ul class="nav nav-pills mb-3">
                        <li class="nav-item">
                            <a href="#farm-1" class="nav-link rounded active" data-toggle="tab" aria-expanded="false">Farm 1</a>
                        </li>
                        <li class="nav-item">
                            <a href="#farm-2" class="nav-link rounded" data-toggle="tab" aria-expanded="false">Farm 2</a>
                        </li>
                        <li class="nav-item">
                            <a href="#farm-3" class="nav-link rounded" data-toggle="tab" aria-expanded="true">Farm 3</a>
                        </li>
                        <li class="nav-item">
                            <a href="#farm-4" class="nav-link rounded" data-toggle="tab" aria-expanded="true">Farm 4</a>
                        </li>
                    </ul>
                </div>
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
                                                <th scope="col">Mortality</th>
                                                <th scope="col">Rejection</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($dailyList1 as $item)
                                            <tr>
                                                <th>{{$item['date']}}</th>
                                                <td>{{$item->chicken->house->name}}</td>
                                                <td>{{$item['feed_consumption']}}</td>
                                                <td>{{$item['fcr']}}</td>
                                                <td>{{$item['weight1']}}</td>
                                                <td>{{$item['weight2']}}</td>
                                                <td>{{$item['weight3']}}</td>
                                                <td>{{$item['weight4']}}</td>
                                                <td>{{$item['mortality']}}</td>
                                                <td>{{$item['rejection']}}</td>
                                                <td>
                                                    <span class="float-right"><a id="{{$item['id']}}" onclick="openModal(this.id)" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5 px-1"></i></a></span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="farm-2" class="tab-pane">
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
                                                <th scope="col">Mortality</th>
                                                <th scope="col">Rejection</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($dailyList2->isEmpty())
                                            No data found
                                            @else
                                            @foreach ($dailyList2 as $item)
                                            <tr>
                                                <th>{{$item['date']}}</th>
                                                <td>{{$item->chicken->house->name}}</td>
                                                <td>{{$item['feed_consumption']}}</td>
                                                <td>{{$item['fcr']}}</td>
                                                <td>{{$item['weight1']}}</td>
                                                <td>{{$item['weight2']}}</td>
                                                <td>{{$item['weight3']}}</td>
                                                <td>{{$item['weight4']}}</td>
                                                <td>{{$item['mortality']}}</td>
                                                <td>{{$item['rejection']}}</td>
                                                <td>
                                                    <span class="float-right"><a id="{{$item['id']}}" onclick="openModal(this.id)" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5 px-1"></i></a></span>
                                                </td>

                                            </tr>

                                            @endforeach
                                            @endif



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="farm-3" class="tab-pane">
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
                                                <th scope="col">Mortality</th>
                                                <th scope="col">Rejection</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($dailyList3->isEmpty())
                                            No data found
                                            @else

                                            @foreach ($dailyList3 as $item)
                                            <tr>
                                                <th>{{$item['date']}}</th>
                                                <td>{{$item->chicken->house->name}}</td>
                                                <td>{{$item['feed_consumption']}}</td>
                                                <td>{{$item['fcr']}}</td>
                                                <td>{{$item['weight1']}}</td>
                                                <td>{{$item['weight2']}}</td>
                                                <td>{{$item['weight3']}}</td>
                                                <td>{{$item['weight4']}}</td>
                                                <td>{{$item['mortality']}}</td>
                                                <td>{{$item['rejection']}}</td>
                                                <td>
                                                    <span class="float-right"><a id="{{$item['id']}}" onclick="openModal(this.id)" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5 px-1"></i></a></span>
                                                </td>

                                            </tr>

                                            @endforeach
                                            @endif



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="farm-4" class="tab-pane">
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
                                                <th scope="col">Mortality</th>
                                                <th scope="col">Rejection</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($dailyList4->isEmpty())
                                            No data found
                                            @else
                                            @foreach ($dailyList4 as $item)
                                            <tr>
                                                <th>{{$item['date']}}</th>
                                                <td>{{$item->chicken->house->name}}</td>
                                                <td>{{$item['feed_consumption']}}</td>
                                                <td>{{$item['fcr']}}</td>
                                                <td>{{$item['weight1']}}</td>
                                                <td>{{$item['weight2']}}</td>
                                                <td>{{$item['weight3']}}</td>
                                                <td>{{$item['weight4']}}</td>
                                                <td>{{$item['mortality']}}</td>
                                                <td>{{$item['rejection']}}</td>
                                                <td>
                                                    <span class="float-right"><a id="{{$item['id']}}" onclick="openModal(this.id)" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5 px-1"></i></a></span>
                                                </td>

                                            </tr>
                                            @endforeach
                                            @endif
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
                                    <input type="date" id="editDate" name="date" class="form-control input-default" placeholder="Today's Date" />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> Mortality</label>
                                    <input type="number" id="editMortality" name="mortality" class="form-control input-default" placeholder="Mortality" />

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> Rejection</label>
                                    <input type="number" id="editRejection" name="rejection" class="form-control input-default" placeholder="Rejection" />

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> Weight 1 (for 12 chicken in KG)</label>
                                    <input type="number" id="editWeight1" name="weight1" class="form-control input-default" placeholder="Weight 1" />

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> Weight 2 (for 12 chicken in KG)</label>

                                    <input type="number" id="editWeight2" name="weight2" class="form-control input-default" placeholder="Weight 2" />

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> Weight 3 (for 12 chicken in KG)</label>

                                    <input type="number" id="editWeight3" name="weight3" class="form-control input-default" placeholder="Weight 3" />

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> Weight 4 (for 12 chicken in KG)</label>

                                    <input type="number" id="editWeight4" name="weight4" class="form-control input-default" placeholder="Weight 4" />

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> Feed Consumption (Total in KG)</label>
                                    <input type="number" id="editConsumption" name="feed_consumption" class="form-control input-default" placeholder="Feed Consumption" />

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
    {{-- <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script> --}}
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
