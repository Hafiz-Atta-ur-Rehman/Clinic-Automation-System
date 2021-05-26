@extends(Backend/Patient/MainTemplate)
@section(reportselected)
active
@endsection
@section(pagetitle)
Patient Invoice
@endsection
@section(stylelinks)
<link href="<?= base_url('doctor_assets/css/plugins/dataTables/datatables.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('doctor_assets/css/plugins/iCheck/custom.css') ?>" rel="stylesheet">
<link href="<?= base_url('doctor_assets/css/plugins/fullcalendar/fullcalendar.css') ?>" rel="stylesheet">
<link href="<?= base_url('doctor_assets/css/plugins/fullcalendar/fullcalendar.print.css') ?>" rel='stylesheet'
    media='print'>
@endsection

@section(content)
<div class="container">
    <div class="row wrapper border-bottom white-bg page-heading">
        
        <div class="ibox-content p-xl">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>From:</h5>
                        <address>
                            <strong>Inspinia, Inc.</strong><br>
                            106 Jorg Avenu, 600/10<br>
                            Chicago, VT 32456<br>
                            <abbr title="Phone">P:</abbr> (123) 601-4590
                        </address>
                    </div>

                    <div class="col-sm-6 text-right">
                        <h4>Invoice No.</h4>
                        <h4 class="text-navy">INV-000567F7-00</h4>
                        <span>To:</span>
                        <address>
                            <strong>Corporate, Inc.</strong><br>
                            112 Street Avenu, 1080<br>
                            Miami, CT 445611<br>
                            <abbr title="Phone">P:</abbr> (120) 9000-4321
                        </address>
                        <p>
                            <span><strong>Invoice Date:</strong> Marh 18, 2014</span><br />
                            <span><strong>Due Date:</strong> March 24, 2014</span>
                        </p>
                    </div>
                </div>

                <div class="table-responsive m-t">
                    <table class="table invoice-table">
                        <thead>
                            <tr>
                                <th>Item List</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Tax</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div><strong>Admin Theme with psd project layouts</strong></div>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.</small>
                                </td>
                                <td>1</td>
                                <td>$26.00</td>
                                <td>$5.98</td>
                                <td>$31,98</td>
                            </tr>
                            <tr>
                                <td>
                                    <div><strong>Wodpress Them customization</strong></div>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        Eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </small>
                                </td>
                                <td>2</td>
                                <td>$80.00</td>
                                <td>$36.80</td>
                                <td>$196.80</td>
                            </tr>
                            <tr>
                                <td>
                                    <div><strong>Angular JS & Node JS Application</strong></div>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.</small>
                                </td>
                                <td>3</td>
                                <td>$420.00</td>
                                <td>$193.20</td>
                                <td>$1033.20</td>
                            </tr>

                        </tbody>
                    </table>
                </div><!-- /table-responsive -->

                <table class="table invoice-total">
                    <tbody>
                        <tr>
                            <td><strong>Sub Total :</strong></td>
                            <td>$1026.00</td>
                        </tr>
                        <tr>
                            <td><strong>TAX :</strong></td>
                            <td>$235.98</td>
                        </tr>
                        <tr>
                            <td><strong>TOTAL :</strong></td>
                            <td>$1261.98</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-right">
                    <button class="btn btn-primary"><i class="fa fa-dollar"></i> Make A Payment</button>
                </div>

                <div class="well m-t"><strong>Comments</strong>
                    It is a long established fact that a reader will be distracted by the readable content
                    of a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                    more-or-less
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