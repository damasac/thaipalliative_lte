<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>{$title}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>_bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>_plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>_bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Font Awesome Icons -->
    <link href="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>_plugins/icon-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!--Page Load Progress Bar [ OPTIONAL ]-->
	<link href="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>_plugins/pace/pace.css" rel="stylesheet">
	<script src="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>_plugins/pace/pace.js"></script>
    <!-- Theme style -->
    <link href="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>_dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    {$js_and_css_head}
  </head>
  
    <body>
        {$content}
    </body>
    {$js_and_css_footer}
</html>