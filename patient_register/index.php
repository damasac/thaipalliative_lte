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
          <a class="btn btn-default" id="user" href="../eform"><strong>เพิ่ม Ez Form</strong></a>
      </span>
    </div>
  </div>
  <div class="box">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>HCODE</th>
                <th>PTID</th>
                <th>ชื่อ - สกุล</th>
                <th>เพศ</th>
                <th>อายุ</th>
                <th>OP</th>
              </tr>
            </thead>
            <tbody>
<?php
  $sex[1]="ชาย";
  $sex[2]="หญิง";
  $sql="select * from palliative_register where hospcode like '{$_SESSION[tpc_puser_hcode]}'";
  $rst=$mysqli->query($sql);
  while($row=$rst->fetch_assoc()) {
?>
              <tr>
                <td><?php echo $row[hospcode];?></td>
                <td><?php echo $row[pid];?></td>
                <td><?php echo $row[name];?> <?php echo $row[lname];?></td>
                <td><?php echo $sex[$row[sex]];?></td>
                <td><?php echo $row[birth];?></td>
                <td> </td>
              </tr>
<?php
  }
?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php eb();?>

<?php sb('js_and_css_footer');?>
  <!-- Data table script -->
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