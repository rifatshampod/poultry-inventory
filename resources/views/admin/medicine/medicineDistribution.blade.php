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
                            <a href="javascript:void(0)">All Feed</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            {{-- <div>
                                <h4 class="card-title">Total in Stock : 50</h4>
                            </div> --}}
                            <div class="d-flex">
                                <div class=" mr-2 ">
                                    <button type="button" class="btn mb-1 btn-primary" onclick="location.href='all-medicine'">
                                        Add New Medicine Type
                                        <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                                    </button>
                                </div>
                                <div>
                                    <button type="button" class="btn mb-1 btn-primary" onclick="location.href='all-house-medicine=1'">
                                        Distribute Medicine
                                        <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Farm</th>
                                        <th scope="col">Medicine</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Price</th>
                                        <th class="" scope="col">
                                            <span class="float-right">Action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medicineList as $item)
                                    <tr>
                                        <td>{{\Carbon\Carbon::parse($item['date'])->format('m/d/Y')}}</td>
                                        <td>{{$item->farm->name}}</td>
                                        <td>{{$item->medicine->name}}</td>
                                        <td>{{$item['amount']}}</td>
                                        <td>{{$item['price']}}</td>

                                        <td>
                                            <span class="float-right">
                                                <a id="{{$item['id']}}" onclick="openModal(this.id)" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5 px-1"></i></a>
                                                {{-- <a href="#" data-toggle="tooltip" data-placement="top" title="End"><i class="fa fa-trash color-muted m-r-5"></i>
                                                        </a> --}}
                                            </span>

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
                    <form action="edit-medicine-distribution-info" method="POST">
                        @csrf

                        <input type="hidden" class="form-control input-default" id="edit_distribution_id" name="distribution_id" />

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Farm Name</label>
                                <select class="form-control input-default" name="farm_id" id="edit_farm_id" required>
                                    <option value="" selected disabled hidden>Select Farm</option>
                                    @foreach ($farmList as $item)
                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>House Name</label>
                                <select class="form-control input-default" name="medicine_id" id="edit_medicine_id" required>
                                    <option value="" selected disabled hidden>Select Medicine</option>
                                    @foreach ($medicineTypeList as $item)
                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Date</label>
                                <input type="date" class="form-control input-default" id="edit_date" name="date" placeholder="Input Start Date" />
                            </div>

                            <div class="form-group col-md-6">
                                <label>Amount</label>
                                <input type="number" class="form-control input-default" name="amount" id="edit_amount" placeholder="Input amount" />
                                <input type="hidden" class="form-control input-default" name="previous_amount" id="edit_previous_amount" placeholder="Input amount" />

                            </div>

                            <div class="form-group col-md-6">
                                <label>Price </label>
                                <input type="number" class="form-control input-default" name="price" id="edit_price" placeholder="Type Reference" />
                            </div>

                            <div class="col-md-12 mt-4 text-center">
                                <div>
                                    <button type="submit" class="btn mb-1 btn-primary w-50">
                                        Submit
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
            //document.getElementById("getId").value = clicked_id;
            $.ajax({
                url: '/edit-medicinedistribution' + clicked_id
                , type: "GET"
                , success: function(response) {
                    console.log(response);
                    $('#edit_farm_id').val(response.data.farm_id);
                    $('#edit_medicine_id').val(response.data.medicine_id);
                    $('#edit_date').val(response.data.date);
                    $('#edit_amount').val(response.data.amount);
                    $('#edit_previous_amount').val(response.data.amount);
                    $('#edit_price').val(response.data.price);
                    $('#edit_distribution_id').val(clicked_id);
                }
            });
        }

    </script>



</body>
</html>
