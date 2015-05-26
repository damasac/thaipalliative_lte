<?php require_once '../_theme/util.inc.php'; $MasterPage = 'page_main.php';?>

<?php sb('title');?> EMR <?php eb();?>

<?php sb('js_and_css_head'); ?>
<?php eb();?>

<?php sb('content_header');?>
  <h1>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">EMR</a></li>
  </ol>
<?php eb();?>

<?php sb('content');?>
<?php include "../_connection/db.php"; ?>
  <!-- Main content -->
<?php
  $sex[1]="ชาย";
  $sex[2]="หญิง";
  $sql="select *,floor(datediff(curdate(),birthdb)/365.25) as age from palliative_register where ptid_key = '".$mysqli->real_escape_string($_GET['ptid_key'])."';";
  $rst=$mysqli->query($sql);
  $row=$rst->fetch_assoc();
?>  
  
    <div class="box box-warning">
    <div class="box-body">
      <div class="row">
        
        <div class="col-sm-2">
            
                <div class="small-box bg-green">
                    <div class="inner" style="height: 175px;">
                      <h3>Info</h3>
                      <p>Activity Record</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="../form/register.php?dataid=<?php echo $_GET['ptid_key'];?>" class="small-box-footer">
                      More info <i class="fa fa-medkit"></i>
                    </a>
              </div>
    
        </div>
        
        <div class="col-sm-10" style="margin-bottom: -20px;">
            
            <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">ข้อมูลส่วนตัว</h3>
              <div class="box-tools pull-right">
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                <h3>รหัส : <?php echo $row['hospcode'];?> <?php echo $row['pid'];?> </h3>   
                <h4>ชื่อ - สกุล <?php echo mb_substr($row['name'],0,4,"UTF-8");?>... <?php echo mb_substr($row['lname'],0,4,"UTF-8");?>...</h4>
                <h4>เพศ : <?php echo $sex[$row['sex']];?> </h4>
                <h4>อายุ : <?php echo $row['age'];?> </h4> 
            </div><!-- /.box-body -->
          </div>

        </div>
      </div>
    </div>
  </div>

  
  <div class="box box-success">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-12">
        
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
                <th>OP</th>
              </tr>
            </thead>
            <tbody>
<?php
  $form[1]="register.php";
  $form[2]="treatment.php";
  $form[3]="followup.php";
  $sql="select formid,ptid_key,dataid,dadd, formname, hcode from tb_emr where ptid_key = '".$mysqli->real_escape_string($_GET['ptid_key'])."';";
  $rst=$mysqli->query($sql);
  while($row=$rst->fetch_assoc()) {
?>
              <tr>
                <td><?php $date = new DateTime($row['dadd']); echo $date->format('d/m/Y');?></td>
                <td><?php echo $row['formname'];?></td>
                <td><?php echo hospitalname($row['hcode']);?></td>
                <td><a href="../form/<?php echo $form[$row['formid']];?>?dataid=<?php echo $row['dataid'];?>" class="btn btn-block btn-success">Edit</a></td>
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
  
    <div class="box box-danger">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-12">
        
        <div class="pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-lg btn-danger"><span class="fa fa-plus-circle"></span>  EZ-Form</button>
                <button type="button" class="btn btn-lg btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
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
                <th>OP</th>
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
                <td> </td>
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

<?php eb();?>

<?php sb('js_and_css_footer');?>
  <!-- Data table script -->
<?php eb();?>
 
<?php render($MasterPage);?>

<?php
function hospitalname ($hcode) {
  global $mysqli;
  $sql="select name from all_hospital_thai where code5 = '$hcode';";
  $rst=$mysqli->query($sql);
  $row=$rst->fetch_assoc();
  return $row['name'];
}
?>