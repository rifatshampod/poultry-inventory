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
                            <a href="javascript:void(0)">Rejection Report</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="text-center">
                <h3>Rejection Report</h3>
            </div>

            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-4 text-center">
                                    <h3>Search By Flock</h3>
                                    <span>Get report of complete flock. Only complete flock are available here</span>
                                </div>
                                <form action="flock-rejection-report" method="POST">
                                    @csrf

                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Flock</label>
                                                <select name="flock_id" class="form-control input-default" required>
                                                    @foreach ($flockList as $item)
                                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Farm Name</label>
                                                <select name="farm_id" class="form-control input-default" required>
                                                    @foreach ($farmList as $item)
                                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                <button type="submit" class="btn mb-1 btn-primary w-100">
                                                    Generate Report
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-4 text-center">
                                    <h3>Search By Farm</h3>
                                    <span>Get report of any farm for ongoing data. Only current flock are
                                        available</span>
                                </div>
                                <form action="farm-rejection-report" method="POST">

                                    @csrf

                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Farm Name</label>
                                                <select name="farm_id" class="form-control input-default">
                                                    @foreach ($farmList as $item)
                                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                <button type="submit" class="btn mb-1 btn-primary w-100">
                                                    Generate Report
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-4 text-center">
                                    <h3>Search By House</h3>
                                    <span>Get report of a specific house of current flock. Only <b>current flock</b> datas are available here</span>
                                </div>
                                <form action="house-rejection-report" method="POST">
                                    @csrf

                                    <div class="row justify-content-center">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Farm Name</label>
                                                <select class="form-control input-default" name="farm_id" id="farm-dropdown" required>
                                                    <option value="" selected disabled hidden>Select Farm</option>
                                                    @foreach ($farmList as $item)
                                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>House Name</label>
                                                <select class="form-control input-default" name="house_id" id="house-dropdown" required>
                                                    <option value="" selected disabled hidden>Select House</option>
                                                    @foreach ($houseList as $item)
                                                    <option value="{{$item['id']}}">{{$item['name']}} ({{$item->farm->name}})</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div>
                                                <button type="submit" class="btn mb-1 btn-primary w-100">
                                                    Generate Report
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-4 text-center">
                                    <h3>Search By Date</h3>
                                    <span>Get report of data of a specific duration. Current and previous all data are
                                        available here</span>
                                </div>
                                <form action="date-rejection-report" method="POST">

                                    @csrf

                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Start Date</label>
                                                <input name="start_date" type="date" class="form-control input-default" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>End Date</label>
                                                <input name="end_date" type="date" class="form-control input-default" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Farm Name</label>
                                                <select name="farm_id" class="form-control input-default">
                                                    @foreach ($farmList as $item)
                                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                <button type="submit" class="btn mb-1 btn-primary w-100">
                                                    Generate Report
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
    <script>
        $(document).ready(function() {

            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#farm-dropdown').on('change', function() {
                var idCountry = this.value;
                $("#house-dropdown").html('');
                $.ajax({
                    url: "{{url('fetch-houses')}}"
                    , type: "POST"
                    , data: {
                        farm_id: idCountry
                        , _token: '{{csrf_token()}}'
                    }
                    , dataType: 'json'
                    , success: function(result) {
                        $('#house-dropdown').html('<option value="">-- Select House --</option>');
                        $.each(result.houses, function(key, value) {
                            $("#house-dropdown").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        $('#flock-dropdown').html('<option value="">-- Select Flock --</option>');
                        $.each(result.flocks, function(key, value) {
                            $("#flock-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        //console.log(result);
                    }
                });
            });

        });

    </script>


</body>
</html>
