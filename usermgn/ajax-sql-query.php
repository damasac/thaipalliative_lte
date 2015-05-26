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
    //echo $password."<br>".$date;
    if($task=="addUser"){
        $sqlUser = "SELECT * FROM `puser` WHERE `username`='".$username."' ";
        $queryUser = $mysqli->query($sqlUser);
        $numUser = $queryUser->num_rows;
        $sqlEmail = "SELECT * FROM `puser` WHERE `email`='".$email."' ";
        $queryEmail = $mysqli->query($sqlEmail);
        $numEmail = $queryEmail->num_rows;
        if($numUser==1){
             echo "userDenied";
             exit;
        }else if($numEmail==1){
            echo "emailDenied";
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
             echo "Success";
            }
        }
    }
?>