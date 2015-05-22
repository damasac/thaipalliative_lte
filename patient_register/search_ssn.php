<?php
	//$param = "%{$_POST['ssn']}%";
	isset($_POST['ssn']) ? $param = "%{$_POST['ssn']}%" : $param = '';
	include "../connection/db.php";
	$stmt = $mysqli->prepare('SELECT `mr_id`, `hospcode`, `pid`, `hn`, `ssn`, `birth`, `age`, `prename`, `name`, `lname`, `sex`, `race`, `nation`, `religion`, `house`, `moo`, `village`, `lane`, `road`, `tambon`, `ampur`, `changwat`, `zipcode`, `tel`, `privilege`, `mstatus`, `occupa`, `congenital_disease`, `history`, `update_time`, `update_by`, `create_time`, `create_by` FROM palliative_register WHERE ssn LIKE ?');
	$stmt->bind_param('s', $param);

	$stmt->execute();

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

	$table = '<table id="example2" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Hospital code</th>
			                <th>PID</th>
			                <th>HN</th>
			                <th>เลขบัตรประจำตัวประชาชน</th>
			                <th>ชื่อ</th>
			                <th>นามสกุล</th>
			                <th>วันเกิด</th>
			                <th>อายุ</th>
			                <th></th>
                          </tr>
                        </thead>
                        <tbody>
                        ';

	$result = $stmt->get_result();
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
                	<button type="button" class="btn btn-default" title="โหลดข้อมูล">
	                	<i class="fa fa-download">
	                	</i>
                	</button>
                </td>
              </tr>';
	}

	$table .= '</tbody>
              </table>';

    echo $table.$javascript;
?>