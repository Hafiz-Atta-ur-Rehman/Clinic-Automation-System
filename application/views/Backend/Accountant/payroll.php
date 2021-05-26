@extends(Backend/Accountant/MainTemplate)
@section(links)

@endsection
@section(payrolllistselected)
active
@endsection
@section(content)
<div class="container-fluid">
    <h4 class="page-title">Payroll List</h4>
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
            <th><div>#</div></th>
            <th><div>ID</div></th>
            <th><div>Accountant</div></th>
            <th><div>Summary</div></th>
            <th><div>Date</div></th>
            <th><div>Status</div></th>
            <th><div>Edit</div></th>
            <th><div>Deletes</div></th>
        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="d-flex justify-content-center">
                                1
                                </td>
                                <td>System Architect</td>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Tiger Nixon</td>
                                <td>Tiger Nixon</td>

                                <td>
                                    <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editbloodbnk">
                                        <i class="la la-edit"></i> &nbsp;
                                        Edit </a>
                                    <div class="modal fade" id="editbloodbnk">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Blood Bank</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <form role="form" class="form-horizontal form-groups" action="" method="post" enctype="multipart/form-data">

                                                        <div class="form-group">
                                                            <label for="field-1" class="col-sm-3 control-label">Blood Group</label>

                                                            <div class="col-sm-9">
                                                                <input type="text" name="blood_group" class="form-control" id="field-1" value="A+" disabled="disabled">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="field-1" class="col-sm-3 control-label">Status</label>

                                                            <div class="col-sm-9">
                                                                <input type="text" name="status" class="form-control" id="field-1" value="10 bags" required="">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            &nbsp;&nbsp;<button type="submit" class="btn btn-success">
                                                                <i class="la la-calendar-check-o"></i>
                                                                Update </button>

                                                        </div>


                                                    </form>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <a class="btn btn-warning btn-danger" data-toggle="modal" data-target="#editbloodbnk">
                                        <i class="la la-cut"></i> &nbsp;
                                        Delete </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>

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