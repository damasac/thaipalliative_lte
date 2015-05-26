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
<link rel="stylesheet" href="../_plugins/datepicker-th/datepicker.css">
<link href="../_plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
<?php eb();?>

<?php sb('content_header');?>
<?php eb();?>

<?php sb('content');?>
<?php include "../_connection/db.php"; ?>
<ol class="breadcrumb">
   <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
   <li><a href="#">Register</a></li>
</ol>
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

$sql = "SELECT pid FROM palliative_register WHERE hospcode = ".$_SESSION['tpc_puser_hcode']." ORDER BY pid DESC LIMIT 1";
$res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
$pidarr = $res->fetch_assoc();

$pid_str = str_pad($pidarr['pid'] + 1, 4, '0', STR_PAD_LEFT);
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
    $sql = "SELECT *, floor(datediff(curdate(),birth)/365.25) as '8' FROM palliative_register WHERE ptid = '".$dataid."';";
    $res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
    $dbarr = $res->fetch_array();

    //echo $pid_str;
    //print_r($dbarr);

    $dbarr['ptid'] = 0;
    $dbarr['2'] = $_SESSION['tpc_puser_hcode'];
    $dbarr['3'] = $pid_str;
    $dbarr['4'] = '';
    $dbarr['5'] = date("d/m/Y");
  }else{
    function tis620_to_utf8($tis) {
      $utf8 = '';
      for( $i=0 ; $i< strlen($tis) ; $i++ ){
        $s = substr($tis, $i, 1);
        $val = ord($s);
        if( $val < 0x80 ){
          $utf8 .= $s;
        } elseif ((0xA1 <= $val and $val <= 0xDA)
        or (0xDF <= $val and $val <= 0xFB)) {
          $unicode = 0x0E00 + $val - 0xA0;
          $utf8 .= chr( 0xE0 | ($unicode >> 12) );
          $utf8 .= chr( 0x80 | (($unicode >> 6) & 0x3F) );
          $utf8 .= chr( 0x80 | ($unicode & 0x3F) );
        }
      }
      return $utf8;
    }

    $dataid = '';
    isset($_GET['dataid'])? $dataid = $_GET['dataid'] : '';
    $stmt = $mysqli_cascap->prepare("SELECT ptid, sitecode, ptcode, ptid_key, cid,
                                        regdate AS createdate,
                                        cid AS ssn,
                                        bdatedb AS birth,
                                        age AS age,
                                        title AS prename,
                                        name AS name,
                                        surname AS lname,
                                        v3 AS sex,
                                        '' AS nation,
                                        '' AS nationx,
                                        '' AS race,
                                        '' AS racex,
                                        '' AS religion,
                                        '' AS religionx,
                                        '' AS house,
                                        '' AS moo,
                                        '' AS village,
                                        '' AS lane,
                                        '' AS road,
                                        add1n6code AS tambon,
                                        add1n7code AS ampur,
                                        add1n8code AS changwat,
                                        '' AS zipcode,
                                        '' AS tel,
                                        '' AS mstatus,
                                        '' AS mstatusx,
                                        '' AS privilege,
                                        '' AS privilegex,
                                        '' AS occupa,
                                        '' AS occupax,
                                        '' AS congenital_disease,
                                        '' AS congenital_disease2,
                                        '' AS congenital_disease3,
                                        '' AS congenital_disease4,
                                        '' AS congenital_disease5,
                                        '' AS congenital_diseasex,
                                        '' AS history,
                                        '' AS historyx,
                                        '' AS update_by,
                                        '' AS create_by,
                                        '' AS update_time,
                                        floor(datediff(curdate(),bdatedb)/365.25) as '8'
                                      FROM patient
                                      WHERE cid LIKE ? AND ptid = ptid_key");
    $stmt->bind_param('s', $dataid);
    $stmt->execute();
    $result = $stmt->get_result();
    $dbarr = $result->fetch_array();

    //echo "<pre>";
    //print_r($dbarr);
    //exit;

    $dbarr['ptid'] = 0;
    $dbarr['2'] = $_SESSION['tpc_puser_hcode'];
    $dbarr['3'] = $pid_str;
    $dbarr['4'] = '';
    $dbarr['5'] = date("d/m/Y");
    $dbarr['9'] = tis620_to_utf8($dbarr['9']);
    $dbarr['10'] = tis620_to_utf8($dbarr['10']);
    $dbarr['11'] = tis620_to_utf8($dbarr['11']);
  }
}
//echo "<pre>".$sql; print_r($dbarr); echo "</pre>";
if($dbarr['ptid']){
    $task = 'update';
}else {
    $task = 'save';
}

  if ($dbarr['createdate']!="0000-00-00 00:00:00") {
     $dbarr['createdate']=substr($dbarr['createdate'],8,2).substr($dbarr['createdate'],5,2).substr($dbarr['createdate'],0,4);
  }
