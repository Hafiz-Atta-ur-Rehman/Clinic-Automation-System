@extends(Backend/Accountant/MainTemplate)
@section(links)

@endsection
@section(profileselected)
active
@endsection
@section(content)
<div class="container-fluid">
    <h4 class="page-title">Profile</h4>
    <div class="row">
        <div class="col-12">
            <div class="container-fluid rounded bg-white mt-1 mb-1">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img id="preview" style="width: 200px;height:200px" class="rounded-circle mt-5" src="https://creativeitem.com/demo/bayanno/uploads/user.jpg"><span class="font-weight-bold"></span><span class="text-black-50">
                        <br>

                        <input type="file" name="img[]" class="file d-none" accept="image/*">
                        
                        <button class="btn btn-success btn-round browse">
                        <i class="la la-cloud-upload"></i>
                        Upload</button>
                        
                        </span><span> </span></div>
                    </div>
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Profile Settings</h4>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 mb-2"><label class="labels">Name</label><input type="text" class="form-control" placeholder="enter phone number" value="Jonny Ive"></div>
                                <div class="col-md-12 mb-2"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address" value="Some address"></div>
                                <div class="col-md-12 mb-2"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value="laboratorist@example.com"></div>
                                <div class="col-md-12 mb-2"><label class="labels">Phone</label><input type="text" class="form-control" placeholder="education" value="1234567" value=""></div>
                            </div>
                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                  
                        <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Change Password</h4>
                            </div>
                            <div class="col-md-12"><label class="labels">Old Password</label><input type="text" class="form-control" placeholder="" value=""></div> <br>
                            <div class="col-md-12"><label class="labels">New Password</label><input type="text" class="form-control" placeholder="" value=""></div><br>
                            <div class="col-md-12"><label class="labels">Confirm New Password</label><input type="text" class="form-control" placeholder="" value=""></div>
                        </div>
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
<script>
$(document).on("click", ".browse", function() {
  var file = $(this).parents().find(".file");
  file.trigger("click");
});
$('input[type="file"]').change(function(e) {
  var fileName = e.target.files[0].name;
  $("#file").val(fileName);

  var reader = new FileReader();
  reader.onload = function(e) {
    // get loaded data and render thumbnail.
    document.getElementById("preview").src = e.target.result;
  };
  // read the image file as a data URL.
  reader.readAsDataURL(this.files[0]);
});
</script>
@endsection