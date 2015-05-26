<?php
  session_start();

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

  function valid_citizen_id($personID)
  {

  if (strlen($personID) != 13) {
   return false;
  }

  $rev = strrev($personID); // reverse string ขั้นที่ 0 เตรียมตัว
  $total = 0;
  for($i=1;$i<13;$i++) // ขั้นตอนที่ 1 - เอาเลข 12 หลักมา เขียนแยกหลักกันก่อน
  {
   $mul = $i +1;
   $count = $rev[$i]*$mul; // ขั้นตอนที่ 2 - เอาเลข 12 หลักนั้นมา คูณเข้ากับเลขประจำหลักของมัน
   $total = $total + $count; // ขั้นตอนที่ 3 - เอาผลคูณทั้ง 12 ตัวมา บวกกันทั้งหมด
  }
  $mod = $total % 11; //ขั้นตอนที่ 4 - เอาเลขที่ได้จากขั้นตอนที่ 3 มา mod 11 (หารเอาเศษ)
  $sub = 11 - $mod; //ขั้นตอนที่ 5 - เอา 11 ตั้ง ลบออกด้วย เลขที่ได้จากขั้นตอนที่ 4
  $check_digit = $sub % 10; //ถ้าเกิด ลบแล้วได้ออกมาเป็นเลข 2 หลัก ให้เอาเลขในหลักหน่วยมาเป็น Check Digit

   if($rev[0] == $check_digit)  // ตรวจสอบ ค่าที่ได้ กับ เลขตัวสุดท้ายของ บัตรประจำตัวประชาชน
       return true; /// ถ้า ตรงกัน แสดงว่าถูก
   else
       return false; // ไม่ตรงกันแสดงว่าผิด

  }

  if(!valid_citizen_id($_POST['ssn'])){
    echo '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> เลขบัตรประจำตัวประชาชนไม่ถูกต้อง</h4>
                    กรุณาตรวจสอบเลขบัตรประจำตัวประชาชนหรือลองอีกครั้ง
                  </div>';
    exit;
  }

  /** Constant */
  $sex[1]="ชาย";
  $sex[2]="หญิง";

  /** Search from site user. */
	$hospcode = $_SESSION['tpc_puser_hcode'];
	isset($_POST['ssn']) ? $param = "{$_POST['ssn']}" : $param = '';
	include "../_connection/db.php";
	$stmt = $mysqli->prepare('SELECT `ptid`, `ptid_key`, `hospcode`, `pid`, `hn`, `ssn`, `birth`, floor(datediff(curdate(),birth)/365.25) as age, `prename`, `name`, `lname`, `sex` FROM palliative_register WHERE ssn LIKE ? AND hospcode = ?');
	$stmt->bind_param('ss', $param, $hospcode);
	$stmt->execute();

  /** init table. */
	$javascript = '<script>$(function () {
        $("#example1").dataTable();
        $("#example2").dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
      </script>';

  /** Create table. */
	$table = '<table id="example2" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>เลขบัตรประจำตัวประชาชน</th>
      			                <th>ชื่อ</th>
      			                <th>สกุล</th>
      			                <th>เพศ</th>
      			                <th>อายุ</th>
      			                <th></th>
                          </tr>
                        </thead>
                        <tbody>
                        ';
  /** Get result from site user. */
	$result = $stmt->get_result();
  $row_cnt = $result->num_rows;

  /** Check count row. */
  if(0 < $row_cnt){
  	while ($row = $result->fetch_assoc()) {
        echo '<div class="alert alert-dismissable" style="background-color: #3C8DBC;color: #FFFFFF;">
                    <h4>  <i class="icon fa fa-check"></i> มีข้อมูลแล้ว</h4>
                    สามารถเข้าสู่หน้า EMR ได้โดยคลิกที่ปุ่ม EMR ในตาราง
                  </div>';
  	    $table .= '<tr class="odd" role="row">
                  <td>'.$row['ssn'].'</td>
                  <td>'.$row['name'].'</td>
                  <td>'.$row['lname'].'</td>
                  <td>'.$sex[$row['sex']].'</td>
                  <td>'.$row['age'].'</td>
                  <td>
                  	<a href="../emr/?ptid='.$row['ptid_key'].'" class="btn btn-block btn-primary">EMR</a>
                  </td>
                </tr>';
  	}

    /** End table. */
  	$table .= '</tbody>
                </table>';
  }else{
    /** Search from other site. */
    $stmt = $mysqli->prepare('SELECT `ptid`, `hospcode`, `pid`, `hn`, `ssn`, `birth`, floor(datediff(curdate(),birth)/365.25) as age, `prename`, `name`, `lname`, `sex` FROM palliative_register WHERE ssn LIKE ?');
    $stmt->bind_param('s', $param);
    $stmt->execute();

    /** Get result from other site. */
    $result = $stmt->get_result();
    $row_cnt = $result->num_rows;

    /** Check count row. */
    if(0 < $row_cnt){
      while ($row = $result->fetch_assoc()) {
        echo '<div class="alert alert-dismissable" style="background-color: #3C8DBC;color: #FFFFFF;">
                    <h4>  <i class="icon fa fa-check"></i> พบข้อมูลใน Site อื่น</h4>
                    สามารถนำเข้าข้อมูลได้ ได้โดยคลิกที่ปุ่มนำเข้าข้อมูล
                  </div>';
          $table .= '<tr class="odd" role="row">
                    <td>'.$row['ssn'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['lname'].'</td>
                    <td>'.$sex[$row['sex']].'</td>
                    <td>'.$row['age'].'</td>
                    <td>
                      <a type="button" href="../form/register.php?dataid='.$row['ptid'].'&insert=1" class="btn btn-default" title="นำเข้าข้อมูล">
                        <i class="fa fa-arrow-down">
                        </i>
                      </a>
                    </td>
                  </tr>';
      }

      /** End table. */
      $table .= '</tbody>
                  </table>';
    }else{
      mysqli_close($mysqli);
      /** Search from CASCAP. */
      include "../_connection/db_cascap.php";
      $stmt = $mysqli_cascap->prepare('SELECT ptid AS pid, cid AS ssn, sitecode AS hospcode, hn, name, surname AS lname, v3 AS sex, floor(datediff(curdate(),bdatedb)/365.25) AS age
                                      FROM patient
                                      WHERE cid LIKE ? AND ptid = ptid_key
                                      LIMIT 0, 100');
      $stmt->bind_param('s', $param);
      $stmt->execute();

      /** Get result from other site. */
      $result = $stmt->get_result();
      $row_cnt = $result->num_rows;

      /** Check count row. */
      if(0 < $row_cnt){
        while ($row = $result->fetch_assoc()) {
            $gender = '';
            isset($row['sex']) ? $gender = $sex[$row['sex']] : $gender = '';
            echo '<div class="alert alert-dismissable" style="background-color: #3C8DBC;color: #FFFFFF;">
                    <h4>  <i class="icon fa fa-check"></i> พบข้อมูลใน CASCAP</h4>
                    สามารถนำเข้าข้อมูลได้ ได้โดยคลิกที่ปุ่มนำเข้าข้อมูล
                  </div>';
            $table .= '<tr class="odd" role="row">
                      <td>'.$row['ssn'].'</td>
                      <td>'.tis620_to_utf8($row['name']).'</td>
                      <td>'.tis620_to_utf8($row['lname']).'</td>
                      <td>'.$gender.'</td>
                      <td>'.$row['age'].'</td>
                      <td>
                        <a type="button" href="../form/register.php?dataid='.$row['ssn'].'&insert=1&cascap=1" class="btn btn-primary" title="นำเข้าข้อมูล">
                          <i class="fa fa-arrow-down">
                          </i>
                        </a>
                      </td>
                    </tr>';
        }

        /** End table. */
        $table .= '</tbody>
                    </table>';
      }else{
        echo '<div class="alert alert-dismissable" style="background-color: #3C8DBC;color: #FFFFFF;">
                    <h4>  <i class="icon fa fa-check"></i> ไม่พบข้อมูล</h4>
                    คุณต้องการเพิ่มข้อมูลหรือไม่
                    <a type="button" style="background-color: #FFFFFF;color: #3C8DBC;" href="../form/register.php" class="btn btn-pimary" title="นำเข้าข้อมูล">
                          ใช่
                        </a>
                  </div>';
        exit;
      }
    }
  }

  /** Show HTML & JavaScript. */
  echo $table.$javascript;
?>
