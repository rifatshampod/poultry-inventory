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

                                <div class="mb-4">
                                    <h3>Add Expense</h3>
                                </div>
                                <form action="add-expense-data" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Farm Name</label>
                                            <select class="form-control input-default" name="farm_id" id="department">

                                                <option value="" selected disabled hidden>Select Farm</option>
                                                @foreach ($farmList as $item)
                                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>House Name</label>
                                            <select class="form-control input-default" name="house_id" id="user">

                                                <option value="" selected disabled hidden>Select House</option>
                                                @foreach ($houseList as $item)
                                                <option value="{{$item['id']}}">{{$item['name']}} ({{$item->farm->name}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Flock</label>
                                            <select class="form-control input-default" name="flock_id">
                                                @foreach($flockList as $flockList)
                                                <option value="{{$flockList->id}}" selected>{{$flockList->name}} ({{$flockList->farm->name}})</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Date</label>
                                            <input type="date" class="form-control input-default" name="date" placeholder="Input Start Date" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Expense Sector</label>
                                            <select class="form-control input-default" name="expense_sector_id">
                                                <option value="" selected disabled hidden>Select Expense Sector</option>
                                                @foreach ($sectorList as $item)
                                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Expense Type</label>
                                            <select class="form-control input-default" name="expense_type_id">
                                                <option value="" selected disabled hidden>Select Expense Type</option>
                                                @foreach ($typeList as $item)
                                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Amount</label>
                                            <input type="number" class="form-control input-default" name="amount" placeholder="Input amount" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Paid From</label>
                                            <select class="form-control input-default" name="paid_from">
                                                <option value="1" selected>Petty Cash</option>
                                                <option value="2">Direct Payment by Head Office</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Approver</label>
                                            <select class="form-control input-default" name="approver">
                                                <option selected>Head Office</option>
                                                <option> Farm Manager</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Reference </label>
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
    <script>
        $('#department').on('change', e => {
            $('#user').empty()
            $.ajax({
                url: `get-house=${e.value}`

                , success: data => {
                    data.users.forEach(user =>
                        $('#user').append(`<option value="${houses.id}">${houses.name}</option>`)
                    )
                }
            })
        })

    </script>

</body>
</html>
