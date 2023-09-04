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
    <title><?=$dbtab;?> edit</title>

    <!-- tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="antialiased text-slate-500 dark:text-slate-400 bg-white dark:bg-slate-900">
  
    <div class="container mx-auto">

        <?php include('../data/message.php'); ?>

        <div >
            <div >
                <div class="relative">
                    <div class="sticky top-0 left-0 right-0 justify-items-center bg-white dark:bg-slate-900">
                        <div class="flex items-center gap-4 p-6">
                            <h4 class="inline-block text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200"><?=$dbtab;?> Edit</h4>
                            <a href="output.php?uid=<?=$uid = $_GET['uid'];?>&db=<?=$db = $_GET['db'];?>" class="bg-red-500 hover:bg-red-700 px-5 py-2 text-sm leading-5 rounded-full font-semibold text-white">BACK</a>
                        </div>
                    </div>
                    <div class="relat overflow-auto">
                        <div class="">
                            <?php
                            if(isset($_GET['nid']))
                            {
                                $nid = mysqli_real_escape_string($connect, $_GET['nid']);
                                $query = "SELECT * FROM anime,status WHERE anime_id='$nid' AND ($dbtab.status_id=status.status_id)";
                                $query_run = mysqli_query($connect, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    $row = mysqli_fetch_array($query_run);
                                    ?>
                                    <form  action="../data/anime.php?uid=<?=$_GET['uid'];?>&db=<?=$_GET['db'];?>" method="POST" autocomplete="off">
                                        <input type="hidden" name="uid" value="<?= $uid; ?>">
                                        <input type="hidden" name="anime_id" value="<?= $row['anime_id']; ?>">
                                        
                                        <div class="block md:flex">
                                            <div class="box-content h-auto md:w-2/5 p-4">
                                                <label>Bild</label>
                                                <input type="url" placeholder="https://" name="img" value="<?=$row['img'];?>" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <img class="max-h-auto max-w-fit rounded-lg" src="<?=$row['img'];?>" alt="img">
                                            </div>
                                            <div class="box-content h-auto md:w-3/5 p-4">
                                                <div class="border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-600 dark:text-slate-200 text-left">
                                                    <label>Anime</label>
                                                    <input type="text" autofocus required name="name" value="<?=$row['name'];?>" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </div>
                                                <div class="border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-600 dark:text-slate-200 text-left">
                                                    <label>Name 2</label>
                                                    <input type="text" name="name2" value="<?=$row['name2'];?>" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </div>
                                                <div class="border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-600 dark:text-slate-200 text-left">
                                                    <label>Link</label>
                                                    <input type="url" placeholder="https://" name="link" value="<?=$row['link'];?>" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="md:flex">
                                            <div class="box-content h-auto md:w-1/2">
                                                <div class="border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                                    <label>Staffel</label>
                                                    <input type="number" min="0" max="100" required name="season" value="<?=$row['season'];?>" class="block p-4 pl-10 w-full md:w-1/6 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </div>
                                                <div class="border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                                    <label>Episoden</label>
                                                    <input type="number" name="episodes" value="<?=$row['episodes'];?>" class="block p-4 pl-10 w-full md:w-1/6 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </div>
                                                <div class="border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                                    <label>Geschaut</label>
                                                    <input type="number" name="watched" value="<?=$row['watched'];?>" class="block p-4 pl-10 w-full md:w-1/6 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </div>
                                            </div>
                                            <div class="box-content h-auto md:w-4/8">
                                                <div class="border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                                    <label>Bewertug</label>
                                                    <input type="number" name="score" value="<?=$row['score'];?>" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </div>
                                                <div class="wborder-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                                    <label>Status</label>
                                                    <input type="hidden" name="status_id" value="<?=$row['status_id'];?>" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <select name="status_id" id="status_id" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option value="<?=$row['status_id'];?>"><?=$row['status_id'];?> ={0=Ongoing,1=Finished,2=Dropped,3=Film}</option>
                                                        <option value="0">Ongoing</option>
                                                        <option value="1">Finished</option>
                                                        <option value="2">Dropped</option>
                                                        <option value="3">Film</option>
                                                    </select>
                                                </div>
                                                <div class="border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                                    <label>Datum</label>
                                                    <input type="date" min="01-01-1962" required name="date" value="<?=$row['date'];?>" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </div>
                                                <div class="border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">
                                                    <label>Wer Steamt</label>
                                                    <input type="text" placeholder="{}" name="platform" value="<?=$row['platform'];?>" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                </div>
                                            </div>
                                            <div class="box-content place-self-end">
                                                <div class="border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-right">
                                                    <button type="submit" name="update" class="bg-sky-500 hover:bg-sky-700 px-5 py-2 text-sm leading-5 rounded-full font-semibold text-white">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </form>
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