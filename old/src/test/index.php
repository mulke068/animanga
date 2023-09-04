<?php
    session_start();
    //echo password_hash("password", CRYPT_SHA512);

    //check login
    if($_SESSION["useruid"]){
        header("Location: ./dashboard.php");
        exit();
    };

    // spachen
    $lang = "en";
    if(isset($_SESSION['lang']))
    {
        $lang = $_SESSION['lang'];
    }
    require("lang/" . $lang . ".php");
    //secure
    $IP = getenv ( "REMOTE_ADDR" );
?>
<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>index</title>

    <!-- tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="antialiased text-slate-500 dark:text-slate-400 bg-white dark:bg-slate-900">
    <?php require_once 'inc/nav.inc.php'; ?>
    <div class="max-w-sm mx-auto bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 shadow pt-6 pb-4 px-6">
        <form action="inc/login.inc.php" method="POST" autocomplete="off">
            <div >
                <label class="inline-block text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200" for="name"><?php echo $login["logIn"]?></label>
                <div class="mt-1">
                    <input  type="text" name="uid" placeholder="<?php echo $login["uidTxt"]?>" autofocus class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <p class="mb-2 text-sm leading-6 font-semibold text-sky-500 dark:text-sky-400"><?php echo $login["uidInfo"]?></p>
                </div>
                <div class="mt-1">
                    <input  type="password" name="pwd" placeholder="Password..." autofocus  class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div><br>
            <div class="flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
                <label for="anime" class="py-4 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Anime</label>
                <input type="radio" name="site" id="anime" value="anime" checked="checked" class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
            </div><br>
            <div class="flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
                <label for="manga" class="py-4 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Manga</label>
                <input type="radio" name="site" id="manga" value="manga" class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
            </div><br>
            <div><select name="lang" class="block  w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="en" selected>Englisch</option>
                <option value="de">German</option>  
            </select></div><br>
            <div class="flex">
                <button class="bg-sky-500 hover:bg-sky-700 px-5 py-2.5 text-sm leading-5 rounded-md font-semibold text-white" type="submit" name="login"><?php echo $login["sumbit"]?></button>
            </div>
            <div>
                <?php
                    if(isset($_GET["error"])){
                        if ($_GET["error"] == "emptyinput"){
                            echo "<p>Fill in all fields!<p>";
                        }
                        elseif ($_GET["error"] == "stmtfailed"){
                            echo "<p>Something went wrong, try again!<p>";
                        }
                        elseif ($_GET["error"] == "wronglogin"){
                            echo "<p>Incorrect login infomation!<p>";
                        }
                        elseif ($_GET["error"] == "loginerror"){
                            echo "<p>Something went wrong, try again!<p>";
                        }
                        elseif ($_GET["error"] == "none"){
                            echo "<p>You have signed up!<p>";
                        }
                    }
                ?>
            </div>
        </form>
        <!--div class="flex">
            <a href="../index.php" type="_blank"><button class="hover:text-sky-500 dark:hover:text-sky-400" >Home</button></a> 
            
        </div-->
    </div>
</body>

</html>