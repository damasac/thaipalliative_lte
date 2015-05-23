<?php
session_start();
session_destroy();
?>

<?php require_once '_theme/util.inc.php'; $MasterPage = 'page_blank.php';?>

<?php sb('title');?> Logout <?php eb();?>

<?php sb('js_and_css_head'); ?>
<script src=""></script>
<?php eb();?>

<?php sb('content');?>
        <!-- Content Header (Page header) -->
        <meta http-equiv="refresh" content="3;URL=index.php">
        
        <div class="lockscreen-logo">
        <b>Logout</b></a>
        </div>
        <div align="center"><img src="login/img/loading.gif" width="65" height="65" /><br>

        <!-- /.content -->
<?php eb();?>


<?php sb('js_and_css_footer');?>
<?php eb();?>
 
<?php render($MasterPage);?>