<?php require_once '../_theme/util.inc.php'; $MasterPage = 'page_main.php';?>

<?php sb('title');?> Register <?php eb();?>

<?php sb('js_and_css_head'); ?>
<link href="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>_plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<script src=""></script>
<?php eb();?>

<?php sb('content_header');?>
          <h1>
            Search
            <small>ค้นหาข้อมูล</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Register</a></li>
            <li><a href="#">Search</a></li>
          </ol>
<?php eb();?>

<?php sb('content');?>
<?php include "../_connection/db.php"; ?>
	<!-- Main content -->
        <div class="box">
          <div class="box-body">
            <div class="row">
              <div class="col-sm-12">
              	<form class="form-inline">
				  <div class="form-group">
				    <label for="ssn">เลขบัตรประจำตัวประชาชน</label>
				    <input type="text" class="form-control" id="ssn">
				  </div>
				  <button type="button" id="btnssn" class="btn btn-default" title="ค้นหา"><i class="fa fa-search">
	                	</i></button>
				</form>
				<br/>
				<div id="tb_content">
				</div>
              </div>
            </div>
          </div>
        </div>
<?php eb();?>


<?php sb('js_and_css_footer');?>
  <!-- DATA TABES SCRIPT -->
    <script src="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>_plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>_plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

    <script type="text/javascript">
      $(document).ready(function(){
		    $("#btnssn").click(function(){
		        $.post("search_ssn.php",
		        {
		          ssn: $('#ssn').val()
		        },
		        function(data,status){
		            //alert("Data: " + data + "\nStatus: " + status);
		            if (data) {
		            	$('#tb_content').html(data);
					}else{
						$('#tb_content').html('<tr class="odd"><td class="dataTables_empty" colspan="5" valign="top">No data available in table</td></tr>');
					}
		        });
		    });
		});
    </script>

<?php eb();?>
 
<?php render($MasterPage);?>