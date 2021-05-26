@extends(Backend/Receptionist/MainTemplate)
@section(patientsselected)
active
@endsection
@section(pagetitle)
Patient
@endsection
@section(stylelinks)
<link href="<?= base_url('doctor_assets/css/plugins/dataTables/datatables.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('doctor_assets/css/plugins/iCheck/custom.css') ?>" rel="stylesheet">
<link href="<?= base_url('doctor_assets/css/plugins/fullcalendar/fullcalendar.css') ?>" rel="stylesheet">
<link href="<?= base_url('doctor_assets/css/plugins/fullcalendar/fullcalendar.print.css') ?>" rel='stylesheet'
    media='print'>
@endsection

@section(content)

<div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Clinic Automation System</h4>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-sm-3">

                        <a href="#" class="profile-picture">
                            <img src="https://creativeitem.com/demo/bayanno/uploads/user.jpg"
                                class="img-responsive img-circle">
                        </a>

                    </div>

                    <div class="col-sm-9" style="display: flex; align-items: center; height: 100px;">

                        <h3>Tanvir Hasan</h3>

                    </div>


                </div>
                <div>
                    <br>
                    <table class="table table-bordered">

                        <tbody>
                            <tr>
                                <td>Email</td>
                                <td><b>patient@example.com</b></td>
                            </tr>

                            <tr>
                                <td>Address</td>
                                <td><b>Some address</b></td>
                            </tr>

                            <tr>
                                <td>Phone</td>
                                <td><b>1234567</b></td>
                            </tr>

                            <tr>
                                <td>Sex</td>
                                <td><b>male</b></td>
                            </tr>


                            <tr>
                                <td>Birth Date</td>
                                <td><b>08/10/1990</b></td>
                            </tr>

                            <tr>
                                <td>Age</td>
                                <td><b>27</b></td>
                            </tr>

                            <tr>
                                <td>Blood Group</td>
                                <td><b>B+</b>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div style="margin:10px;">
    <a href="<?= base_url('index.php/receptionist/addpatient') ?>">
        <button type="button" class="btn btn-w-m btn-primary">Add Patient</button>
    </a>
</div>


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
                                <td style="display: flex; justify-content: center;">
                                    <img src="https://creativeitem.com/demo/bayanno/uploads/user.jpg" class="img-circle"
                                        width="40px" height="40px">
                                </td>
                                <td>Tanvir Hasan</td>
                                <td>patient@example.com</td>
                                <td>Some address</td>
                                <td>1234567</td>
                                <td>male</td>
                                <td>08/10/1990</td>
                                <td>27</td>
                                <td>B+</td>

                                <!-- <td>
                                    <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Actions
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                            <li data-toggle="modal" data-target="#myModal2">
                                                <a>
                                                    <i class="fa fa-user"></i> &nbsp;
                                                    Profile
                                                </a>

                                            </li>



                                            <li>
                                                <a href="<?= base_url('index.php/Doctor/prescription') ?>">
                                                    <i class="fa fa-eye"></i> &nbsp;
                                                    View Medication History </a>
                                            </li>
                                            <li>
                                                <a>
                                                    <i class="fa fa-pencil"></i> &nbsp;
                                                    Edit </a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a>
                                                    <i class="fa fa-trash-o"></i> &nbsp;
                                                    Delete </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td> -->
                                <td>
                                    <a class="btn btn-warning btn-sm">
                                        <i class="fa fa-pencil"></i>&nbsp;
                                        Edit </a>
                                    <a class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash-o"></i>&nbsp;
                                        Delete </a>
                                </td>
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
<script src="<?= base_url('doctor_assets/js/plugins/fullcalendar/moment.min.js') ?>"></script>
<!-- iCheck -->
<script src="<?= base_url('doctor_assets/js/plugins/iCheck/icheck.min.js') ?>"></script>

<!-- Full Calendar -->
<script src="<?= base_url('doctor_assets/js/plugins/fullcalendar/fullcalendar.min.js') ?>"></script>
<script>
$(document).ready(function() {

    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green'
    });

    /* initialize the external events
    -----------------------------------------------------------------*/


    $('#external-events div.external-event').each(function() {

        // store data so the calendar knows to render an event upon drop
        $(this).data('event', {
            title: $.trim($(this).text()), // use the element's text as the event title
            stick: true // maintain when user navigates (see docs on the renderEvent method)
        });

        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 1111999,
            revert: true, // will cause the event to go back to its
            revertDuration: 0 //  original position after the drag
        });

    });


    /* initialize the calendar
    -----------------------------------------------------------------*/
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar
        drop: function() {
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }
        },
        events: [{
                title: 'All Day Event',
                start: new Date(y, m, 1)
            },
            {
                title: 'Long Event',
                start: new Date(y, m, d - 5),
                end: new Date(y, m, d - 2)
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: new Date(y, m, d - 3, 16, 0),
                allDay: false
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: new Date(y, m, d + 4, 16, 0),
                allDay: false
            },
            {
                title: 'Meeting',
                start: new Date(y, m, d, 10, 30),
                allDay: false
            },
            {
                title: 'Lunch',
                start: new Date(y, m, d, 12, 0),
                end: new Date(y, m, d, 14, 0),
                allDay: false
            },
            {
                title: 'Birthday Party',
                start: new Date(y, m, d + 1, 19, 0),
                end: new Date(y, m, d + 1, 22, 30),
                allDay: false
            },
            {
                title: 'Click for Google',
                start: new Date(y, m, 28),
                end: new Date(y, m, 29),
                url: 'http://google.com/'
            }
        ]
    });


});
</script>

@endsection