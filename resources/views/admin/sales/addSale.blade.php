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

            <div class="container-fluid mt-3">
                <div class="d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">

                                <div class="text-center mb-5">
                                    <h3>Sell Chicken</h3>
                                    <hr>
                                </div>
                                <form action="add-expense-data" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Farm Name</label>
                                            <select class="form-control input-default" name="farm_id">
                                                <option value="" selected disabled hidden>Select Farm</option>
                                                @foreach ($farmList as $item)
                                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>House Name</label>
                                            <select class="form-control input-default" name="house_id">
                                                <option value="" selected disabled hidden>Select House</option>
                                                @foreach ($houseList as $item)
                                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Date</label>
                                            <input type="date" class="form-control input-default" name="date" placeholder="Input Start Date" />
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Number of Birds</label>
                                            <input type="number" class="form-control input-default" name="amount" placeholder="Input amount" />
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Total Weight </label>
                                            <input type="text" class="form-control input-default" name="reference" placeholder="Type Reference" />
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Total Price </label>
                                            <input type="text" class="form-control input-default" name="reference" placeholder="Type Reference" />
                                        </div>


                                        <div class="form-group col-md-12">
                                            <hr>
                                            <h4 class="pt-2">Customer Information</h4>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Customer Name </label>
                                            <input type="text" class="form-control input-default" name="reference" placeholder="Type Reference" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Car No. </label>
                                            <input type="text" class="form-control input-default" name="reference" placeholder="Type Reference" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Catching Slip No. </label>
                                            <input type="text" class="form-control input-default" name="reference" placeholder="Type Reference" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Payment Method </label>
                                            <input type="text" class="form-control input-default" name="reference" placeholder="Type Reference" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Branch </label>
                                            <input type="text" class="form-control input-default" name="reference" placeholder="Type Reference" />
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
