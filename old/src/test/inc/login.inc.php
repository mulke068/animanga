<?php

if(isset($_POST["login"])){
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $lang = $_POST['lang'];
    $site = $_POST['site'];
    
    require_once '../data/dbh.php';
    require_once '../data/function.php';
    echo "login check";
    if (emptyInputLogin($username,$pwd) !== false){
        header("Location: ../index.php?error=emptyinput");
        exit();
    }

    loginUser($connect, $username, $pwd, $lang, $site);
    echo "login user";
    
}
else {
    header("Location: ../index.php?error=loginerror");
    exit();
}
