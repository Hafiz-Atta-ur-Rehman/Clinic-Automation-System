@extends(Backend/Admin/MainTemplate)
@section(title)Bed Allotment@endsection
@section(content)
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Bed Allotment List</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Bed number</th>
                    <th>Bed Type</th>
                    <th>Patient</th>
                    <th>Allotment time</th>
                    <th>Discharge time</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Gecko</td>
                    <td>Mozilla 1.0</td>
                    <td>Win 95+ / OSX.1+</td>
                    <td>Win 95+ / OSX.1+</td>
                    <td>Win 95+ / OSX.1+</td>

                </tr>
            </tbody>
        </table>
    </div>
</div>

</div>
<!-- /.card-body -->
</div>
@endsection