@extends(Backend/Nurse/MainTemplate)
<!-- @section(dashboardselected)
active
@endsection -->
@section(title)
Add Bed-Allotment
@endsection
@section(stylelinks)
<link rel="stylesheet" href="<?= base_url('bootstrap_assets/bootstrap.min.css')?>">


@endsection


@section(content)

<div class="mdc-card">
    <div>
        <a href="<?= base_url('index.php/Nurse/bedallotment') ?>">
            <button type="button" class="btn btn-w-m btn-primary">Back</button>
        </a>
    </div>
    <br>
    <form>
        <div class="form-group" style="margin-right: 25px;">
            <label for="exampleFormControlInput1">Bed Number:</label>

                <select class="form-control">
                    <option>Select Bed Number</option>
                    <option>ICU-10</option>
                </select>
                    </div><br>
        <div class="form-group" style="margin-right: 25px;">
            <label for="exampleFormControlInput1">Patient:</label>
             <select class="form-control">
                    <option>Select Patient</option>
                </select>
        </div><br>
        <div class="form-group" style="margin-right: 25px;">
            <label for="exampleFormControlInput1">Allotment Time:</label>
            <input type="date" class="form-control" id="exampleFormControlInput1">
        </div><br>
        <div class="form-group" style="margin-right: 25px;">
            <label for="exampleFormControlInput1">Discharge Time:</label>
            <input type="date" class="form-control" id="exampleFormControlInput1">
        </div><br>
        
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check"></i> Save </button>
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