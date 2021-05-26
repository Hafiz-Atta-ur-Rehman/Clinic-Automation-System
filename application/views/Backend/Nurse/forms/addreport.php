@extends(Backend/Nurse/MainTemplate)
<!-- @section(dashboardselected)
active
@endsection -->
@section(title)
Add Report
@endsection
@section(stylelinks)
<link rel="stylesheet" href="<?= base_url('bootstrap_assets/bootstrap.min.css')?>">



@endsection


@section(content)

<div class="mdc-card">
    <div>
        <a href="<?= base_url('index.php/Nurse/report') ?>">
            <button type="button" class="btn btn-w-m btn-primary">Back</button>
        </a>
    </div>
    <br>
    <form>
        <div class="form-group" style="margin-right: 25px;">
            <label for="exampleFormControlInput1">Type:</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option></option>
                <option>Operation</option>
                <option>Birt</option>
                <option>Death</option>
            </select>
        </div><br>
        <div class="form-group" style="margin-right: 25px;">
            <label for="exampleFormControlTextarea1">Description:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div><br>
        <div class="form-group" style="margin-right: 25px;">
            <label for="exampleFormControlInput1">Date:</label>
            <input type="date" class="form-control" id="exampleFormControlInput1">
        </div><br>
        <div class="form-group" style="margin-right: 25px;"><label for="exampleFormControlInput1">Patient:</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option></option>
                <option>Tanvir</option>
                <option>Hassan</option>
                
            </select>
        </div><br>
        <div class="form-group" style="margin-right: 25px;">
        <label for="exampleFormControlInput1">Doctor:</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option></option>
                <option>Dr Pervaiz</option>
                <option>Dr Ghulam Abbas</option>
                
            </select>
        </div><br>
        <div class="form-group" style="margin-right: 25px;">
            <label for="exampleFormControlInput1">BrowseFile</label><br><br>
            <input type="file" value="File">
        </div><br><br>
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check"></i> Update </button>
            </div>
        </div>
    </form>
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