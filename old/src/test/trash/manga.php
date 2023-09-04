<?php
require 'db_connect.php';
$db = $_GET['db'];
$uid = $_GET['uid'];
//echo $uid;
//echo $db;
/* code.php?uid=<?=$_GET['uid'];?>&db=<?=$_GET['db'];?> */

if(isset($_POST['delete'])){
    echo "delete check";
    $id1 = mysqli_real_escape_string($connect, $_POST['delete']);

    $query = "DELETE FROM manga WHERE manga.manga_id='$id1';";

    $query_run = mysqli_query($connect, $query);
    echo "delete deleted";

    if($query_run)
    {
        $_SESSION['message'] = "Deleted Successfully";
        //header("Location: output.php");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Deleted";
        //header("Location: output.php");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
    
};

if(isset($_POST['save'])){  
    echo "check Create";
    $uid = $_POST['uid'];
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $name2 =  mysqli_real_escape_string($connect, $_POST['name2']);
    $status_id =  mysqli_real_escape_string($connect, $_POST['status_id']);
    $chapters =  mysqli_real_escape_string($connect, $_POST['chapters']);
    $watched =  mysqli_real_escape_string($connect, $_POST['watched']);
    $date =  mysqli_real_escape_string($connect, $_POST['date']);
    $score =  mysqli_real_escape_string($connect, $_POST['score']);
    $link =  mysqli_real_escape_string($connect, $_POST['link']);
    $img =  mysqli_real_escape_string($connect, $_POST['img']);

    $query = "INSERT INTO manga (manga.user_id,manga.name,manga.name2,manga.status_id,manga.chapters,manga.watched,manga.date,manga.score,manga.link,manga.img)
        VALUES ('$uid','$name','$name2','$status_id','$chapters','$watched','$date','$score','$link','$img');";

    $query_run = mysqli_query($connect, $query);
    echo "New Created";

    if($query_run)
    {
        $_SESSION['message'] = "Saved Successfully";
        //header("Location: create.php");
        header("Location: ../manga/output.php?uid=$uid&db=$db");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Saved";
        //header("Location: create.php");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
};

if(isset($_POST['update'])){
    echo "Update check";
    $uid = $_POST['uid'];
    $name_id = mysqli_real_escape_string($connect, $_POST['manga_id']);
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $name2 = mysqli_real_escape_string($connect, $_POST['name2']);
    $chapters = mysqli_real_escape_string($connect, $_POST['chapters']);
    $watched = mysqli_real_escape_string($connect, $_POST['watched']);
    $status_id = mysqli_real_escape_string($connect, $_POST['status_id']);
    $score = mysqli_real_escape_string($connect, $_POST['score']);
    $date = mysqli_real_escape_string($connect, $_POST['date']);
    $link = mysqli_real_escape_string($connect, $_POST['link']);
    $img = mysqli_real_escape_string($connect, $_POST['img']);

    $query = "UPDATE manga , status
    SET
        manga.name='$name', 
        manga.name2='$name2',
        manga.status_id='$status_id',
        manga.chapters='$chapters',
        manga.watched='$watched',
        manga.date='$date',
        manga.score='$score',
        manga.link='$link',
        manga.img='$img'
    WHERE manga.manga_id='$name_id'";

    $query_run = mysqli_query($connect, $query);
    echo "Updatet Refrech Page!";

    if($query_run)
    {
        $_SESSION['message'] = "Updated Successfully";
        //header("Location: edit.php");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Updated";
        //header("Location: edit.php");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
};



//header('Location: ' . $_SERVER['HTTP_REFERER']);
?>