<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?php echo $site; ?> | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo $BASE; ?>/ui/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo $BASE; ?>/ui/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo $BASE; ?>/ui/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo $BASE; ?>/"><b>App</b>NAME</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Please Login</p>
            <?php if ($errors!=null): ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Error(s)!</h4>
                    <?php foreach (($errors?:array()) as $error): ?>
                        <li><?php echo $error['0']; ?></li>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <form action="<?php echo $BASE; ?>/account/signin" method="post">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>" />
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password" />
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <a href="#myModal" data-toggle="modal">Forget your password?</a>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- Modal HTML -->

    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title">Password Recovery</h3>
                </div>
                <div class="modal-body">
                    <p>We will send your password by email</p>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" id="userEmail" placeholder="Your email address" />
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="btnOk" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery 2.1.4 -->
    <script src="<?php echo $BASE; ?>/ui/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo $BASE; ?>/ui/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo $BASE; ?>/ui/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

</body>

</html>
