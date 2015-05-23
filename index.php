<?php require_once '_theme/util.inc.php'; $MasterPage = 'page_login.php';?>

<?php sb('title');?>Thai Palliative Care<?php eb();?>

<?php sb('js_and_css_head'); ?>
<!-- Login theme -->
<link href="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>login/css/main.css" rel="stylesheet" type="text/css" />
<!--BG -->
<link href="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>login/css/bg.css" rel="stylesheet" type="text/css" />
<?php eb();?>

<?php sb('content');?>
<!-- Content Header (Page header) -->
<div id="container" class="cls-container">
		
		<!-- BACKGROUND IMAGE -->
		<!--===================================================-->
		<div id="bg-overlay" style="background-image: url('login/img/bg-img-<?php echo rand(1,5); ?>.jpg');" class="bg-img "></div>
		
		
		<!-- HEADER -->
		<!--===================================================-->
		<div class="cls-header cls-header-lg">
			<div class="cls-brand">
				<a class="box-inline" href=".">
					<!-- <img alt="Nifty Admin" src="img/logo.png" class="brand-icon"> -->
					<span class="brand-title">Thai <span class="text-thin">Palliative</span></span>
				</a>
			</div>
		</div>
		<!--===================================================-->
		
		
		<!-- LOGIN FORM -->
		<!--===================================================-->
		<div class="cls-content">
            
			<div class="cls-content-sm panel">
				<div class="panel-body">
                    <div style="display: none;" id="alert-login" class="callout callout-danger">
                    </div>
					<p class="pad-btm">Sign In to your account</p>
					<form id="frm-login" onsubmit="submit_login(); return false;">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
								<input type="text" name="username" class="form-control" placeholder="E-mail or Username">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
								<input type="password" name="password" class="form-control" placeholder="Password">
							</div>
						</div>
						<button class="btn btn-success btn-lg btn-block" type="submit">
							<i class="fa fa-sign-in"></i> Login
						</button>
					</form>
				</div>
			</div>
			<div class="pad-ver">
				<a href="#" class="btn-link mar-rgt">Forgot password ?</a>
				<a href="#" class="btn-link mar-lft">Create a new account</a>
			</div>
		</div>
		<!--===================================================-->
		
		
		
		
	</div>
	<!--===================================================-->
	<!-- END OF CONTAINER -->
<?php eb();?>

<?php sb('js_and_css_footer'); ?>
<script src="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>login/js/main.js" type="text/javascript"></script>
<script src="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>login/js/login.min.js" type="text/javascript"></script>
<?php eb();?>
 
<?php render($MasterPage);?>