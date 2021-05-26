@extends(Backend/Nurse/MainTemplate)
<!-- @section(dashboardselected)
active
@endsection -->
@section(title)
Patient
@endsection

@section(stylelinks)
<link rel="stylesheet" href="<?= base_url('bootstrap_assets/bootstrap.min.css')?>">
<link href="<?= base_url('pharmacist_assets/abc/jquery.dataTables.min.css') ?>" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?= base_url('pharmacist_assets/abc/bs4.datatables.min.css') ?>" />
<style type="text/css">
    select.custom-select.custom-select-sm.form-control.form-control-sm {
        width: 50% !important;
    }

    li.paginate_button.page-item {
        background: none !important;
        border: none !important;
        padding: 2px !important;
    }
</style>

@endsection



@section(content)

<div class="mdc-card">
    <div class="row animated fadeInDown">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Patient List</h5>
                    <div class="ibox-tools">
                        <div style="margin:10px;">
                            <a href="<?= base_url('index.php/Nurse/addpatient') ?>">
                                <button type="button" class="btn btn-w-m btn-primary">+ Add Patient</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                              <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Sex</th>
            <th>Birth Date</th>
            <th>Age</th>
            <th>Blood Group</th>
            <th>Options</th>
        </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="display: flex; justify-content: center;" class="sorting_1">
                                        <img src="https://creativeitem.com/demo/bayanno/uploads/user.jpg"
                                            class="img-circle" width="40px" height="40px">
                                    </td>
                                    <td style="text-align: center;">Usman</td>
                                    <td style="text-align: center;">Fever</td>
                                    <td style="text-align: center;">Lorem ipsum dolor sit.</td>
                                    <td style="text-align: center;">250\- Rs</td>
                                    <td style="text-align: center;">12 Packs</td>

                                    <td style="text-align: center;">6.5 packs</td>
                                    <td style="text-align: center;">Genetics</td>
                                    <td style="text-align: center;">....</td>
                                    <td>
                                        <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <a href="http://localhost/Clinic-Automation-system/index.php/Nurse/addreport">
                                                <button type="submit" class="btn btn-warning btn1" style="color: white;">
                                                    <i class="fa fa-pencil-alt" aria-hidden="true"></i>Edit</button></a>
                                           
                                            <button type="submit" class="btn btn-danger btn2">
                                                <i class="fa fa-check" aria-hidden="true"></i> Delete </button>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




@endsection
@section(scriptlinks)
<!-- jQuery library -->
<script src="<?= base_url('bootstrap_assets/jquery.min.js')?>"></script>

<!-- Popper JS -->
<script src="<?= base_url('bootstrap_assets/popper.min.js')?>"></script>

<!-- Latest compiled JavaScript -->
<script src="<?= base_url('bootstrap_assets/bootstrap.min.js')?>"></script>

<script type="text/javascript" src="<?= base_url('pharmacist_assets/abc/datatables.min.js')?>"></script>

<script>
    $(document).ready(function() {
        $('.dataTables-example').DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [{
                    extend: 'copy'
                },
                {
                    extend: 'csv'
                },
                {
                    extend: 'excel',
                    title: 'ExampleFile'
                },
                {
                    extend: 'pdf',
                    title: 'ExampleFile'
                },

                {
                    extend: 'print',
                    customize: function(win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]

        });

    });
</script>
@endsection