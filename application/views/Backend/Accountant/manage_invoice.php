@extends(Backend/Accountant/MainTemplate)
@section(links)

@endsection
@section(manageinvoiceselected)
active
@endsection
@section(content)
<div class="container-fluid">
    <h4 class="page-title">Manage Invoice</h4>
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
            <a href="<?= base_url('index.php/accountant/add_invoice') ?>"><button class="btn btn-primary">Add Invoice</button></a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Invoice Number</th>
                                <th>Title</th>
                                <th>Patient</th>
                                <th>Creation Date</th>
                                <th>Due Date</th>
                                <th>Vat Percentage</th>
                                <th>Discount Amount</th>
                                <th>Status</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Tiger Nixon</td>

                                <td>System Architect</td>
                                <td>Tiger Nixon</td>
                                <td>unpaid</td>

                                <td>
                                    <a href="<?= base_url('index.php/lab/addblooddonor') ?>" class="btn btn-warning btn-sm">
                                        <i class="la la-edit"></i> &nbsp;
                                        Edit </a>
                                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#view_invoice">
                                        <i class="la la-eye"></i> &nbsp;
                                        View Invoice</a>
                                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#editbloodbnk">
                                        <i class="la la-cut"></i> &nbsp;
                                        Delete </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="modal fade" id="view_invoice">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Clinic Automation System</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body" style="height:500px; overflow:auto;">
                                <div id="invoice_print">
                                    <table width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="50%"></td>
                                                <td align="right">
                                                    <p><b>Invoice Number : </b>18437</p>
                                                    <p><b>Issue Date : </b>03/24/2021</p>
                                                    <p><b>Due Date : </b>03/31/2021</p>
                                                    <p><b>Status : </b>paid</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <table width="100%" border="0">
                                        <tbody>
                                            <tr>
                                                <td align="left">
                                                    <h4><b>Payment To</b></h4>
                                                </td>
                                                <td align="right">
                                                    <h4><b>Bill To</b></h4>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td align="left" valign="top">
                                                    Bayanno Hospital Management System<br>
                                                    <br>
                                                    <br>
                                                </td>
                                                <td align="right" valign="top">
                                                    Tanvir Hasan<br>
                                                    Some address<br>
                                                    1234567<br>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <h4>Invoice Entries</h4>
                                    <table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th width="60%">Entry</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <!-- INVOICE ENTRY STARTS HERE-->
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td>
                                                    amount to be paid </td>
                                                <td class="text-right">
                                                    5000 </td>
                                            </tr>

                                            <!-- INVOICE ENTRY ENDS HERE-->
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0">
                                        <tbody>
                                            <tr>
                                                <td align="right" width="80%">Sub Total :</td>
                                                <td align="right">5000</td>
                                            </tr>
                                            <tr>
                                                <td align="right" width="80%">Vat Percentage :</td>
                                                <td align="right">% </td>
                                            </tr>
                                            <tr>
                                                <td align="right" width="80%">Discount :</td>
                                                <td align="right"> </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <hr style="margin:0px;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right" width="80%">
                                                    <h4>Grand Total :</h4>
                                                </td>
                                                <td align="right">
                                                    <h4>5000 </h4>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>

                                <a onclick="PrintElem('#invoice_print')" class="btn btn-primary hidden-print">
                                    <i class="la la-print"></i> &nbsp;
                                    Print Invoice </a>
                                <br><br>


                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
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