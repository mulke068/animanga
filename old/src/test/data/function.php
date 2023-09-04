<?php
function uidExists($connect, $username, $email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($connect);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt , "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function emptyInputLogin($username, $pwd){
    //$result;
    if (empty($username) || empty($pwd)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($connect, $username, $pwd, $lang, $site){
    $uidExists = uidExists($connect, $username, $username);

    if($uidExists === false){
        header("Location: ../index.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPWd = password_verify($pwd, $pwdHashed);

    if($checkPWd === false){
        header("Location: ../index.php?error=wronglogin");
        exit();
    }
    else if ($checkPWd === true){
        session_start();
        $_SESSION["userid"] =  $uidExists["usersId"];
        $_SESSION["useruid"] =  $uidExists["usersUid"];
        $_SESSION["login"] = true; // login bestätigung
        $_SESSION['site'] = $site;  // welshe seite
        $_SESSION['lang'] = $lang; // sprache
        //header("Location: ../index.php");
        //$site = "../$site.php";
        //header("Location: $site");
        header("Location: ../dashboard.php");
        exit();
    }

    
    
}