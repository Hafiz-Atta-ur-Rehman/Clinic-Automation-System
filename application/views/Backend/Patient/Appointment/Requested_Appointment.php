@extends(Backend/Patient/MainTemplate)
@section(requestedappointmentsselected)
active
@endsection
@section(pagetitle)
Requested Appointments
@endsection
@section(stylelinks)
<link href="<?= base_url('doctor_assets/css/plugins/dataTables/datatables.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('doctor_assets/css/plugins/iCheck/custom.css') ?>" rel="stylesheet">

@endsection

@section(content)

<div class="row animated fadeInDown">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Basic Data Tables example with responsive plugin</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Patient</th>
                                <th>Doctor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>17 Nov, 2017 - 12:00</td>
                                <td>Tanvir Hasan</td>
                                <td>Micheal Pewd</td>
                            </tr>
                            <tr>
                                <td>17 Nov, 2017 - 12:00</td>
                                <td>Tanvir Hasan</td>
                                <td>Micheal Pewd</td>
                            </tr>
                            <tr>
                                <td>17 Nov, 2017 - 12:00</td>
                                <td>Tanvir Hasan</td>
                                <td>Micheal Pewd</td>
                            </tr>
                            <tr>
                                <td>17 Nov, 2017 - 12:00</td>
                                <td>Tanvir Hasan</td>
                                <td>Micheal Pewd</td>
                            </tr>
                            </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

</div>
@endsection

@section(scriptlinks)
<script src="<?= base_url('doctor_assets/js/plugins/dataTables/datatables.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        $('.dataTables-example').DataTable({
            pageLength: 25,
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

<!-- iCheck -->
<script src="<?= base_url('doctor_assets/js/plugins/iCheck/icheck.min.js') ?>"></script>


@endsection