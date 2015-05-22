<?php require_once '../theme/util.inc.php'; $MasterPage = 'page_main.php';?>

<?php sb('title');?> Register <?php eb();?>

<?php sb('js_and_css_head'); ?>
<script src=""></script>
<?php eb();?>

<?php sb('content');?>
<?php include "../connection/db.php"; ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Register
            <small>ลงทะเบียน</small>
          </h1>
          <p></p>
        </section>

        <!-- Main content -->
        <section class="content">

          Codeerror

        </section><!-- /.content -->
<?php eb();?>


<?php sb('js_and_css_footer');?>
test
<?php eb();?>
 
<?php render($MasterPage);?>