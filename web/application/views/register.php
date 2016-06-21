<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/alertify/css/alertify.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/alertify/css/themes/bootstrap.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>HIRARCHY </b>VIEW</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Register a new membership</p>
        <form action="<?php echo base_url();?>auth/registerprocess" id="myform" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="E-Mail" name="email" required>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Re-Password" name="repassword" id="repassword" required>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="instansi" name="instansi" required>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
            </div>
        </form>
        <a href="<?php echo base_url();?>" class="text-center">I already have a membership</a>
    </div>
</div>
<script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/alertify/alertify.min.js"></script>
<script>
    $( document ).ready(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
        $("#myform").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 50,

                } ,
                repassword: {
                    equalTo: "#password",
                    minlength: 6,
                    maxlength: 50
                }
            },
            messages:{
                password: {
                    required:"the password is required"
                }
            }
        });
    });
</script>
<?php if($error){?>
<script type="text/javascript">
    alertify.error('Email Sudah Terdaftar');
</script>
<?php }?>
</body>
</html>
