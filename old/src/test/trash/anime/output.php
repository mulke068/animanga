<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: ../index.php");
        exit;
    };
    require '../data/db_connect.php';
    $db = $_GET['db'];
    $uid = $_GET['uid'];
    echo "=$uid=/=$db=";
    
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    

    <title><?=$dbtab;?> List</title>
</head>
<body class="antialiased text-slate-500 dark:text-slate-400 bg-white dark:bg-slate-900">
  
    <div class="container mx-auto">

        <?php include('../data/message.php'); ?>

        <div >
            <div >
                <div class="relative">
                    <div class="sticky top-0 left-0 right-0 bg-white dark:bg-slate-900">
                        <div class="gap-2 p-3">
                            <div class="flex items-center gap-4 p-6">
                                <h4 class="inline-block text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200"><?=$dbtab;?> Details</h4>
                                <a class="bg-sky-500 hover:bg-sky-700 px-5 py-2 text-sm leading-5 rounded-full font-semibold text-white" href="create.php?uid=<?=$_GET['uid'];?>&db=<?=$_GET['db'];?>">Create</a>
                                <a class="bg-red-500 hover:bg-red-700 px-5 py-2 text-sm leading-5 rounded-full font-semibold text-white" href="../index.php">Logout</a>
                                
                            </div>
                            <form action="" method="post" autocomplete="off" class="w-full">
                                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                                <div class="relative">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    </div>
                                    <input type="search" id="default-search" name="search" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
                                    <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="relat  overflow-auto">
                        

                        <table class="border-separate border-spacing-2 border-collapse w-full border border-slate-400 dark:border-slate-500 bg-white dark:bg-slate-800 text-sm shadow-sm">
                            <thead class="bg-slate-50 dark:bg-slate-700">
                                <tr>
                                    <!--th>user_id</th-->
                                    <!--th>anime_id</th-->
                                    <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400"><?= $row['name']; ?></td>
                                    <th class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Anime</th>
                                    <th class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Name 2</th>
                                    <th class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Season</th>
                                    <th class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Link</th>
                                    <th class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Status</th>
                                    <th class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Bewertug</th>
                                    <th class="w-1/2 border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left">Bearbeiten</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($_POST["search"]))
                                    {
                                    $search = mysqli_real_escape_string($connect, $_POST["search"]);
                                    $query = "SELECT * FROM $dbtab,status WHERE (user_id=$uid) AND ($dbtab.status_id=status.status_id) AND CONCAT(name,name2) LIKE '%$search%' ORDER BY CONCAT(name,name2) ASC";
                                    } else {
                                        $query = "SELECT * FROM $dbtab,status WHERE (user_id=$uid) AND ($dbtab.status_id=status.status_id) ORDER BY $dbtab.date DESC, $dbtab.anime_id DESC";
                                    };
                                    
                                    //$query = "SELECT * FROM $dbtab,status WHERE (user_id=$uid) AND ($dbtab.status_id=status.status_id) ORDER BY CONCAT(name,name2) ASC";
                                    $query_run = mysqli_query($connect, $query);
                                    
                            
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <!--td><?= $row['user_id']; ?></td-->
                                                <!--td><?= $row['anime_id']; ?></td-->
                                                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400"><img class="max-w-xs max-h-40 rounded-lg" src="<?= $row['img']; ?>" alt="img"></td>
                                                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400"><?= $row['name']; ?></td>
                                                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400"><?= $row['name2']; ?></td>
                                                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400"><?= $row['season']; ?></td>
                                                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400"><a class="hover:text-white" href="<?= $row['link']; ?>" target="blank">Link</a></td>
                                                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400"><?= $row['status_name']; ?></td>
                                                <td class="border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400"><?= $row['score']; ?></td>
                                                <td class="grid gap-2 border border-slate-300 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                                    <a class="bg-sky-500 hover:bg-sky-700 px-5 py-2 text-sm leading-5 rounded-full font-semibold text-white" href="view.php?uid=<?=$_GET['uid'];?>&db=<?=$_GET['db'];?>&nid=<?=$row[$dbid];?>">View</a>
                                                    <a class="bg-sky-500 hover:bg-sky-700 px-5 py-2 text-sm leading-5 rounded-full font-semibold text-white" href="edit.php?uid=<?=$_GET['uid'];?>&db=<?=$_GET['db'];?>&nid=<?=$row[$dbid];?>">Edit</a>
                                                    <form action="../data/anime.php?uid=<?=$_GET['uid'];?>&db=<?=$_GET['db'];?>" method="POST">
                                                        <button class="bg-red-500 hover:bg-red-700 px-5 py-2 text-sm leading-5 rounded-full font-semibold text-white" type="submit" name="delete" value="<?=$row['anime_id'];?>">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<tr><td><h5> No Record Found </h5></td></tr>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    

</body>
</html>