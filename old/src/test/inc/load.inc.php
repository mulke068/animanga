<?php
    session_start();
    //echo password_hash("password", CRYPT_SHA512);
    
    //check login
    if(!isset($_SESSION["useruid"])){
        header("Location: ./index.php");
        exit();
    }
    
    

    // spachen
    $lang = "en";
    if(isset($_SESSION['lang']))
    {
        $lang = $_SESSION['lang'];
    }
    require("lang/" . $lang . ".php");
    //secure
    $IP = getenv ( "REMOTE_ADDR" );