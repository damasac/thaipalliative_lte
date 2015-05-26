<?php require_once '../_theme/util.inc.php'; $MasterPage = 'page_main.php';?>

<?php sb('title');?> EMR <?php eb();?>

<?php sb('js_and_css_head'); ?>
<link rel="stylesheet" href="../_plugins/js-select2/select2.css">
<link rel="stylesheet" href="../_plugins/js/jquery.datetimepicker.css">
<link rel="stylesheet" href="../eform/style/style.css">
<?php eb();?>

<?php sb('content_header');?>
<?php eb();?>

<?php sb('content');?>
<?php include "../_connection/db.php"; ?>
<ol class="breadcrumb">
   <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
   <li><a href="#">EMR</a></li>
</ol>
      
<?php
  $sex[1]="ชาย";
  $sex[2]="หญิง";
  $sql="select *,floor(datediff(curdate(),birth)/365.25) as age from palliative_register where ptid_key = '".$mysqli->real_escape_string($_GET['ptid_key'])."';";
  $rst=$mysqli->query($sql);
  $row=$rst->fetch_assoc();
?>  

<!-- Main content -->
    <div class="box box-warning">
    <div class="box-body">
      <div class="row">
        
        <div class="col-sm-2">
            
                <div class="small-box bg-green">
                    <div class="inner" style="height: 120px;">
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
                <div class="col-sm-3"><button class="btn btn-block btn-primary btn-sm">รหัสผู้ป่วย</button></div>
                <div class="col-sm-5"><h4><?php echo $row['hospcode'];?> <?php echo $row['pid'];?> </h4></div>
                <div class="col-sm-2"><button class="btn btn-block btn-primary btn-sm">เพศ</button></div>
                <div class="col-sm-2"><h4><?php echo $sex[$row['sex']];?> </h4></div>                

                <div class="col-sm-3"><button class="btn btn-block btn-primary btn-sm">ชื่อ - สกุล</button></div>
                <div class="col-sm-5"><h4><?php echo mb_substr($row['name'],0,4,"UTF-8");?>... &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo mb_substr($row['lname'],0,4,"UTF-8");?>...</h4></div>
                <div class="col-sm-2"><button class="btn btn-block btn-primary btn-sm">อายุ</button></div>
                <div class="col-sm-2"><h4><?php echo $row['age'];?>&nbsp;&nbsp;&nbsp; ปี</h4></div>                     

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
        
        <div class="table-responsive">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr style="background-color: #c9c9c9;">
                <th>วันที่</th>
                <th>แบบฟอร์ม/ข้อมูลการรักบริการ</th>
                <th>หน่วยงาน</th>
                <th>แก้ไขข้อมูล</th>
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
<?php
  if ($_SESSION['tpc_puser_hcode'] == $row['hcode']) {
?>
                <td><a href="../form/<?php echo $form[$row['formid']];?>?dataid=<?php echo $row['dataid'];?>" class="btn btn-block btn-success"><i class="fa fa-fw fa-edit"></i> Edit</a></td>
<?php
  }else{
?>
                <td><a href="../form/<?php echo $form[$row['formid']];?>?dataid=<?php echo $row['dataid'];?>" class="btn btn-block btn-warning"><i class="fa fa-fw fa-file-text-o"></i> View</a></td>
<?php
  }
?>
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
                  <li><a style="cursor: pointer;" onclick="popup_ezform('myform', '<?php echo $_GET["ptid_key"]; ?>');"><span class="fa fa-plus-circle"></span> My Form</a></li>
                  <li class="divider"></li>
                  <li><a style="cursor: pointer;" onclick="popup_ezform('public', '<?php echo $_GET["ptid_key"]; ?>');"><span class="fa fa-plus-circle"></span> Public Form</a></li>
                  <li class="divider"></li>
                  <li><a href="../eform" target="_blank"><span class="fa fa-plus-circle"></span> Go to EZ-Form</a></li>
                </ul>
              </div>
            
        </div>
        <div class="h3">Sub-study by Easy Form (EZ-Form)</div>
        <hr>
        
        <a name="ezform"></a>
        <div id="div-ezform" class="table-responsive">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr style="background-color: #c9c9c9;">
                <th>วันที่</th>
                <th>ข้อมูลจาก EZ-Form</th>
                <th>หน่วยงาน</th>
                <th>แก้ไขข้อมูล</th>
              </tr>
            </thead>
            <tbody>
