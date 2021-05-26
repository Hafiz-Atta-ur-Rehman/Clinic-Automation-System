@extends(Backend/Admin/MainTemplate)
@section(title)Blood Bank@endsection
@section(content)
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Striped Full Width Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Blood Group</th>
                      <th>Out of 100 Bags</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>A+</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 10%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">10 Bags</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
@endsection