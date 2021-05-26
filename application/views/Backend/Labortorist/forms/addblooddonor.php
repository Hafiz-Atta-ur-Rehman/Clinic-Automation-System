@extends(Backend/Labortorist/MainTemplate)
@section(links)

@endsection
@section(blooddonorselected)
active
@endsection
@section(content)
<div class="container-fluid">
    <h4 class="page-title">Add Blood Donor</h4>
    <div class="row">
        <div class="col-md-3">
            <div class="card card-stats card-warning">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="la la-users"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Visitors</p>
                                <h4 class="card-title">1,294</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats card-success">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="la la-bar-chart"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Sales</p>
                                <h4 class="card-title">$ 1,345</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats card-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="la la-newspaper-o"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Subscribers</p>
                                <h4 class="card-title">1303</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats card-primary">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="la la-check-circle"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Order</p>
                                <h4 class="card-title">576</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="<?= base_url('index.php/lab/blood_donor'); ?>"><button class="btn btn-primary">Back</button></a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <form role="form" class="form-horizontal form-groups" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="squareInput">Name</label>
                    <input type="text" class="form-control input-square" id="squareInput" placeholder="">
                </div>
                <div class="form-group">
                    <label for="squareInput">Email</label>
                    <input type="email" class="form-control input-square" id="squareInput" placeholder="">
                </div>
                <div class="form-group">
                    <label for="squareInput">Address</label>
                    <textarea class="form-control" name="" id="" cols="30" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="squareInput">Phone</label>
                    <input type="number" class="form-control input-square" id="squareInput" placeholder="">
                </div>
                <div class="form-group">
                    <label for="squareInput">Age</label>
                    <input type="number" class="form-control input-square" id="squareInput" placeholder="">
                </div>
                <div class="form-group">
                    <label for="pillSelect">Gender</label>
                    <select class="form-control" id="pillSelect">
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pillSelect">Blood Group</label>
                    <select class="form-control" id="pillSelect">
                        <option>A+</option>
                        <option>A-</option>
                        <option>B+</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="squareInput">Last Donation Date</label>
                    <input type="date" class="form-control input-square" id="squareInput" placeholder="">
                </div>
                <button class="btn btn-success"><i class="la la-check"></i>&nbsp;Save</button>


            </form>

        </div>
    </div>
</div>
@endsection

@section(scripts)
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: 'Bfltip',
            buttons: [
                'copy', 'excel', 'pdf', 'print', 'csv'
            ]
        });
    });
</script>
@endsection