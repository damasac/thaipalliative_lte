<?php
	session_start();

  /** Hospital code. */
	$hospcode = $_SESSION['tpc_puser_hcode'];

	$param = $_GET['ssn'];

	include "../_connection/db_cascap.php";
	$stmt = $mysqli_cascap->prepare('SELECT * FROM patient WHERE cid = ? AND ptid = ptid_key');
	$stmt->bind_param('s', $param);
	$stmt->execute();

	/** Get result. */  
	$table = ""; 
 	$result = $stmt->get_result();
  	$row = mysqli_fetch_assoc($result);

  	print_r($row);
  	exit;
  	
	header( "location: index.php" );
?>