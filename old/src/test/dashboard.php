<?php
    require 'inc/load.inc.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    

    <title><?=$_SESSION['site']?> List</title>
</head>
<body class="antialiased text-slate-500 dark:text-slate-400 bg-white dark:bg-slate-900">
    <!--?php require 'php/'.$_SESSION['site'].'.php' ?-->
    <?php 
    require_once 'inc/nav.inc.php';
    require('php/list.php');
    ?>
</body>

</html>