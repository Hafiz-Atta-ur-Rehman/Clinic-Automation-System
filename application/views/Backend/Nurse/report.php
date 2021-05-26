@extends(Backend/Nurse/MainTemplate)
<!-- @section(dashboardselected)
active
@endsection -->
@section(title)
Report
@endsection
@section(stylelinks)

<link href="<?= base_url('pharmacist_assets/abc/jquery.dataTables.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('pharmacist_assets/abc/stylee.css') ?>" rel="stylesheet">
<link href="<?= base_url('pharmacist_assets/abc/modalimg.css') ?>" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet">

<link href="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>



@endsection


@section(content)

<div style="margin-bottom:10px;">
    <a href="<?= base_url('index.php/Nurse/addreport') ?>">
        <button type="button" class="btn btn-w-m btn-primary">Add Operation Report</button>
    </a>
</div>


<div class="row animated fadeInDown">
    <div class="col-lg-12">

        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Operation Report</h5>

            </div>
            <div class="ibox-content">

                <div class="table-responsive">
                    <table id="example" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Patient</th>
                                <th>Doctor</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Lorem ipsum, dolor sit amet</td>
                                <td>11-11-2020</td>
                                <td>Ansar</td>
                                <td>Dr Hayat</td>
                                <td style="text-align: center;">
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <a href="<?= base_url('index.php/Nurse/addreport') ?>">
                                                <button type="submit" class="btn btn-warning btn1"
                                                    style="color: white;">
                                                    <i class="fa fa-pencil-alt"></i>Edit</button></a>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal"><i class="fa fa-eye"></i>
                                                View
                                            </button>
                                            <button type="submit" class="btn btn-danger btn2">
                                                <i class="fa fa-check"></i> Delete </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<div style="margin-bottom:10px;">
    <a href="<?= base_url('index.php/Nurse/addreport') ?>">
        <button type="button" class="btn btn-w-m btn-primary">Add Birth Report</button>
    </a>
</div>


<div class="row animated fadeInDown">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Birth Report</h5>

            </div>
            <div class="ibox-content">

                <div class="table-responsive">
                    <table id="example1" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Patient</th>
                                <th>Doctor</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Lorem ipsum, dolor sit amet</td>
                                <td>11-11-2020</td>
                                <td>Ansar</td>
                                <td>Dr Hayat</td>
                                <td style="text-align: center;">
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <a href="<?= base_url('index.php/Nurse/addreport') ?>">
                                                <button type="submit" class="btn btn-warning btn1"
                                                    style="color: white;">
                                                    <i class="fa fa-pencil-alt"></i>Edit</button></a>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal"><i class="fa fa-eye"></i>
                                                View
                                            </button>
                                            <button type="submit" class="btn btn-danger btn2">
                                                <i class="fa fa-check"></i> Delete </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<div style="margin-bottom:10px;">
    <a href="<?= base_url('index.php/Nurse/addreport') ?>">
        <button type="button" class="btn btn-w-m btn-primary">Add Death Report</button>
    </a>
</div>


<div class="row animated fadeInDown">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Death Report</h5>

            </div>
            <div class="ibox-content">

                <div class="table-responsive">
                    <table id="example2" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Patient</th>
                                <th>Doctor</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Lorem ipsum, dolor sit amet</td>
                                <td>11-11-2020</td>
                                <td>Ansar</td>
                                <td>Dr Hayat</td>
                                <td style="text-align: center;">
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <a href="<?= base_url('index.php/Nurse/addreport') ?>">
                                                <button type="submit" class="btn btn-warning btn1"
                                                    style="color: white;">
                                                    <i class="fa fa-pencil-alt"></i>Edit</button></a>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal"><i class="fa fa-eye"></i>
                                                View
                                            </button>
                                            <button type="submit" class="btn btn-danger btn2">
                                                <i class="fa fa-check"></i> Delete </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CAS Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <img src="<?= base_url('pharmacist_assets/images/man-profile.jpg') ?>" class="modalimg" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Description</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                            <h5 class="card-title">Date</h5> <p>11-10-2020</p>
                            <h5 class="card-title">Patient</h5> <p>Usman</p>
                            <h5 class="card-title">Doctor</5> <p>Haider</p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
@endsection

@section(scriptlinks)
<script>
$(document).ready(function() {
    $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
</script>
<script>
$(document).ready(function() {
    $('#example1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
</script>
<script>
$(document).ready(function() {
    $('#example2').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js">
</script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>


<script src="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.js"></script>
<script>
var $table = $('#table')

$(function() {
    $('#modalTable').on('shown.bs.modal', function() {
        $table.bootstrapTable('resetView')
    })
})
</script>
@endsection