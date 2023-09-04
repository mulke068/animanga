<?php
//database_connection.php
$host="mysql";
$user="root";
$password="mysql_root_password";
$port=3306;


if(isset($_GET['db'])){
    $dbname=$_GET['db'];
    if($dbname=="anime_bank"){
        $dbtab="anime";
        $dbid="anime_id";
    };
    if($dbname=="manga_bank"){
        $dbtab="manga";
        $dbid="manga_id";
    };
} else {
    "Error";
};

$connect = new mysqli($host, $user, $password, $dbname, $port);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
  }

  //echo "Connected successfully";
?>