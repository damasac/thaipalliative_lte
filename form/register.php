<?php require_once '../_theme/util.inc.php'; $MasterPage = 'page_main.php';?>

<?php sb('title');?> Register <?php eb();?>

<?php sb('js_and_css_head'); ?>
<script language="javascript">
function calAge(o){
     var tmp = o.value.split("-");
     var current = new Date();
     var current_year = current.getFullYear();
     document.getElementById("age").value = current_year - tmp[0];
}
</script>
<?php eb();?>

<?php sb('content_header');?>
<link rel="stylesheet" href="../_plugins/datepicker-th/datepicker.css">
<link href="../_plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
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
<?php

/** Connect CASCAP database. */
include_once "../_connection/db_cascap.php";

$res = $mysqli->query("SELECT * FROM palliative_register")or die('[' . $mysqli->error . ']');
$numGroup = $res->num_rows;
$fields = $res->fetch_fields();

//echo "<pre>"; echo $fields[1]->name; echo "</pre>";
$cascap = 0;
$insert = 0;
isset($_GET['cascap'])? $cascap = $_GET['cascap'] : '';
isset($_GET['insert'])? $insert = $_GET['insert'] : '';

//echo $cascap.":".$insert;

if(0 == $cascap && $insert != 1){
  /** CRUD register. */
  $dataid = '';
  isset($_GET['dataid'])? $dataid = $_GET['dataid'] : '';
  $sql = "SELECT *, floor(datediff(curdate(),birth)/365.25) as birthdb FROM palliative_register WHERE ptid = '".$dataid."';";
  $res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
  $dbarr = $res->fetch_array();
}else{
  if(0 == $cascap){
    $dataid = '';
    isset($_GET['dataid'])? $dataid = $_GET['dataid'] : '';
    $sql = "SELECT *, floor(datediff(curdate(),birth)/365.25) as birthdb FROM palliative_register WHERE ptid = '".$dataid."';";
    $res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
    $dbarr = $res->fetch_array();

    //echo '<pre>';
    //print_r($dbarr);

    $dbarr['ptid'] = 0;
    $dbarr['2'] = $_SESSION['tpc_puser_hcode'];
    $dbarr['3'] = '';
    $dbarr['4'] = '';
  }else{
    echo $cascap;
    $stmt = $mysqli_cascap->prepare('SELECT c, o, d, e, e,
                                        regdate AS createdate,
                                        cid AS ssn,
                                        bdatedb AS birth,
                                        age AS age,
                                        title AS prename,
                                        name AS name,
                                        surname AS lname,
                                        v3 AS sex,
                                        AS nation,
                                        AS nationx,
                                        AS race,
                                        AS racex,
                                        AS religion,
                                        AS religionx,
                                        AS house,
                                        AS moo,
                                        AS village,
                                        AS lane,
                                        AS road,
                                        AS tambon,
                                        AS ampur,
                                        AS changwat,
                                        AS zipcode,
                                        AS tel,
                                        AS mstatus,
                                        AS mstatusx,
                                        AS privilege,
                                        AS privilegex,
                                        AS occupa,
                                        AS occupax,
                                        AS congenital_disease,
                                        AS congenital_disease2,
                                        AS congenital_disease3,
                                        AS congenital_disease4,
                                        AS congenital_disease5,
                                        AS congenital_diseasex,
                                        AS history,
                                        AS historyx,
                                        AS update_by,
                                        AS create_by,
                                        AS update_time
                                      FROM patient
                                      WHERE cid LIKE ? AND ptid = ptid_key');
    $stmt->bind_param('s', $param);
    $stmt->execute();
    $result = $stmt->get_result();
    $dbarr = $result->fetch_array();

    $dbarr['ptid'] = 0;
    $dbarr['2'] = $_SESSION['tpc_puser_hcode'];
    $dbarr['3'] = '';
    $dbarr['4'] = '';
  }
}
//echo "<pre>".$sql; print_r($dbarr); echo "</pre>";
if($dbarr['ptid']){
    $task = 'update';
}else {
    $task = 'save';
}
?>

    <div class="info-box">
    <span class="info-box-icon btn-foursquare" style="background-color: #3C8DBC;"><i class="fa fa-user-plus"></i></span>
    <div class="info-box-content">
      <span class="info-box-text"><h4>Register Form</h4></span>
      <span class="info-box-text">
        แบบลงทะเบียนผู้ป่วย ศูนย์การุณรักษ์ (Palliative Care Center)
      </span>
    </div>
  </div>

    <div class="box">
    <div class="box-body">

    <form id="frm-register" onsubmit="frm_register(); return false;" action="#">
        <div class="row" style="padding: 25px 25px 25px 25px;">

        <div class="form-group col-lg-6">
          <label>HOSPCODE: </label>
          <input type="hidden" id="task" name="task" value="<?php echo $task; ?>" />
          <input type="text" name="<?php $i=2; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" readonly minlength=5 maxlength=5 required>
        </div>

        <div class="form-group col-lg-6">
          <label>PID: </label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" readonly minlength=5 maxlength=5 required>
        </div>

          <div class="form-group col-lg-4">
          <label>1. HN: </label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>

        <div class="form-group col-lg-8">
          <label>2. วันที่ลงทะเบียน: </label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo substr($dbarr[$i],0,10); ?>" data-provide="datepicker" data-date-language="th-th" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
        </div>

        <div class="form-group col-lg-12">
          <label>3. เลขที่บัตรประจำตัวประชาชน: </label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" minlength=13 maxlength=13 required>
        </div>

        <div class="form-group col-lg-10">
          <label>4. วันเดือนปีเกิด</label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" onchange="calAge(this);"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required>
        </div>

        <div class="form-group col-lg-2">
          <label>5. อายุ</label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="age" value="<?php echo $dbarr[$i]; ?>" required>
        </div>

        <div class="form-group col-lg-3">
          <label>6.1 คำนำหน้า</label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control" required>
        </div>

        <div class="form-group col-lg-4">
          <label>6.1 ชื่อ</label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control" required>
        </div>

        <div class="form-group col-lg-5">
          <label>6.3 นามสกุล</label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control" required>
        </div>


        <div class="form-group col-lg-5">
          <div class='showForm'><label>7. เพศ</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1' required>&nbsp;&nbsp;ชาย</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2' required>&nbsp;&nbsp;หญิง</label></div>
          </div>
          </div>

        <div class="form-group col-lg-7">
          <div class='showForm'><label>8. สัญชาติ</label><br>
          <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1' required>&nbsp;&nbsp;ไทย</label></div>
          <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2' required>&nbsp;&nbsp;อื่นๆ</label>&nbsp;&nbsp;
            <input type='text' class='' name='<?php $i++; echo $fields[$i]->name;?>' id='<?php echo $fields[$i]->name;?>' value='<?php echo $dbarr[$i]; ?>'/></div></div>
        </div>

        <div class="form-group col-lg-5">
          <div class='showForm'><label>9. เชื้อชาติ</label><br>
          <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1' required>&nbsp;&nbsp;ไทย</label></div>
          <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2' required>&nbsp;&nbsp;อื่นๆ</label>&nbsp;&nbsp;
            <input type='text' class='' name='<?php $i++; echo $fields[$i]->name;?>' id='<?php echo $fields[$i]->name;?>' value='<?php echo $dbarr[$i]; ?>'/></div></div>
        </div>

        <div  class="form-group col-lg-7">
          <div class='showForm'><label>10. ศาสนา</label><br>
          <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1' required>&nbsp;&nbsp;พุทธ</label></div>
          <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2' required>&nbsp;&nbsp;คริสต์</label></div>
          <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='3' ? 'checked' : ''; ?> value='3' required>&nbsp;&nbsp;อิสลาม</label></div>
          <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='4' ? 'checked' : ''; ?> value='4' required>&nbsp;&nbsp;อื่นๆ</label>&nbsp;&nbsp;
            <input type='text' class='' name='<?php $i++; echo $fields[$i]->name;?>' id='<?php echo $fields[$i]->name;?>' value='<?php echo $dbarr[$i]; ?>'/></div></div>
        </div>

        <div class="form-group col-lg-12">
          <label>11. </label>
            <div class="row">
              <div class="col-lg-2">
                บ้านเลขที่<input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control">
              </div>
              <div class="col-lg-2">
                หมู่ที่<input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control">
              </div>
               <div class="col-lg-2">
                หมู่บ้าน<input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control">
              </div>
               <div class="col-lg-3">
                ซอย<input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control">
              </div>
               <div class="col-lg-3">
                ถนน<input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control">
              </div>
            </div>
        </div>

        <div class="form-group col-lg-12">
            <div class="row">
               <div class="col-lg-3">
     ตำบล<select type="dropdown" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" required id="tambonSelect">
          <option value="0">- ค้นจากชื่อตำบล -</option>
     </select>
              </div>
           
               <div class="col-lg-3">
                อำเภอ<select type="dropdown" name="<?php $i++; echo $fields[$i]->name;?>" id="amphurSelect" class="form-control" readonly=true required></select>
              </div>
              <div class="col-lg-3">
                จังหวัด<select type="text" name="<?php $i++; echo $fields[$i]->name;?>" id="provinceSelect" class="form-control" readonly=true required></select>
              </div>
              <div class="col-lg-3">
                รหัสไปรษณีย์<input type="text" name="<?php $i++; echo $fields[$i]->name;?>" id="postcodeSelect" class="form-control">
              </div>
            </div>
        </div>

         <div class="form-group col-lg-12">
          <label>12. หมายเลขโทรศัพท์สำหรับติดต่อ</label>
            <div class="row">
              <div class="col-lg-4">
                หมายเลขโทรศัพท์ 1.<input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
              </div>
              <div class="col-lg-4">
                หมายเลขโทรศัพท์ 2.<input type="text" name="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
              </div>
              <div class="col-lg-4">
                หมายเลขโทรศัพท์ 3.<input type="text" name="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
              </div>
              </div>
            </div>


        <div class="form-group col-lg-12">
          <div class='showForm'><label>13. สถานภาพ</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;โสด</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>&nbsp;&nbsp;แต่งงาน</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='3' ? 'checked' : ''; ?> value='3'>&nbsp;&nbsp;แยก/หย่า</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='4' ? 'checked' : ''; ?> value='4'>&nbsp;&nbsp;หม้าย</label></div>
               <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='5' ? 'checked' : ''; ?> value='5'>&nbsp;&nbsp;อื่นๆ</label>&nbsp;&nbsp;
            <input type='text' class='' name='<?php $i++; echo $fields[$i]->name;?>' id='<?php echo $fields[$i]->name;?>' value='<?php echo $dbarr[$i]; ?>'/></div>
          </div>
        </div>

      <div class="form-group col-lg-12">
          <div class='showForm'><label>14. สิทธิ์การรักษา</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;บัตรทอง</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>&nbsp;&nbsp;ข้าราชการ</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='3' ? 'checked' : ''; ?> value='3'>&nbsp;&nbsp;ประกันสังคม</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='4' ? 'checked' : ''; ?> value='4'>&nbsp;&nbsp;รัฐวิสาหกิจ</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='5' ? 'checked' : ''; ?> value='5'>&nbsp;&nbsp;จ่ายเอง</label></div>
             <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='6' ? 'checked' : ''; ?> value='6'>&nbsp;&nbsp;อื่นๆ</label>&nbsp;&nbsp;
            <input type='text' class='' name='<?php $i++; echo $fields[$i]->name;?>' id='<?php echo $fields[$i]->name;?>' value='<?php echo $dbarr[$i]; ?>'/></div>
          </div>
        </div>

        <div class="form-group col-lg-12">
          <div class='showForm'><label>15. อาชีพ</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;ข้าราชการ/รัฐวิสาหกิจ</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>&nbsp;&nbsp;ค้าขาย</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='3' ? 'checked' : ''; ?> value='3'>&nbsp;&nbsp;ข้าราชการบำนาญ</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='4' ? 'checked' : ''; ?> value='4'>&nbsp;&nbsp;รับจ้าง</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='5' ? 'checked' : ''; ?> value='5'>&nbsp;&nbsp;เกษตรกร</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='6' ? 'checked' : ''; ?> value='6'>&nbsp;&nbsp;นักบวช</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='7' ? 'checked' : ''; ?> value='7'>&nbsp;&nbsp;ไม่ได้ประกอบอาชีพ</label></div><br>
             <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='8' ? 'checked' : ''; ?> value='8'>&nbsp;&nbsp;อื่นๆ</label>&nbsp;&nbsp;
            <input type='text' class='' name='<?php $i++; echo $fields[$i]->name;?>' id='<?php echo $fields[$i]->name;?>' value='<?php echo $dbarr[$i]; ?>'/></div>
          </div>
        </div>

        <div  class="form-group col-lg-12">
          <div class='showForm'><label>16. โรคประจำตัว (เลือกได้มากกว่าหนึ่งคำตอบ)</label><br>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;เบาหวาน</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>&nbsp;&nbsp;โรคหัวใจ</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='3' ? 'checked' : ''; ?> value='3'>&nbsp;&nbsp;โรคไต</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='4' ? 'checked' : ''; ?> value='4'>&nbsp;&nbsp;ความดันโลหิตสูง</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='5' ? 'checked' : ''; ?> value='5'>&nbsp;&nbsp;อื่นๆ</label>&nbsp;&nbsp;
            <input type='text' class='' name='<?php $i++; echo $fields[$i]->name;?>' id='<?php echo $fields[$i]->name;?>' value='<?php echo $dbarr[$i]; ?>'/></div></div>
        </div>

        <div  class="form-group col-lg-12">
          <div class='showForm'><label>17. ประวัติการรักษาด้วยแพทย์ทางเลือก/สมุนไพร</label><br>
          <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>ไม่มี</label></div>
          <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>มี</label>&nbsp;&nbsp;
            <input type='text' class='' name='<?php $i++; echo $fields[$i]->name;?>' id='<?php echo $fields[$i]->name;?>' value='<?php echo $dbarr[$i]; ?>'/></div></div>
        </div>

            <div class="form-group col-lg-12">
              <label></label>
            <div class="row">
              <div class="col-lg-4">
                Form completed by<input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
              </div>
              <div class="col-lg-4">
                รหัสที่ได้จากระบบ<input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
              </div>
              <div class="col-lg-4">
                Date<input type="date" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
              </div>
              </div><hr>
            </div>


            <div class="form-group col-lg-6">
                <button class="btn btn-block btn-success btn-lg">Submit</button>
            </div>
            <div class="form-group col-lg-6">
                <button class="btn btn-block btn-danger btn-lg">Cancel</button>
            </div>

        </div>
        </form>

    </div>
  </div>

  <pre><div id="div-onsave"></div></pre>

<?php eb();?>

<?php sb('js_and_css_footer');?>
<script type="text/javascript" src="../_plugins/bootstrap3-dialog/bootstrap-dialog.min.js"></script>
<script type="text/javascript" src="../_plugins/datepicker-th/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="../_plugins/datepicker-th/bootstrap-datepicker-thai.js"></script>
<script type="text/javascript" src="../_plugins/datepicker-th/locales/bootstrap-datepicker.th.js"></script>

<script src="../_plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="../_plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="../_plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>

<script src="../_plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../_plugins/bootstrap3-dialog/bootstrap-dialog.min.css">
<link rel="stylesheet" href="../_plugins/js-select2/select2.css">
<script type="text/javascript" src="../_plugins/js-select2/select2.js"></script>
<script>
$(document).ready(function(){
  $('input').iCheck({
     checkboxClass: 'icheckbox_minimal-blue',
     radioClass: 'iradio_minimal-blue',
     increaseArea: '20%' // optional
  });
  $("[data-mask]").inputmask();
});
</script>
<script>
    function frm_register() {
        var ptid = '<?php echo $_GET['dataid']; ?>';
        var datalist=$('#frm-register').serialize();

        $('#frm-group').hide();
        $('#div-onsave').html('<br><br><p class="text-center"><img width="50" hight="20" src="../img/ajax-loading.gif"></p><br><br>');
        $.ajax({
                url : "ajax-register-save.php?ptid="+ptid,
                type:"POST",
                data : datalist,
                success : function(returndata) {
                    $("#div-onsave").html(returndata);
                },
                error : function(xhr, statusText, error) {
                    System_Notice("Error! Could not retrieve the data.",'danger');
                }
        });
    }

</script>
<!--Query province amphur tambon By Ball-->
<script>
     $('.datepicker').datepicker();
     $("#tambonSelect").select2();
     $(function(){
          $(".select2-input").attr("id","textSearch");
      $("#textSearch").on('keyup', function(e){
          if (e.keyCode>3) {
            var txtSearch = $(this).val();
               $.getJSON("ajax-area-loaddata.php?task=getaddress&txtSearch="+txtSearch+"",function(result){
                    console.log(result);
                       $("#tambonSelect").html("<option value='0'>- ค้นหาตำบล -</option>");
                       $.each(result, function(i, field){
                             $("#tambonSelect").append("<option value="+field.DISTRICT_CODE+" >ต. "+field.DISTRICT_NAME+" : อ."+field.AMPHUR_NAME+" : จ."+field.PROVINCE_NAME+"</option>");

                       });
                    });
                 }
             });
         });
          //code
          $("#tambonSelect").on("change",function(){
              var tambon = $("#tambonSelect").val();
              var tambontext = $("#tambonSelect option:selected").text();
              var splittambon = tambontext.split(" : ");
              var tambontext = splittambon[0];
              var splittambon2 = tambontext.split(".");
              var tambontext2 = splittambon2[1];
              console.log(tambontext);
               $(".select2-chosen").html("<option >"+tambontext2+"</option");
               $.getJSON("ajax-area-loaddata.php?task=getaddress2&tambon="+tambon+"",function(result){
                       $.each(result, function(i, field){
                              $("#provinceSelect").html("<option value="+field.PROVINCE_CODE+">"+field.PROVINCE_NAME+"</option>");
                              $("#amphurSelect").html("<option value="+field.AMPHUR_CODE+">"+field.AMPHUR_NAME+"</option>");
                              $("#postcodeSelect").attr("value",field.POSTCODE);
                       });
               });
          });

</script>
<?php eb();?>

<?php $mysqli->close(); ?>

<?php render($MasterPage);?>
