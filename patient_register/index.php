<?php require_once '../_theme/util.inc.php'; $MasterPage = 'page_main.php';?>

<?php sb('title');?> Register <?php eb();?>

<?php sb('js_and_css_head'); ?>
<link href="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>_plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<script src=""></script>
<?php eb();?>

<?php sb('content_header');?>
<?php include "../_connection/db.php"; ?>
  <h1>
    <small><h4><?php echo hospitalname($_SESSION['tpc_puser_hcode']);?> (<?php echo $_SESSION['tpc_puser_hcode'];?>)</h4></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Register</a></li>
  </ol>
<?php eb();?>

<?php sb('content');?>

  <!-- Main content -->
  <div class="info-box">
    <span class="info-box-icon btn-foursquare" style="background-color: #3C8DBC;"><i class="fa fa-user-plus"></i></span>
    <div class="info-box-content">
      <span class="info-box-text"><h4>การให้บริการ Palliative Care</h4></span>
      <span class="info-box-text">
          <a class="btn btn-default" id="user" href="search.php"><i class="fa fa-fw fa-bed"></i>  <strong>เพิ่มข้อมูลผู้ป่วยใหม่</strong></a>
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
                <th>PTCODE</th>
                <th>HN</th>
                <th>ชื่อ</th>
                <th>สกุล</th>
                <th align="center">เพศ</th>
                <th>อายุ</th>
                <th>เข้าดูข้อมูล</th>
              </tr>
            </thead>
            <tbody>
<?php
  $sex[1]="ชาย";
  $sex[2]="หญิง";
  $sql="select *,floor(datediff(curdate(),birth)/365.25) as age from palliative_register where hospcode like '{$_SESSION['tpc_puser_hcode']}'";
  $rst=$mysqli->query($sql);
  while($row=$rst->fetch_assoc()) {
?>
              <tr>
                <td><?php echo $row['hospcode'];?></td>
                <td><?php echo $row['pid'];?></td>
                <td><?php echo $row['hn'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['lname'];?></td>
                <td align="center"><?php echo $sex[$row['sex']];?></td>
                <td><?php echo $row['age'];?> <?php if ($row['age']+0>0) echo "ปี";?></td>
                <td><a href="../emr/?ptid_key=<?php echo $row['ptid_key'];?>" class="btn btn-block btn-success">EMR</a></td>
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