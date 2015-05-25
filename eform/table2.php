<?php //error_reporting(0); ?>
<?php require_once '../_theme/util.inc.php'; $MasterPage = 'page_main.php';?>

<?php sb('title');?> Register <?php eb();?>

<?php sb('js_and_css_head'); ?>
<link rel="stylesheet" href="../_plugins/js-select2/select2.css">

<link rel="stylesheet" href="../_plugins/js/jquery.datetimepicker.css">
<link rel="stylesheet" href="style/style.css">
<?php eb();?>
<?php include "../_connection/db_sql.php"; ?>
<?php sb('content_header');?>
<?php

$idForm = $_GET["idFormMain"];
$MenuType="MenuEform";
$MenuSetting="tableform";
include("inc_menu.php");
?>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">Examples</a></li>
  <li class="active">Blank page</li>
</ol>
<?php eb();?>

<?php sb('content');?>
<div class="panel panel-default">
                        <div class="panel-body" style="height: auto;">
                            <div class="container-fluid">
                                <h2><i class="fa fa-database"></i>&nbsp;&nbsp;&nbsp;<?php echo $dataFormMain["tablename"] ?></h2>
                                <br>
		    	<div class="table-responsive">
			</div>
			    </div>
			</div>
</div>
<script>
    <?php if($dataFormMain["public_edit"]=="1"){?>
    function viewform(id){
	location.href="form.php?idFormMain=<?php echo $_GET["idFormMain"]?>&id="+id;
    }
    <?php }?>
</script>
<?php eb();?>
<?php sb('js_and_css_footer');?>
<script>

</script>
<script src="../_plugins/dataTables/jquery.dataTables.min.js"></script>
<script src="../_plugins/dataTables/dataTables.bootstrap.min.js"></script>
<link href="../_plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" type="text/css"></script>
<?php eb();?>
 
<?php render($MasterPage);?>