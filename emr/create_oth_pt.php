<?php
	$param = $_GET['mr_id'];
	include "../_connection/db.php";
	$stmt = $mysqli->prepare('SELECT `mr_id`, `hospcode`, `pid`, `hn`, `ssn`, `birth`, `age`, `prename`, `name`, `lname`, `sex`, `race`, `nation`, `religion`, `house`, `moo`, `village`, `lane`, `road`, `tambon`, `ampur`, `changwat`, `zipcode`, `tel`, `privilege`, `mstatus`, `occupa`, `congenital_disease`, `history`, `update_time`, `update_by`, `create_time`, `create_by` FROM palliative_register WHERE mr_id = ?');
	$stmt->bind_param('s', $param);
	$stmt->execute();
?>