<?php
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>index</title>

    <!-- tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="antialiased text-slate-500 dark:text-slate-400 bg-white dark:bg-slate-900">
    <div class="max-w-sm mx-auto bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 shadow pt-6 pb-4 px-6">
        <form action="data/code.php" method="GET" autocomplete="off">
            <div >
                <label class="inline-block text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200" for="pass">Code</label>
                <div class="mt-1">
                    <input  type="number" name="pass" min="0000" max="9999" placeholder="0000" autofocus required class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <p class="mb-2 text-sm leading-6 font-semibold text-sky-500 dark:text-sky-400">We need this to steal your identity.</p>
                </div>
            </div><br>
            <div class="flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
                <label for="anime" class="py-4 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Anime</label>
                <input type="radio" name="db" id="anime" value="anime_bank" checked="checked" class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
            </div><br>
            <div class="flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
                <label for="manga" class="py-4 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Manga</label>
                <input type="radio" name="db" id="manga" value="manga_bank" class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
            </div><br>
            <div>
                <button class="bg-sky-500 hover:bg-sky-700 px-5 py-2.5 text-sm leading-5 rounded-md font-semibold text-white" type="submit" name="login">Login</button>
            </div>
        </form>
        
    </div>
</body>

</html>