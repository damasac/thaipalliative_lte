<?php
  session_start();

  /** Search from site user. */
	$hospcode = $_SESSION['tpc_puser_hcode'];
	isset($_POST['ssn']) ? $param = "%{$_POST['ssn']}%" : $param = '';
	include "../_connection/db.php";
	$stmt = $mysqli->prepare('SELECT `ptid`, `ptid_key`, `hospcode`, `pid`, `hn`, `ssn`, `birth`, floor(datediff(curdate(),birthdb)/365.25) as age, `prename`, `name`, `lname`, `sex`, `race`, `nation`, `religion`, `house`, `moo`, `village`, `lane`, `road`, `tambon`, `ampur`, `changwat`, `zipcode`, `tel`, `privilege`, `mstatus`, `occupa`, `congenital_disease`, `history`, `update_time`, `update_by`, `create_time`, `create_by` FROM palliative_register WHERE ssn LIKE ? AND hospcode = ?');
	$stmt->bind_param('ss', $param, $hospcode);
	$stmt->execute();

  $sex[1]="ชาย";
  $sex[2]="หญิง";

  /** init table. */
	$javascript = '<script>$(function () {
        $("#example2").dataTable();
        $("#example1").dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });</script>';

  /** Create table. */
	$table = '<table id="example2" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>HCODE</th>
			                <th>PTCODE</th>
			                <th>HN</th>
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
  	    $table .= '<tr class="odd" role="row">
                  <td>'.$row['hospcode'].'</td>
                  <td>'.$row['pid'].'</td>
                  <td>'.$row['hn'].'</td>
                  <td>'.$row['name'].'</td>
                  <td>'.$row['lname'].'</td>
                  <td>'.$sex[$row['sex']].'</td>
                  <td>'.$row['age'].'</td>
                  <td>
                  	<a href="../emr/?ptid_key='.$row['ptid_key'].'" class="btn btn-block btn-success">EMR</a>
                  </td>
                </tr>';
  	}

    /** End table. */
  	$table .= '</tbody>
                </table>';
  }else{
    /** Search from other site. */
    $stmt = $mysqli->prepare('SELECT `ptid`, `hospcode`, `pid`, `hn`, `ssn`, `birth`, `age`, `prename`, `name`, `lname`, `sex`, `race`, `nation`, `religion`, `house`, `moo`, `village`, `lane`, `road`, `tambon`, `ampur`, `changwat`, `zipcode`, `tel`, `privilege`, `mstatus`, `occupa`, `congenital_disease`, `history`, `update_time`, `update_by`, `create_time`, `create_by` FROM palliative_register WHERE ssn LIKE ?');
    $stmt->bind_param('s', $param);
    $stmt->execute();

    /** Get result from other site. */   
    $result = $stmt->get_result();
    $row_cnt = $result->num_rows;

    /** Check count row. */
    if(0 < $row_cnt){
      while ($row = $result->fetch_assoc()) {
          $table .= '<tr class="odd" role="row">
                    <td>'.$row['hospcode'].'</td>
                    <td>'.$row['pid'].'</td>
                    <td>'.$row['hn'].'</td>
                    <td>'.$row['ssn'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['lname'].'</td>
                    <td>'.$row['birth'].'</td>
                    <td>'.$row['birth'].'</td>
                    <td>
                      <a type="button" href="create_oth_pt.php?ptid='.$row['ptid'].'" class="btn btn-default" title="บันทึกข้อมูลจากโรงพยาบาลอื่น">
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
      /** Search from CASCAP. */
      echo "Search from CASCAP";
    }
  }

  /** Show HTML & JavaScript. */
  echo $table.$javascript;
?>