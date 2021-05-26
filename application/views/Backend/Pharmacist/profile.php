@extends(Backend/Pharmacist/MainTemplate)
<!-- @section(dashboardselected)
active
@endsection -->
@section(title)
Pharmacist | Profile
@endsection
@section(stylelinks)

<link href="<?= base_url('pharmacist_assets/abc/jquery.dataTables.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('pharmacist_assets/abc/stylee.css') ?>" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('pharmacist_assets/abc/style.css') ?>">
<link href="<?= base_url('pharmacist_assets/abc/profile.css') ?>" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css"
    rel="stylesheet"> -->




@endsection


@section(content)

<div class="mdc-card">
    <form>
    <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Edit Your Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Edit Email">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" placeholder="Phone">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Old Password</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Edit Your Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">New Password</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Edit Email">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Confirm New Password</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Edit Email">
            </div>
        </div>
    
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
            
            <div class="btns col-sm-10">
            <img src="<?= base_url('pharmacist_assets/images/man-profile.jpg') ?>" id="blah" alt="Img"><br><br>
                <input type="file" id="inputFile" onchange="readUrl(this)">
            </div>
        </div>
        <div class="form-group row">
        <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            
        </div>
    </form>
</div>


@endsection

@section(scriptlinks)
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
var a = document.getElementById("blah");

var inputFile = document.getElementById("inputFile");

function readUrl(input) {
  if (input.files) {
    var reader = new FileReader();
    reader.readAsDataURL(input.files[0]);
    reader.onload = (e) => {
      a.src = e.target.result;
    }
  }
  /*if(input.files){
    var btn = document.createElement("BUTTON");
    document.body.appendChild(btn);
    btn.innerHTML = "Remove ";
    btn.id = 'btn-styled';
    btn.onclick = removeImg = () => {
      a.src = "http://placehold.it/180";
      inputFile.value = "";
      removeDummy();
    }
  }*/
document.querySelector('.btn2').style.display = 'none'; 
document.querySelector('.btn1').addEventListener('click', showBtn); 
 
function showBtn(e) { 
 document.querySelector('.btn2').style.display = 'block'; 
 e.preventDefault(); 
} 
}
function removeDummy() {
  var elem = document.getElementById('btn-styled');
  elem.remove(elem);
}

</script>

@endsection