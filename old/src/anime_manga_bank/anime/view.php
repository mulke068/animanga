<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: ../index.php");
        exit;
    };
    require '../data/db_connect.php';
    $db = $_GET['db'];
    $uid = $_GET['uid'];
    //echo $uid;
    //echo $db;
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <title><?=$dbtab;?> view</title>
</head>
<body class="antialiased text-slate-500 dark:text-slate-400 bg-white dark:bg-slate-900">

    <div class="container mx-auto">

        <div >
            <div >
                <div class="relative">
                    <div class="sticky top-0 left-0 right-0 justify-items-center bg-white dark:bg-slate-900">
                        <div class="flex items-center gap-4 p-6">
                            <h4 class="inline-block text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200"><?=$dbtab;?> View Details</h4>
                            <a href="output.php?uid=<?=$uid = $_GET['uid'];?>&db=<?=$db = $_GET['db'];?>" class="bg-red-500 hover:bg-red-700 px-5 py-2 text-sm leading-5 rounded-full font-semibold text-white">BACK</a>
                        </div>
                    </div>
                    <div class="relat overflow-auto">
                        <div class="">
                        <!--div class="border-separate border-spacing-2 border-collapse w-full border border-slate-400 dark:border-slate-500 bg-white dark:bg-slate-800 text-sm shadow-sm"-->
                            <?php
                            if(isset($_GET['nid']))
                            {
                                $nid = mysqli_real_escape_string($connect, $_GET['nid']);
                                $query = "SELECT * FROM anime,status WHERE anime_id='$nid' AND ($dbtab.status_id=status.status_id) ";
                                
                                $query_run = mysqli_query($connect, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    $row = mysqli_fetch_array($query_run);
                                    ?>
                                        <!--div class="flex border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                            <label>user_id</label>
                                            <p class=" "><?=$row['user_id'];?></p>
                                        </div>
                                        <div class="flex border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                            <label>anime_id</label>
                                            <p class=" "><?=$row['anime_id'];?></p>
                                        </div-->
                    
                                        <div class="block md:flex">
                                            <div class="box-content h-auto w-2/6 p-4">
                                                <div class="">
                                                    <p><!--a href="<?=$row['img'];?>" target="_blank"></a--><img class="max-h-auto max-w-fit rounded-lg" src="<?=$row['img'];?>" alt="img"></p>
                                                </div>
                                            </div>
                                            <div class="box-content h-auto w-fit p-4">
                                                <div class="border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-600 dark:text-slate-200 text-left">
                                                    <label>Name :</label>
                                                    <p class=""><?=$row['name'];?></p>
                                                </div>
                                                <div class=" border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                                    <label>Name 2 :</label>
                                                    <p class=" "><?=$row['name2'];?></p>
                                                </div>
                                                <div class=" border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                                    <label>Link :</label>
                                                    <p class=" "><a href="<?=$row['link'];?>" target="_blank"><?=$row['link'];?></a></p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                            
                                        <div class="flex">
                                            <div class="box-content h-auto w-3/6">
                                                <div class=" border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                                    <label>Staffel :</label>
                                                    <p class=" "><?=$row['season'];?></p>
                                                </div>
                                                <div class=" border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                                    <label>Episoden :</label>
                                                    <p class=" "><?=$row['episodes'];?></p>
                                                </div>
                                                <div class=" border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                                    <label>Geschaut :</label>
                                                    <p class=" "><?=$row['watched'];?></p>
                                                </div>
                                            </div>
                                            <div class="box-content">
                                                <div class=" border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                                    <label>Bewertug :</label>
                                                    <p class=" "><?=$row['score'];?></p>
                                                </div>
                                                <div class=" border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                                    <label>Status :</label>
                                                    <p class=" "><?=$row['status_name'];?></p>
                                                </div>
                                                <div class=" border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                                    <label>Datum :</label>
                                                    <p class=" "><?=$row['date'];?></p>
                                                </div>
                                                <div class=" border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                                    <label>Wer Steamt :</label>
                                                    <p class=" "><?=$row['platform'];?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                                else
                                {
                                    echo    '<div class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                                <label><h4>No Such Id Found</h4></label>
                                            </div>';
                                }
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