<?php
    session_start();
    error_reporting(0);
    include "../_connection/db.php";
    $task = $_GET["task"];
    $username = $_POST["username"];
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
        $password = sha1(md5($_POST["password"]));
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
    
                $sql = "INSERT INTO `thaipalliative`.`puser` (
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
             $_SESSION["tpc_puser_hcode"] = $_POST["site"];
            if($query){
             echo "0";
            }
        }
    }
    if($task=="editUser"){
        $password = $_POST["password"];
        $sqlSelect = "SELECT * FROM `puser` WHERE `password`='".$password."' ";
        $querySelect = $mysqli->query($sqlSelect);
        $numSelect = $querySelect->num_rows;
        $sqlUser = "SELECT * FROM `puser` WHERE `username`='".$username."' AND id!='".$_POST["id"]."' ";
        $queryUser = $mysqli->query($sqlUser);
        $numUser = $queryUser->num_rows;
        $sqlEmail = "SELECT * FROM `puser` WHERE `email`='".$email."' AND id!='".$_POST["id"]."'";
        $queryEmail = $mysqli->query($sqlEmail);
        $numEmail = $queryEmail->num_rows;
        if($numUser==1){
             echo "1";
             exit;
        }else if($numEmail==1){
            echo "2";
            exit;
        }
        if($numSelect==1){
            $password = $_POST["password"];
        }else{
            $password = sha1(md5($_POST["password"]));
        }
        $sqlUpdate = "
        UPDATE `thaipalliative`.`puser`
        SET
         `username` = '".$username."',
         `password` = '".$password."',
         `email` = '".$email."',
         `fname` = '".$fname."',
         `lname` = '".$lname."',
         `status` = '".$status."',
         `hcode` = '".$site."',
         `area` = '".$area."',
         `district` = '".$district."',
         `amphur` = '".$amphur."',
         `province` = '".$province."'
        WHERE
	(`id` = '".$_POST["id"]."')
        ";
        $queryUpdate = $mysqli->query($sqlUpdate);
        if($queryUpdate==1){
            $_SESSION["tpc_puser_hcode"] = $site;
            echo "0";
            exit;
        }
        exit;
    }
    if($task=="doDelete"){
        $id = $_POST["id"];
        $sql ="DELETE FROM `puser` WHERE `id`='".$id."' ";
        $query = $mysqli->query($sql);
    }
?>