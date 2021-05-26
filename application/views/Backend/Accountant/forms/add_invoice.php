@extends(Backend/Accountant/MainTemplate)
@section(links)

@endsection
@section(addinvoiceselected)
active
@endsection
@section(content)
<div class="container-fluid">
    <h4 class="page-title">Invoice</h4>
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
            <a href="<?= base_url('index.php/accountant/manage_invoice'); ?>"><button class="btn btn-primary">Back</button></a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12">

            <div class="card">

                <div class="card-body">

                    <form class="form-horizontal">

                        <div class="form-group row">
                            <div class="col-md-2 col-12">
                                <label class="control-label">Invoice Title</label>
                            </div>

                            <div class="col-md-10 col-12"><input type="text" class="form-control form-control-sm"></div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2 col-12">
                                <label class="control-label">Invoice Number</label>
                            </div>

                            <div class="col-md-10 col-12"><input type="text" disabled class="form-control form-control-sm" value="1986"></div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2 col-12">
                                <label class="control-label">Select Patient</label>
                            </div>

                            <div class="col-md-10 col-12">
                                <select class="form-control form-control-sm" id="sel1">
                                    <option>Ali</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2 col-12">
                                <label class="control-label">Creation Date</label>
                            </div>

                            <div class="col-md-10 col-12"><input type="date" class="form-control form-control-sm"></div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2 col-12">
                                <label class="control-label">Due Date</label>
                            </div>

                            <div class="col-md-10 col-12"><input type="date" class="form-control form-control-sm"></div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2 col-12">
                                <label class="control-label">Vat Percentage</label>
                            </div>

                            <div class="col-md-10 col-12"><input type="text" class="form-control form-control-sm"></div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2 col-12">
                                <label class="control-label">Discount </label>
                            </div>

                            <div class="col-md-10 col-12"><input type="text" class="form-control form-control-sm"></div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-2 col-12">
                                <label class="control-label">Payment Status</label>
                            </div>

                            <div class="col-md-10 col-12">
                                <select class="form-control form-control-sm" id="sel1">
                                    <option>Paid</option>
                                    <option>Unpaid</option>
                                </select>

                            </div>
                        </div>

                        <hr>

                        <div id="appendeddiv">

                        <div id="1">

                            <div class="form-group row">
                                <div class="col-md-2 col-12">
                                    <label class="control-label">Invoice Entry</label>
                                </div>

                                <div class="col-md-6 col-sm-7"><input type="text" class="form-control form-control-sm" placeholder="Description" name="desc[]"></div>

                                <div class="col-md-3 col-sm-3"><input type="text" class="form-control form-control-sm" placeholder="Amount" name="amount[]"></div>

                                <div class="col-md-1 col-sm-2">

                                    <!-- <i class="la la-cut bg-danger p-2" id="1" onclick="removediv(this.id)" style="cursor:pointer;border-radius: 23px;color: white;"></i> -->
                                </div>
                            </div>



                            <div class="form-group row">
                                <div class="col-md-2 col-12">
                                </div>

                                <div class="col-md-10 col-12">
                                    <button class="btn btn-primary btn-sm btn-round" id="1" onclick="adddiv(event,this.id)">
                                        <i class="la la-plus la-1x"></i> &nbsp;
                                        Add Invoice Entry</button>
                                </div>

                            </div>

                            </div>

                        </div>

                        <hr>

                        <div class="form-group row">
                            <div class="col-md-2 col-12">
                            </div>

                            <div class="col-md-10 col-12">
                                <button class="btn btn-success btn-sm btn-round">Create New Invoice</button>
                            </div>

                        </div>

                        <input type="hidden" id="hiddenID" value="1"/>


                    </form>

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
    function adddiv(e,id)
    {
        e.preventDefault();
        var id=parseInt($("#hiddenID").val())+1;
        var html='<div id=rmdiv'+id+'> <div class="form-group row"> <div class="col-md-2 col-12"> <label class="control-label">Invoice Entry</label> </div> <div class="col-md-6 col-sm-7"><input type="text" class="form-control form-control-sm" placeholder="Description" name="desc[]"></div> <div class="col-md-3 col-sm-3"><input type="text" class="form-control form-control-sm" placeholder="Amount" name="amount[]"></div> <div class="col-md-1 col-sm-2"> <i class="la la-cut bg-danger p-2" id='+id+' onclick="removediv(this.id)" style="cursor:pointer;border-radius: 23px;color: white;"></i> </div> </div> <div class="form-group row"> <div class="col-md-2 col-12"> </div> </div> </div> </div>';
        $("#appendeddiv").append(html);
        $("#hiddenID").val(id);
    }
    function removediv(id)
    {
        var el='rmdiv'+id;
        $("#"+el).remove();        
    }
</script>
@endsection