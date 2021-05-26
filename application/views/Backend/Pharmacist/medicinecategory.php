@extends(Backend/Pharmacist/MainTemplate)
<!-- @section(dashboardselected)
active
@endsection -->
@section(title)
Pharmacist | Medicine Category
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
                    <h5>Medicine List</h5>
                    <div class="ibox-tools">
                        <div style="margin:10px;">
                            <a href="<?= base_url('index.php/Pharmacist/addmedicinecategory') ?>">
                                <button type="button" class="btn btn-w-m btn-primary">+ Add Medicine Category</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Medicine Name</th>
                                    <th style="text-align: center;">Medicine Description</th>
                                    <th style="text-align: center;">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>17 Nov, 2017 - 12:00</td>
                                    <td>Tanvir Hasan</td>
                                    <td style="text-align: center;">
                                    <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <a href="<?= base_url('index.php/Pharmacist/addmedicinecategory') ?>">
                                                <button type="submit" class="btn btn-warning btn1"
                                                    style="color: white;">
                                                    <i class="fa fa-pencil-alt"></i> Edit</button>
                                                </a>
                                                    <button type="submit" class="btn btn-danger btn2">
                                                    <i class="fa fa-check"></i> Delete </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tatyana Fitzpatrick</td>
                                    <td>Regional Director</td>
                                    <td style="text-align: center;">
                                    <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-warning btn1"
                                                    style="color: white;">
                                                    <i class="fa fa-pencil-alt"></i> Edit</button>
                                                    <button type="submit" class="btn btn-danger btn2">
                                                    <i class="fa fa-check"></i> Delete </button>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>Michael Silva</td>
                                    <td>Marketing Designer</td>
                                    <td style="text-align: center;">
                                    <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-warning btn1"
                                                    style="color: white;">
                                                    <i class="fa fa-pencil-alt"></i> Edit</button>
                                                    <button type="submit" class="btn btn-danger btn2">
                                                    <i class="fa fa-check"></i> Delete </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Paul Byrd</td>
                                    <td>Chief Financial Officer (CFO)</td>
                                    <td style="text-align: center;">
                                    <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-warning btn1"
                                                    style="color: white;">
                                                    <i class="fa fa-pencil-alt"></i> Edit</button>
                                                    <button type="submit" class="btn btn-danger btn2">
                                                    <i class="fa fa-check"></i> Delete </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gloria Little</td>
                                    <td>Systems Administrator</td>
                                    <td style="text-align: center;">
                                    <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-warning btn1"
                                                    style="color: white;">
                                                    <i class="fa fa-pencil-alt"></i> Edit</button>
                                                    <button type="submit" class="btn btn-danger btn2">
                                                    <i class="fa fa-check"></i> Delete </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bradley Greer</td>
                                    <td>Software Engineer</td>
                                    <td style="text-align: center;">
                                    <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-warning btn1"
                                                    style="color: white;">
                                                    <i class="fa fa-pencil-alt"></i> Edit</button>
                                                    <button type="submit" class="btn btn-danger btn2">
                                                    <i class="fa fa-check"></i> Delete </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Dai Rios</td>
                                    <td>Personnel Lead</td>
                                    <td style="text-align: center;">
                                    <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-warning btn1"
                                                    style="color: white;">
                                                    <i class="fa fa-pencil-alt"></i> Edit</button>
                                                    <button type="submit" class="btn btn-danger btn2">
                                                    <i class="fa fa-check"></i> Delete </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jenette Caldwell</td>
                                    <td>Development Lead</td>
                                    <td style="text-align: center;">
                                    <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-warning btn1"
                                                    style="color: white;">
                                                    <i class="fa fa-pencil-alt"></i> Edit</button>
                                                    <button type="submit" class="btn btn-danger btn2">
                                                    <i class="fa fa-check"></i> Delete </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Yuri Berry</td>
                                    <td>Chief Marketing Officer (CMO)</td>
                                    <td style="text-align: center;">
                                    <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-warning btn1"
                                                    style="color: white;">
                                                    <i class="fa fa-pencil-alt"></i> Edit</button>
                                                    <button type="submit" class="btn btn-danger btn2">
                                                    <i class="fa fa-check"></i> Delete </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Caesar Vance</td>
                                    <td>Pre-Sales Support</td>
                                    <td style="text-align: center;">
                                    <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-warning btn1"
                                                    style="color: white;">
                                                    <i class="fa fa-pencil-alt"></i> Edit</button>
                                                    <button type="submit" class="btn btn-danger btn2">
                                                    <i class="fa fa-check"></i> Delete </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Doris Wilder</td>
                                    <td>Sales Assistant</td>
                                    <td style="text-align: center;">
                                    <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-warning btn1"
                                                    style="color: white;">
                                                    <i class="fa fa-pencil-alt"></i> Edit</button>
                                                    <button type="submit" class="btn btn-danger btn2">
                                                    <i class="fa fa-check"></i> Delete </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Angelica Ramos</td>
                                    <td>Chief Executive Officer (CEO)</td>
                                    <td style="text-align: center;">
                                    <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-warning btn1"
                                                    style="color: white;">
                                                    <i class="fa fa-pencil-alt"></i> Edit</button>
                                                    <button type="submit" class="btn btn-danger btn2">
                                                    <i class="fa fa-check"></i> Delete </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gavin Joyce</td>
                                    <td>Developer</td>
                                    <td style="text-align: center;">
                                    <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-warning btn1"
                                                    style="color: white;">
                                                    <i class="fa fa-pencil-alt"></i> Edit</button>
                                                    <button type="submit" class="btn btn-danger btn2">
                                                    <i class="fa fa-check"></i> Delete </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jennifer Chang</td>
                                    <td>Regional Director</td>
                                    <td style="text-align: center;">
                                    <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-warning btn1"
                                                    style="color: white;">
                                                    <i class="fa fa-pencil-alt"></i> Edit</button>
                                                    <button type="submit" class="btn btn-danger btn2">
                                                    <i class="fa fa-check"></i> Delete </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Brenden Wagner</td>
                                    <td>Software Engineer</td>
                                    <td style="text-align: center;">
                                    <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-warning btn1"
                                                    style="color: white;">
                                                    <i class="fa fa-pencil-alt"></i> Edit</button>
                                                    <button type="submit" class="btn btn-danger btn2">
                                                    <i class="fa fa-check"></i> Delete </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fiona Green</td>
                                    <td>Chief Operating Officer (COO)</td>
                                    <td style="text-align: center;">
                                    <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-warning btn1"
                                                    style="color: white;">
                                                    <i class="fa fa-pencil-alt"></i> Edit</button>
                                                    <button type="submit" class="btn btn-danger btn2">
                                                    <i class="fa fa-check"></i> Delete </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Shou Itou</td>
                                    <td>Regional Marketing</td>
                                    <td style="text-align: center;">
                                    <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-warning btn1"
                                                    style="color: white;">
                                                    <i class="fa fa-pencil-alt"></i> Edit</button>
                                                    <button type="submit" class="btn btn-danger btn2">
                                                    <i class="fa fa-check"></i> Delete </button>
                                            </div>
                                        </div>
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