//print_r($dbarr);
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
          <input type="hidden" id="ptid_key" name="ptid_key" value="<?php echo $dbarr['ptid_key']; ?>" />
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
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo str_replace("0000-00-00","",substr($dbarr[$i],0,10)); ?>">
        </div>

        <div class="form-group col-lg-12">
          <label>3. เลขที่บัตรประจำตัวประชาชน: </label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" minlength=13 maxlength=13 required>
        </div>

        <div class="form-group col-lg-10">
          <label>4. วันเดือนปีเกิด</label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo str_replace("0000-00-00","",$dbarr[$i]); ?>" onchange="calAge(this);" required>
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
<?php
     if ($dbarr['tambon'] != "") {
?>
          <option value="<?php echo $dbarr['tambon'];?>">
<?php
     $sql="select DISTRICT_NAME from const_district where DISTRICT_CODE like '{$dbarr['tambon']}'";
    $res2 = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
    $tambon = $res2->fetch_array();
    echo $tambon['DISTRICT_NAME'];
?>
          </option>
<?php
     }else{
?>
          <option value="0">- ค้นจากชื่อตำบล -</option>
<?php
     }
?>

     </select>
              </div>

               <div class="col-lg-3">
                อำเภอ<select type="dropdown" name="<?php $i++; echo $fields[$i]->name;?>" id="amphurSelect" class="form-control" readonly=true required>
<?php
     if ($dbarr['ampur'] != "") {
?>
          <option value="<?php echo $dbarr['ampur'];?>">
<?php
     
     $sql="select AMPHUR_NAME from const_amphur where AMPHUR_CODE like '{$dbarr['ampur']}'";
    $res2 = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
    $amphur = $res2->fetch_array();
    echo $amphur['AMPHUR_NAME'];
?>
          </option>
<?php
     }
?>                    
                </select>
              </div>
              <div class="col-lg-3">
                จังหวัด<select type="text" name="<?php $i++; echo $fields[$i]->name;?>" id="provinceSelect" class="form-control" readonly=true required>
<?php
     if ($dbarr['changwat'] != "") {
?>
          <option value="<?php echo $dbarr['changwat'];?>">
<?php
     
     $sql="select PROVINCE_NAME from const_province where PROVINCE_CODE like '{$dbarr['changwat']}'";
    $res2 = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
    $amphur = $res2->fetch_array();
    echo $amphur['PROVINCE_NAME'];
?>
          </option>
<?php
     }
?>                                        
                </select>
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

 

<?php eb();?>

<?php sb('js_and_css_footer');?>
<script type="text/javascript" src="../_plugins/bootstrap3-dialog/bootstrap-dialog.min.js"></script>
<!-- InputMask -->
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
  $("#createdate").inputmask("d/m/9999", {"placeholder": "dd/mm/yyyy"});
  $("#birth").inputmask("d/m/9999", {"placeholder": "dd/mm/yyyy"});
  
});
</script>
<script>
    function frm_register() {
        var ptid = '<?php echo $_GET['dataid']; ?>';
        var datalist=$('#frm-register').serialize();

        //$('#div-onsave').html('<br><br><p class="text-center"><img width="50" hight="20" src="../img/ajax-loading.gif"></p><br><br>');
        $.ajax({
                url : "ajax-register-save.php?ptid="+ptid,
                type:"POST",
                data : datalist,
                success : function(returndata) {
                    if ($.trim(returndata)) {
                        popup_save($.trim(returndata));
                    }
                },
                error : function(xhr, statusText, error) {
                    System_Notice("Error! Could not retrieve the data.",'danger');
                }
        });
    }
    
function popup_save(ptid) {

	dialogPopWindow = BootstrapDialog.show({
		title: 'ผลการทำงาน',
		cssClass: 'popup-dialog',
		size:'size-wide',
		draggable: false,
		message: '<hr><h1 class="text-center"><b<span class="fa fa-check-circle"></span> บันทึกข้อมูลเรียบร้อย</b></h1><div class="form-group"><hr><div class="col-md-12"><a role="button" href="../emr/?ptid='+ptid+'" class="btn btn-lg btn-primary btn-block"><li class="fa fa-book"></li> ไปที่หน้า EMR</a></div></div>&nbsp;',
		onshown: function(dialogRef){ 
            $("#ezfrom").select2();
            //(".select2-input").attr("id","ezfrom");
		},
		onhidden: function(dialogRef){ 
			//alert('onhidden');
		}
	});
}

</script>

<!--Query province amphur tambon By Ball-->
<script>
     
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
