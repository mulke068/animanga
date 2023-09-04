<?php
require 'db_connect.php';
$db = $_GET['db'];
#$uid = $_GET['uid'];
//echo $uid;
//echo $db;
/* code.php?uid=<?=$_GET['uid'];?>&db=<?=$_GET['db'];?> */

if(isset($_GET["login"])){
    $pass = mysqli_real_escape_string($connect, $_GET['pass']);
    $query = "SELECT * FROM users WHERE users.pass='$pass';";
    $query_run = mysqli_query($connect, $query);
    

    if(mysqli_num_rows($query_run) == 1){
        $row = mysqli_fetch_array($query_run);
        session_start();
        #echo $row['id'];
        $uid = $row['id'];
        $_SESSION['login'] = $row['id'];
        if($db == "anime_bank"){header("Location: ../anime/output.php?uid=$uid&db=$db");};
        if($db == "manga_bank"){header("Location: ../manga/output.php?uid=$uid&db=$db");};
        if($db != "anime_bank" OR "manga_bank"){echo "Error";};
        
    } else {
        echo "Login Failed";
        header("Location: ../index.php");
    };

};