<?php require_once 'theme/util.inc.php'; $MasterPage = 'page_login.php';?>

<?php sb('title');?>Thai Palliative Care<?php eb();?>

<?php sb('js_and_css_head'); ?>
<!-- Bootstrap 3.3.4 -->
<link href="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- jQuery 2.1.4 -->
<script src="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Login theme -->
<link href="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>login/css/main.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.1/animate.css">
<?php eb();?>

<?php sb('content');?>
<?php include "connection/db.php"; ?>
<!-- Content Header (Page header) -->
<div class="container">
    <div class="row">
            <div class="com-md-12">
                <div class="notification login-alert">
                  Please Enter Your Username And Password!
                </div>
                <div class="notification notification-success logged-out">
                  You login again!
                </div>
                <div class="well welcome-text">
                   Hello, to access our app please <button class="btn btn-default btn-login">Log in</button> or <button class="btn btn-default btn-register" disabled="disabled">Register</button>
                </div>
            </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well login-box">
                <form id="frm-login">
                    <legend>Login</legend>
                    <div class="form-group">
                        <label for="username-email">E-mail or Username</label>
                        <input value='' id="username-email" name="username" placeholder="E-mail or Username" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" name="password" value='' placeholder="Password" type="text" class="form-control" />
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-danger btn-cancel-action">Cancel</button>
                        <input type="submit" class="btn btn-success btn-login-submit" value="Login" />
                    </div>
                </form>
            </div>
          <div class="logged-in well">
            <h1 id="alert-login"></h1> <hr>
            <div class="pull-right"><button class="btn-logout btn btn-info"><span class="glyphicon glyphicon-off"></span> Login Again!</button></div><br><br>
          </div>
        </div>
    </div>
</div>        <!-- /.content -->
<?php eb();?>

<?php sb('js_and_css_footer'); ?>
<script src="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>login/js/main.js" type="text/javascript"></script>
<?php eb();?>
 
<?php render($MasterPage);?>