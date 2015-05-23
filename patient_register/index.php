<?php require_once '../_theme/util.inc.php'; $MasterPage = 'page_main.php';?>

<?php sb('title');?> Register <?php eb();?>

<?php sb('js_and_css_head'); ?>
<link href="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>_plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<script src=""></script>
<?php eb();?>

<?php sb('content_header');?>
          <h1>
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Register</a></li>
          </ol>
<?php eb();?>

<?php sb('content');?>
<?php include "../_connection/db.php"; ?>
        <!-- Main content -->
        <div class="info-box">
          <span class="info-box-icon btn-foursquare" style="background-color: #3C8DBC;"><i class="fa fa-user-plus"></i></span>
          <div class="info-box-content">
            <span class="info-box-text"><h4>ลงทะเบียน</h4></span>
            <span class="info-box-text">
                        <a class="btn btn-default" id="user" href="search.php"><strong>เพิ่มข้อมูล</strong></a>
            </span>
          </div>
        </div>
        <div class="box">
          <div class="box-body">
          <!-- <p class="text-right">
          <a class="btn btn-app" href="search.php">
            <i class="fa fa-user-plus"></i> เพิ่ม
          </a>
          </p> -->
            <div class="row">
              <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Trident</td>
                            <td>Internet
                              Explorer 4.0</td>
                            <td>Win 95+</td>
                            <td> 4</td>
                            <td>X</td>
                          </tr>
                        </tbody>
                </table>
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
      $(function () {
        $("#example2").dataTable();
        $('#example1').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>

<?php eb();?>
 
<?php render($MasterPage);?>