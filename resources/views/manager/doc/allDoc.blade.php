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
                            <a href="javascript:void(0)">All Chicken</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid mt-3">

                <div class="tab-content br-n pn">
                    <div id="farm-1" class="tab-pane active">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="card-title">All DOC ( Farm: <span class="text-primary">{{$farm->name}}</span>)</h4>
                                    </div>
                                    <div>
                                        <button type="button" class="btn mb-1 btn-primary" data-toggle="modal" data-target="#addDoc">
                                            Add Doc
                                            <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th scope="col">Flock</th>
                                                <th scope="col">House</th>
                                                <th scope="col">Start Date</th>
                                                <th scope="col">Total DOC</th>
                                                <th scope="col">Hatchery</th>
                                                <th scope="col">Bird/Case</th>
                                                <th scope="col">Vaccination</th>
                                                <th scope="col">Density</th>
                                                <th scope="col">Catching Start</th>
                                                <th scope="col">Catching End</th>
                                                <th class="" scope="col">
                                                    <span class="float-right">Action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($docList as $item)
                                            <tr>
                                                <td>{{$item->flock->name}}</td>
                                                <td>{{$item->house->name}}</td>
                                                <td>{{$item['date']}}</td>
                                                <td>{{$item['sum_of_doc']}}</td>
                                                <td>{{$item['hatchery']}}</td>
                                                <td>{{$item['bird_in_case']}}</td>
                                                <td>{{$item['vaccine']}}</td>
                                                <td>{{$item['density']}}</td>
                                                <td>{{$item['catching_start']}}</td>
                                                <td>{{$item['catching_end']}}</td>
                                                <td>
                                                    <div class="dropdown custom-dropdown float-right cursor">
                                                        <div data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v display-7 display-7"></i>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item text-primary" href="#" data-toggle="modal" data-target="#addData">Add Data</a>
                                                            <a class="dropdown-item text-warning" href="#">Sale</a>
                                                            <a class="dropdown-item text-danger" href="#">View</a>
                                                            <a class="dropdown-item text-success" href="#">Edit</a>
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

        <!--------------------Modal Start----------------------->
        <!------------------Add Doc Modal Start----------------->
        <div class="modal fade" id="addDoc">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="mb-4">
                            <h5 class="modal-title">Add Doc</h5>
                        </div>
                        <form action="add-doc" method="POST">
                            @csrf

                            <input type="hidden" name="flock_id" value="{{$flock->id}}">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label> Date</label>
                                        <input type="date" class="form-control input-default" name="date" placeholder="Input Start Date" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Farm:</label>
                                        <select class="form-control input-default" name="farm_id">
                                            <option value="{{$farm->id}}" selected>{{$farm->name}}</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>House</label>
                                        <select class="form-control input-default" name="house_id">
                                            @foreach ($house as $item)
                                            <option value="{{$item['id']}}">{{$item['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label> Sum of Doc</label>
                                        <input type="number" class="form-control input-default" name="sum_of_doc" placeholder="Total Doc" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label> Hatchery</label>
                                        <input type="text" class="form-control input-default" name="hatchery" placeholder="Hatchery Name" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label> Bird In Case</label>
                                        <input type="number" class="form-control input-default" name="bird_in_case" placeholder="Bird" />
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <div>
                                        <label>Vaccination From Hacthery</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="vaccine[]" value="ND + IB(Live)" />ND + IB(Live)</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="vaccine[]" value="NDS Yellow" />NDS Yellow</label>


                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="vaccine[]" value="Transmune IBD" />Transmune IBD</label>

                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="vaccine[]" value="Vectormune ND" />Vectormune ND</label>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label> Density</label>
                                        <input type="number" class="form-control input-default" name="density" placeholder="Density" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label> Catching Start Date</label>
                                        <input type="date" class="form-control input-default" name="catching_start" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label> Catching End date</label>
                                        <input type="date" class="form-control input-default" name="catching_end" placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">Add doc</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-------------------Add Doc Modal End ------------------>


        <!---------------------Modal End------------------------>
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
