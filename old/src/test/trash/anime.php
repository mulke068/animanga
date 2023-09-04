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

    $query = "DELETE FROM anime WHERE anime.anime_id='$id1';";

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
    $season =  mysqli_real_escape_string($connect, $_POST['season']);
    $episodes =  mysqli_real_escape_string($connect, $_POST['episodes']);
    $watched =  mysqli_real_escape_string($connect, $_POST['watched']);
    $date =  mysqli_real_escape_string($connect, $_POST['date']);
    $score =  mysqli_real_escape_string($connect, $_POST['score']);
    $platform =  mysqli_real_escape_string($connect, $_POST['platform']);
    $link =  mysqli_real_escape_string($connect, $_POST['link']);
    $img =  mysqli_real_escape_string($connect, $_POST['img']);

    $query = "INSERT INTO anime (anime.user_id,anime.name,anime.name2,anime.status_id,anime.season,anime.episodes,anime.watched,anime.date,anime.score,anime.platform,anime.link,anime.img)
        VALUES ('$uid','$name','$name2','$status_id','$season','$episodes','$watched','$date','$score','$platform','$link','$img');";

    $query_run = mysqli_query($connect, $query);
    echo "New Created";

    if($query_run)
    {
        $_SESSION['message'] = "Saved Successfully";
        //header("Location: create.php");
        header("Location: ../anime/output.php?uid=$uid&db=$db");
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
    $name_id = mysqli_real_escape_string($connect, $_POST['anime_id']);
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $name2 = mysqli_real_escape_string($connect, $_POST['name2']);
    $season = mysqli_real_escape_string($connect, $_POST['season']);
    $episodes = mysqli_real_escape_string($connect, $_POST['episodes']);
    $watched = mysqli_real_escape_string($connect, $_POST['watched']);
    $status_id = mysqli_real_escape_string($connect, $_POST['status_id']);
    $score = mysqli_real_escape_string($connect, $_POST['score']);
    $date = mysqli_real_escape_string($connect, $_POST['date']);
    $platform = mysqli_real_escape_string($connect, $_POST['platform']);
    $link = mysqli_real_escape_string($connect, $_POST['link']);
    $img = mysqli_real_escape_string($connect, $_POST['img']);

    $query = "UPDATE anime , status
    SET
        anime.name='$name', 
        anime.name2='$name2',
        anime.status_id='$status_id',
        anime.season='$season',
        anime.episodes='$episodes',
        anime.watched='$watched',
        anime.date='$date',
        anime.score='$score',
        anime.platform='$platform',
        anime.link='$link',
        anime.img='$img'

    WHERE anime.anime_id='$name_id'";

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