<?php
  $sql="select * from tb_substudy where pidadd = '".$_SESSION['tpc_puser_id']."' AND ptid_key = '".$_GET['ptid_key']."';";
  $rst=$mysqli->query($sql);
  while($row=$rst->fetch_assoc()) {
?>
              <tr>
                <td><?php $date = new DateTime($row['dadd']); echo $date->format('d/m/Y');?></td>
                <td><?php echo $row['formname'];?></td>
                <td><?php echo hospitalname($row['hcode']);?></td>
                <?php
if ($_SESSION['tpc_puser_hcode'] == $row['hcode']) {
?>
                <td><a onclick="load_ezform('<?php echo $row['formid']; ?>', '<?php echo $row['id']; ?>', '<?php echo $row['ptid_key']; ?>');" class="btn btn-block btn-success"><i class="fa fa-fw fa-edit"></i> Edit</a></td>
<?php
  }else{
?>
                <td><a  class="btn btn-block btn-warning"><i class="fa fa-fw fa-file-text-o"></i> View</a></td>
<?php
  }
?>
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
  </div>

<?php eb();?>

<?php sb('js_and_css_footer');?>
<script type="text/javascript" src="../_plugins/bootstrap3-dialog/bootstrap-dialog.min.js"></script>
<link rel="stylesheet" href="../_plugins/bootstrap3-dialog/bootstrap-dialog.min.css">

<link rel="stylesheet" href="../_plugins/js-select2/select2.css">
<script type="text/javascript" src="../_plugins/js-select2/select2.js"></script>

<script>
function popup_ezform(task, ptid_key) {

	dialogPopWindow = BootstrapDialog.show({
		title: 'Easy Form (EZ-Form)',
		cssClass: 'popup-dialog',
		size:'size-wide',
		draggable: false,
		message: $('<div></div>').load("../substudy/ajax-load-ezform.php?task="+task+"&ptid_key="+ptid_key+"&uid="+'<?php echo $_SESSION['tpc_puser_id']; ?>', function(data){
			//runSomeScript();
		}),
		onshown: function(dialogRef){ 
            $("#ezfrom").select2();
            //(".select2-input").attr("id","ezfrom");
		},
		onhidden: function(dialogRef){ 
			//alert('onhidden');
		}
	});
}

function load_ezform(formid, id, ptid_key) {
    $('#div-ezform').html('<br><br><p class="text-center"><img width="50" hight="20" src="../img/ajax-loading.gif"></p><br><br>');
    $.ajax({
         url : "../substudy/ezform.php?ptid_key="+ptid_key+"&idFormMain="+formid+"&id="+id,
        success : function(returndata) {
            $("#div-ezform").html(returndata);
            $('html,body').animate({scrollTop: $("a[name='ezform']").offset().top},'slow');
        },
        error : function(xhr, statusText, error) {
            //
        }
    });
   
}
    
</script>

<script type="text/javascript" src="../_plugins/js/jquery.datetimepicker.js"></script>
<script type="text/javascript" src="../_plugins/js-select2/select2.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script language="javascript" src="../eform/script/scriptGoogleForm.js"></script>
<script>
        $("select[data-attr]").select2();  
	$('input[data-attr=date]').datetimepicker({
		timepicker:false
	      });
    	$('input[data-attr=time]').datetimepicker({
		datepicker:false
	      });
    	$('input[data-attr=datetime]').datetimepicker({

	      });
</script>

<?php eb();?>
 
<?php render($MasterPage);?>

