<?php
    session_start();
    //check login
    if(!isset($_SESSION["useruid"])){
        header("Location: ../index.php");
        exit();
    }
    // spachen
    $lang = "en";
    if(isset($_SESSION['lang']))
    {
        $lang = $_SESSION['lang'];
    }
    require("../lang/" . $lang . ".php");
    //secure
    $IP = getenv ( "REMOTE_ADDR" );
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    

    <title><?=$_SESSION['site']?> View</title>
</head>
<body class="antialiased text-slate-500 dark:text-slate-400 bg-white dark:bg-slate-900">
    <!--?php require 'php/'.$_SESSION['site'].'.php' ?-->
    <?php require_once '../inc/nav.inc.php';?>
    <div class="container mx-auto">

        <div >
            <div >
                <div class="relative">
                    <div class="sticky top-0 left-0 right-0 justify-items-center bg-white dark:bg-slate-900">
                        <div class="flex items-center gap-4 p-6">
                            <h4 class="inline-block text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200"><?=$dbtab;?> View Details</h4>
                            <a href="../dashboard.php" class="bg-red-500 hover:bg-red-700 px-5 py-2 text-sm leading-5 rounded-full font-semibold text-white">BACK</a>
                        </div>
                    </div>
                    <div class="relat overflow-auto">
                        <div class="border-separate border-spacing-2 border-collapse w-full border border-slate-400 dark:border-slate-500 bg-white dark:bg-slate-800 text-sm shadow-sm">
                        <?php
                            require_once '../data/dbh.php';
                            $uId = $_SESSION['userid'];
                            $site = $_SESSION['site'];
                            $listvalue = $_SESSION['listValue'];
                            $dataID = ''.$site.'Id';
                            
                                $query = "SELECT * FROM $site,status WHERE $dataID='$listvalue' AND ($site.statusId=status.statusId)";
                                
                                $query_run = mysqli_query($connect, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    $row = mysqli_fetch_array($query_run);
                            ?>
                                        <div class="w-full border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                            <label>usersId</label>
                                            <p class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?=$row['usersId'];?></p>
                                        </div>
                                        <div class="w-full border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                            <label>animeId</label>
                                            <p class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?=$row['animeId'];?></p>
                                        </div>
                                        <div class="w-full border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                            <label>Bild</label>
                                            <p class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><a href="<?=$row['img'];?>" target="_blank"><img class="max-w-xs max-h-auto rounded-lg" src="<?=$row['img'];?>" alt="img"><?=$row['img'];?></a></p>
                                        </div>
                                        <div class="w-full border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                            <label>Name</label>
                                            <p class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?=$row['name'];?></p>
                                        </div>
                                        <div class="w-full border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                            <label>Name 2</label>
                                            <p class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?=$row['name2'];?></p>
                                        </div>
                                        <div class="w-full border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                            <label>Link</label>
                                            <p class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><a href="<?=$row['link'];?>" target="_blank"><?=$row['link'];?></a></p>
                                        </div>
                                        <div class="w-full border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                            <label>Staffel</label>
                                            <p class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?=$row['season'];?></p>
                                        </div>
                                        <div class="w-full border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                            <label>Episoden</label>
                                            <p class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?=$row['episodes'];?></p>
                                        </div>
                                        <div class="w-full border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                            <label>Geschaut</label>
                                            <p class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?=$row['watched'];?></p>
                                        </div>
                                        <div class="w-full border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                            <label>Status</label>
                                            <p class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?=$row['status_name'];?></p>
                                        </div>
                                        <div class="w-full border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                            <label>Bewertug</label>
                                            <p class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?=$row['score'];?></p>
                                        </div>
                                        <div class="w-full border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                            <label>Datum</label>
                                            <p class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?=$row['date'];?></p>
                                        </div>
                                        <div class="w-full border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                            <label>Wer Steamt</label>
                                            <p class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?=$row['platform'];?></p>
                                        </div>
                            <?php
                                }
                                else
                                {
                                    echo    '<div class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                                <label><h4>No Such Id Found</h4></label>
                                            </div>';
                                }
                            
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>