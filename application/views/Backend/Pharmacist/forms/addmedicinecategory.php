@extends(Backend/Pharmacist/MainTemplate)
<!-- @section(dashboardselected)
active
@endsection -->
@section(title)
Pharmacist | + ADD Medicine Category
@endsection
@section(stylelinks)

<link rel="stylesheet" href="<?= base_url('bootstrap_assets/bootstrap.min.css')?>">

@endsection


@section(content)

<div class="mdc-card">
    <div>
        <a href="<?= base_url('index.php/Pharmacist/medicinecategory') ?>">
            <button type="button" class="btn btn-w-m btn-primary">Back</button>
        </a>
    </div>
    <br>
    <div class="container" style="margin-right: 20px;">
        <div class="form-group">
            <label for="usr">Name:</label>
            <input type="text" class="form-control" id="usr">
        </div><br>
        <div class="form-group">
            <label for="comment">Description:</label>
            <textarea class="form-control" rows="5" id="comment"></textarea>
        </div><br>
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check"></i> Save </button>
            </div>
        </div>
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