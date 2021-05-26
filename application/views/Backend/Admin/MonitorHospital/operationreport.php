@extends(Backend/Admin/MainTemplate)
@section(title)Operation Report@endsection
@section(content)
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Operation List</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Patient</th>
                    <th>Doctor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Gecko</td>
                    <td>Mozilla 1.0</td>
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