@extends(Backend/Pharmacist/MainTemplate)
<!-- @section(dashboardselected)
active
@endsection -->
@section(title)
Pharmacist | + ADD Medicine
@endsection
@section(stylelinks)

<link rel="stylesheet" href="<?= base_url('bootstrap_assets/bootstrap.min.css')?>">
@endsection


@section(content)

<div class="mdc-card">
    <div>
        <a href="<?= base_url('index.php/Pharmacist/managemedicine') ?>">
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
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>Select Medicine category</option>
                </select>
            </div><br>
            <div class="form-group"  style="margin-right: 25px;">
                <label for="exampleFormControlTextarea1">Description:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div><br>
            <div class="form-group" style="margin-right: 25px;">
                <label for="exampleFormControlInput1">Price:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1">
            </div><br>
            <div class="form-group" style="margin-right: 25px;">
                <label for="exampleFormControlInput1">Total Quantity:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1">
            </div><br>
            <div class="form-group" style="margin-right: 25px;">
                <label for="exampleFormControlInput1">Manufacturing Company:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1">
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