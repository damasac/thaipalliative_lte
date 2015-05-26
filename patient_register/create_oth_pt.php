<?php
	session_start();

  /** Hospital code. */
	$hospcode = $_SESSION['tpc_puser_hcode'];

	$param = $_GET['ssn'];

	include "../_connection/db.php";
	$stmt = $mysqli->prepare('SELECT * FROM palliative_register WHERE ssn = ?');
	$stmt->bind_param('s', $param);
	$stmt->execute();

	/** Get result. */  
	$table = ""; 
 	$result = $stmt->get_result();
  	$row = mysqli_fetch_assoc($result);

  	print_r($row);
  	exit;
  	/*$sql = "INSERT INTO 
						palliative_register 
						( 
							`ptid_key`,
							`hospcode`, 
							`pid`, 
							`hn`, 
							`ssn`, 
							`birth`, 
							`age`, 
							`prename`, 
							`name`, 
							`lname`, 
							`sex`, 
							`race`, 
							`nation`, 
							`religion`, 
							`house`, 
							`moo`, 
							`village`, 
							`lane`, 
							`road`, 
							`tambon`, 
							`ampur`, 
							`changwat`, 
							`zipcode`, 
							`tel`, 
							`privilege`, 
							`mstatus`, 
							`occupa`, 
							`congenital_disease`, 
							`history`, 
							`update_time`, 
							`update_by`, 
							`create_time`, 
							`create_by`)
						VALUES ('".$row['ptid_key']."', 
							'".$hospcode."', 
							'".$row['pid']."', 
							'".$hn."', 
							'".$row['ssn']."', 
							'".$row['birth']."', 
							'".$row['age']."', 
							'".$row['prename']."', 
							'".$row['name']."', 
							'".$row['lname']."', 
							'".$row['sex']."', 
							'".$row['race']."', 
							'".$row['nation']."', 
							'".$row['religion']."', 
							'".$row['house']."', 
							'".$row['moo']."', 
							'".$row['village']."', 
							'".$row['lane']."', 
							'".$row['road']."', 
							'".$row['tambon']."', 
							'".$row['ampur']."', 
							'".$row['changwat']."', 
							'".$row['zipcode']."', 
							'".$row['tel']."', 
							'".$row['privilege']."', 
							'".$row['mstatus']."', 
							'".$row['occupa']."', 
							'".$row['congenital_disease']."', 
							'".$row['history']."', 
							'".$row['update_time']."', 
							'".$row['update_by']."', 
							'".$row['create_time']."', 
							'".$row['create_by']."')";
  	$mysqli->query($sql);*/
	//echo $sql;
	header( "location: index.php" );
?>