<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        Login | Clinic Automation Sysem </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://creativeitem.com/demo/bayanno/uploads/favicon.png">
    <link rel="stylesheet" href="https://creativeitem.com/demo/bayanno/assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://creativeitem.com/demo/bayanno/assets/login_page/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://creativeitem.com/demo/bayanno/assets/login_page/css/normalize.css">
    <link rel="stylesheet" href="https://creativeitem.com/demo/bayanno/assets/login_page/css/main.css">
    <link rel="stylesheet" href="https://creativeitem.com/demo/bayanno/assets/login_page/css/style.css">
    <link rel="stylesheet"
          href="https://creativeitem.com/demo/bayanno/assets/common/izitoast/css/iziToast.min.css" type="text/css">
    <script src="https://creativeitem.com/demo/bayanno/assets/login_page/js/vendor/modernizr-2.8.3.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
<div class="main-content-wrapper">
    <div class="login-area" style="background: white;">
        <?php if($this->session->has_userdata('failure')): ?>
        <div class="alert alert-danger alert-dismissible m-3">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?= $this->session->flashdata('failure');?>
        </div>
    <?php endif;
        unset($_SESSION['failure']);
     ?>
        <div class="login-header">
            <a href="https://creativeitem.com/demo/bayanno/index.php/login" class="logo">
                <img src="https://creativeitem.com/demo/bayanno/uploads/logo.png" height="60" alt="">
            </a>
            <h2 class="title text-dark" style="color:black;">Clinic Automation Sysem</h2>
        </div>
        <div class="login-content">
            <form method="post" action="<?=site_url('index.php/admin/validate');?>" role="form" id="form_login">
                <div class="form-group">
                    <?php 
                    if(isset($_POST['email']))
                        $email=$_POST['email'];
                    else if(isset($_GET['email']))
                        $email=$this->Admin_model->decryption($_GET['email']);
                    else
                        $email='';
                    ?>
                    <input type="email" value="<?= $email; ?>" class="input-field" name="email" placeholder="Email"
                           required autocomplete="off" id = "email">
                           <div class="invalid-feedback text-danger text-left font-weight-lighter d-block">
                               <?= form_error('email');?>
                           </div>
                </div>
                <div class="form-group">
                    <input type="password" class="input-field" name="password" placeholder="Password"
                           required autocomplete="off" id = "password">
                           <div class="invalid-feedback text-danger text-left font-weight-lighter d-block"><?= form_error('password');?></div>
                </div><br>
                <button type="submit" class="btn btn-primary">Login<i class="fa fa-lock"></i></button>
            </form>

            <div class="login-bottom-links">
                <a href="" class="link">
                    Forgot Your Password ?
                </a>
            </div>
            <br/>

        </div>
    </div>
    <div class="image-area"></div>
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://creativeitem.com/demo/bayanno/assets/common/izitoast/js/iziToast.min.js"></script>
</body>
</html>
