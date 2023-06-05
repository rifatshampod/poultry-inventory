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
                            <a href="dashboard">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="javascript:void(0)">All Feed</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-4">
                                    <h3>Add Medicine to Farm / Add Use Data</h3>
                                </div>
                                <form action="add-farm-medicine" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Farm Name</label>
                                            <select class="form-control input-default" name="farm_id">
                                                @foreach ($farmList as $item)
                                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Medicine Name</label>
                                            <select class="form-control input-default" name="medicine_id">
                                                @foreach ($medicineList as $item)
                                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Date</label>
                                            <input type="date" class="form-control input-default" name="date" placeholder="Input Start Date" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Data Type</label>
                                            <select class="form-control input-default" name="data_type" required>
                                                <option value="1">Received New Medicine</option>
                                                <option value="2">Used Medicine</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Amount</label>
                                            <input type="number" class="form-control input-default" name="amount" placeholder="Input amount" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Amount Unit</label>
                                            <select class="form-control input-default" name="unit" required>
                                                <option>KG</option>
                                                <option>Pcs</option>
                                                <option>Litre</option>
                                                <option>Dose</option>

                                            </select>

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
                    <div class="col-lg-7">
                        @if (Session::get('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{Session::get('status')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if (Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{Session::get('error')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif


                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Farm wise Medicine Inventory</h4>



                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">Medicine</th>
                                                @if(auth()->user()->role==1)
                                                <th scope="col">Farm 1</th>
                                                <th scope="col">Farm 2</th>
                                                <th scope="col">Farm 3</th>
                                                <th scope="col">Farm 4</th>
                                                @else
                                                <th scope="col">Stock Left</th>
                                                @endif
                                                {{-- <th class="" scope="col">
                                                    <span class="float-right">Action</span>
                                                </th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($farmMedicine as $item)
                                            <tr>
                                                <td>{{$item->medicine->name}}</td>
                                                @if(auth()->user()->role==1)
                                                {{-- Farm 1  --}}
                                                @if($item->farm->id ==1)
                                                <td>{{$item['sum_of_amount']}}</td>
                                                @else
                                                <td>0</td>
                                                @endif
                                                {{-- Farm 2  --}}
                                                @if($item->farm->id ==2)
                                                <td>{{$item['sum_of_amount']}}</td>
                                                @else
                                                <td>0</td>
                                                @endif
                                                {{-- Farm 3  --}}
                                                @if($item->farm->id ==3)
                                                <td>{{$item['sum_of_amount']}}</td>
                                                @else
                                                <td>0</td>
                                                @endif
                                                {{-- Farm 4  --}}
                                                @if($item->farm->id ==4)
                                                <td>{{$item['sum_of_amount']}}</td>
                                                @else
                                                <td>0</td>
                                                @endif
                                                @else
                                                <td>{{$item['sum_of_amount']}}</td>
                                                @endif

                                                {{-- <td>
                                                    <span class="float-right"><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i>
                                                        </a>
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title="End"><i class="fa fa-trash color-muted m-r-5"></i>
                                                        </a>
                                                    </span>
                                                </td> --}}
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

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>
</html>
