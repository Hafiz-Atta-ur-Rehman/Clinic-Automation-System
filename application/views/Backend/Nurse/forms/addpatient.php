@extends(Backend/Nurse/MainTemplate)
<!-- @section(dashboardselected)
active
@endsection -->
@section(title)
+ ADD Patient
@endsection
@section(stylelinks)

<link rel="stylesheet" href="<?= base_url('bootstrap_assets/bootstrap.min.css')?>">



@endsection


@section(content)

<div class="mdc-card">
    <div>
        <a href="<?= base_url('index.php/Nurse/patient') ?>">
            <button type="button" class="btn btn-w-m btn-primary">Back</button>
        </a>
    </div>
    <br>
    <form>
        <div class="form-group" style="margin-right: 25px;">
            <label for="exampleFormControlInput1">Name:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1">
        </div><br>
        <div class="form-group" style="margin-right: 25px;">
            <label for="exampleFormControlInput1">Email:</label>
            <input type="mail" class="form-control" id="exampleFormControlInput1">
        </div><br>
        <div class="form-group" style="margin-right: 25px;">
            <label for="exampleFormControlInput1">Password:</label>
            <input type="password" class="form-control" id="exampleFormControlInput1">
        </div><br>
        <div class="form-group" style="margin-right: 25px;">
            <label for="exampleFormControlTextarea1">Address:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div><br>
        <div class="form-group" style="margin-right: 25px;">
            <label for="exampleFormControlInput1">Phone:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1">
        </div><br>
        <div class="form-group" style="margin-right: 25px;">
        <label for="exampleFormControlInput1">Gender:</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option></option>
                <option>Male</option>
                <option>Female</option>
                <option>Others</option>
            </select>
        </div><br>
        <div class="form-group" style="margin-right: 25px;">
            <label for="exampleFormControlInput1">Birth Date:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1">
        </div><br>
        <div class="form-group" style="margin-right: 25px;">
            <label for="exampleFormControlInput1">Age:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1">
        </div><br>
        <div class="form-group" style="margin-right: 25px;">
        <label for="exampleFormControlInput1">Blood Group:</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option></option>
                <option>A+</option>
                <option>A-</option>
                <option>B+</option>
                <option>B-</option>
                <option>AB+</option>
                <option>AB-</option>
                <option>O+</option>
                <option>O-</option>
            </select>
        </div><br>
        <div>
            <img src="http://placehold.it/180" id="blah" alt="Img"><br><br>
            <div class="btns">
                <input type="file" id="inputFile" onchange="readUrl(this)">
            </div>
        </div><br><br>
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check"></i> Save </button>
            </div>
        </div>
    </form>
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
@endsection