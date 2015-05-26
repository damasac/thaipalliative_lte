<?php
    error_reporting(0);
    include "../_connection/db.php";
    $task = $_GET["task"];
    $username = $_POST["username"];
    $password = sha1(md5($_POST["password"]));
    $email = $_POST["email"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $status = $_POST["status"];
    $area = $_POST["area"];
    $site = $_POST["site"];
    $province = $_POST["province"];
    $amphur = $_POST["amphur"];
    $district = $_POST["district"];
    $hcode = $_GET["hcode"];
    $date = date("Y-m-d H:i:s");
    if($task=="getData"){
        if($_GET["status"]==1){
            if($_GET["province"]==0){
            $condition = "WHERE area='".$_GET["area"]."'";
            }
            if($_GET["province"]!=0){
                $condition = "WHERE area='".$_GET["area"]."' AND province='".$_GET["province"]."' ";
            }
            if($_GET["hcode"]!=0){
                $condition = "WHERE area='".$_GET["area"]."' AND province='".$_GET["province"]."' AND hcode='".$_GET["hcode"]."' ";
            }
        }
        else if($_GET["status"]==2 || $_GET["status"]==3){
             if($_GET["province"]==0){
            $condition = "";
            }
            if($_GET["province"]!=0){
                $condition = "WHERE   province='".$_GET["province"]."' ";
            }
            if($_GET["hcode"]!=0){
                $condition = "WHERE  province='".$_GET["province"]."' AND hcode='".$_GET["hcode"]."' ";
            }
        }
        else if($_GET["status"]==4){
            $condition = "WHERE hcode='".$_GET["hcode"]."'  AND status NOT IN (1,2,3)";
        }
        
        $sql = "SELECT * FROM `puser`  ".$condition." ";
        $query = $mysqli->query($sql);
	while($data = $query->fetch_assoc()){
	    $array[] = $data;
	}
	print json_encode($array);
    }
    if($task=="addUser"){
        $sqlUser = "SELECT * FROM `puser` WHERE `username`='".$username."' ";
        $queryUser = $mysqli->query($sqlUser);
        $numUser = $queryUser->num_rows;
        $sqlEmail = "SELECT * FROM `puser` WHERE `email`='".$email."' ";
        $queryEmail = $mysqli->query($sqlEmail);
        $numEmail = $queryEmail->num_rows;

        if($numUser==1){
             echo "1";
             exit;
        }else if($numEmail==1){
            echo "2";
            exit;
        }else{
    
                $sql = "INSERT INTO `thaipalliative_lte`.`puser` (
                `username`,
                `password`,
                `email`,
                `fname`,
                `lname`,
                `status`,
                `hcode`,
                `area`,
                `district`,
                `amphur`,
                `province`,
                `createdate`
                )
                VALUES
                        (
                        '".$username."',
                        '".$password."',
                        '".$email."',
                        '".$fname."',
                        '".$lname."',
                        '".$status."',
                        '".$site."',
                        '".$area."',
                        '".$district."',
                        '".$amphur."',
                        '".$province."',
                        '".$date."'
                );
        
                ";
       $query =   $mysqli->query($sql) or die(mysqli_error($mysqli));
            if($query){
             echo "0";
            }
        }
    }
?>