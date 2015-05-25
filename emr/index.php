<?php require_once '../_theme/util.inc.php'; $MasterPage = 'page_main.php';?>

<<<<<<< Updated upstream
<?php sb('title');?> EMR <?php eb();?>

<?php sb('js_and_css_head'); ?>
=======
<?php sb('title');?> Register <?php eb();?>

<?php sb('js_and_css_head'); ?>
<link href="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>_plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<script src=""></script>
>>>>>>> Stashed changes
<?php eb();?>

<?php sb('content_header');?>
  <h1>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<<<<<<< Updated upstream
    <li><a href="#">EMR</a></li>
=======
    <li><a href="#">Register</a></li>
>>>>>>> Stashed changes
  </ol>
<?php eb();?>

<?php sb('content');?>
<?php include "../_connection/db.php"; ?>
  <!-- Main content -->
  <div class="info-box">
    <span class="info-box-icon btn-foursquare" style="background-color: #3C8DBC;"><i class="fa fa-user-plus"></i></span>
    <div class="info-box-content">
<<<<<<< Updated upstream
      <span class="info-box-text"><h4>Activity Record</h4></span>
    </div>
  </div>
  
=======
      <span class="info-box-text"><h4>EMR</h4></span>
      <span class="info-box-text">
          <a class="btn btn-default" id="user" href="search.php"><strong>เพิ่มข้อมูล</strong></a>
          <a class="btn btn-default" id="user" href="../eform"><strong>เพิ่ม Ez Form</strong></a>
      </span>
    </div>
  </div>
>>>>>>> Stashed changes
  <div class="box">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-12">
<<<<<<< Updated upstream
        
        <div class="pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-lg btn-success"><span class="fa fa-plus-circle"></span>  New Form</button>
                <button type="button" class="btn btn-lg btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#"><span class="fa fa-plus-circle"></span> Follow-up Form</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><span class="fa fa-plus-circle"></span> Treatment Form</a></li>
                </ul>
              </div>
            
        </div>
        <div class="h3">Electronic Medical Record (EMR)</div>
        <hr>
        
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr style="background-color: #c9c9c9;">
                <th>วันที่</th>
                <th>แบบฟอร์ม/ข้อมูลการรักบริการ</th>
                <th>หน่วยงาน</th>
=======
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>วันที่</th>
                <th>การได้รับบริการ</th>
                <th>หน่วยงาน</th>
                <th>OP</th>
>>>>>>> Stashed changes
              </tr>
            </thead>
            <tbody>
<?php
<<<<<<< Updated upstream
  $sql="select dadd, formname, hcode from tb_emr where ptid_key = '".$mysqli->real_escape_string($_GET['ptid_key'])."';";
=======
  $sex[1]="ชาย";
  $sex[2]="หญิง";
  echo $sql="select * from tb_emr where ptid_key='{$_GET[ptid]}'";
>>>>>>> Stashed changes
  $rst=$mysqli->query($sql);
  while($row=$rst->fetch_assoc()) {
?>
              <tr>
<<<<<<< Updated upstream
                <td><?php $date = new DateTime($row['dadd']); echo $date->format('d/m/Y');?></td>
                <td><?php echo $row['formname'];?></td>
                <td><?php echo $row['hcode'];?></td>
=======
                <td><?php echo $row[hospcode];?></td>
                <td><?php echo $row[pid];?></td>
                <td><?php echo $row[hn];?></td>
                <td><?php echo $row[name];?></td>
                <td><?php echo $row[lname];?></td>
                <td><?php echo $sex[$row[sex]];?></td>
                <td><?php echo $row[age];?></td>
                <td> </td>
>>>>>>> Stashed changes
              </tr>
<?php
  }
?>
            </tbody>
          </table>
<<<<<<< Updated upstream
          
=======
>>>>>>> Stashed changes
        </div>
      </div>
    </div>
  </div>
<<<<<<< Updated upstream
  
    <div class="box">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-12">
        
        <div class="pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-lg btn-success"><span class="fa fa-plus-circle"></span>  EZ-Form</button>
                <button type="button" class="btn btn-lg btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#"><span class="fa fa-plus-circle"></span> My Form</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><span class="fa fa-plus-circle"></span> Public Form</a></li>
                </ul>
              </div>
            
        </div>
        <div class="h3">Sub-study by Easy Form (EZ-Form)</div>
        <hr>
        
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr style="background-color: #c9c9c9;">
                <th>วันที่</th>
                <th>ข้อมูลจาก EZ-Form</th>
                <th>หน่วยงาน</th>
              </tr>
            </thead>
            <tbody>
<?php
  //$sql="select dadd, formname, hcode from tb_emr where ptid_key = '".$mysqli->real_escape_string($_GET['ptid_key'])."';";
  //$rst=$mysqli->query($sql);
  //while($row=$rst->fetch_assoc()) {
?>
              <tr>
                <td><?php $date = new DateTime($row['dadd']); echo $date->format('d/m/Y');?></td>
                <td><?php echo $row['formname'];?></td>
                <td><?php echo $row['hcode'];?></td>
              </tr>
<?php
  //}
?>
            </tbody>
          </table>
          
        </div>
      </div>
    </div>
  </div>

=======
>>>>>>> Stashed changes
<?php eb();?>

<?php sb('js_and_css_footer');?>
  <!-- Data table script -->
<<<<<<< Updated upstream
=======
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
>>>>>>> Stashed changes
<?php eb();?>
 
<?php render($MasterPage);?>