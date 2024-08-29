<?php

function findStringsInText(string $haystack, array $needles): ?string
{
    foreach ($needles as $needle) {
        $position = strpos($haystack, $needle);

        if ($position !== false) {
            return $needle;
        }
    }

    return null;
}

$needles = ['createAds', 'createAcc', 'adsDashboard', 'forgetPass', 'login'];

$url = $_SERVER['REQUEST_URI'];

$necessaryUrl = findStringsInText($url, $needles);

?>

<html lang="en" class="light scroll-smooth" dir="ltr"><head>
    <meta charset="UTF-8">
    <title>Hously - Tailwind CSS Real Estate Landing &amp; Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Tailwind CSS Saas &amp; Software Landing Page Template">
    <meta name="keywords" content="agency, application, business, clean, creative, cryptocurrency, it solutions, modern, multipurpose, nft marketplace, portfolio, saas, software, tailwind css">
    <meta name="author" content="Shreethemes">
    <meta name="website" content="https://shreethemes.in">
    <meta name="email" content="support@shreethemes.in">
    <meta name="version" content="2.2.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- Css -->
    <!-- Main Css -->
    <link href="../assets/libs/simplebar/simplebar.min.css" rel="stylesheet">
    <link href="../assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../assets/css/tailwind.min.css">

</head>

<section class="relative bg-green-600/5">
    <div class="container-fluid relative">
        <div class="grid grid-cols-1">
            <div class="flex flex-col min-h-screen justify-center md:px-10 py-10 px-4">
                <div class="text-center">
                    <a href="index.html"><img src="../assets/images/logo-icon-64.png" class="mx-auto" alt=""></a>
                </div>
                <div class="title-heading text-center my-auto">
                    <img src="../assets/images/error.png" class="mx-auto" alt="">
                    <h1 class="mt-3 mb-6 md:text-4xl text-3xl font-bold">Page Not Found?</h1>
                    <p class="text-slate-400">Whoops, this is embarassing. <br> Looks like the page you were looking for wasn't found.</p>

                    <div class="mt-4">
                        <a href="/" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md">Back to Home</a>
                    </div>
                </div>
                <div class="text-center">
                    <p class="mb-0 text-slate-400">© <script>document.write(new Date().getFullYear())</script>2024 Hously. Design with <i class="mdi mdi-heart text-red-600"></i> by <a href="https://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
                </div>
            </div>
        </div><!--end grid-->
    </div><!--end container-->
</section>

</html>

___________________________________________________________

<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>404 Not Found</title>-->
<!--    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">-->
<!--</head>-->
<!--<body class="bg-gray-100 flex items-center justify-center h-screen">-->
<!--<div class="text-center">-->
<!--    <h1 class="text-6xl font-bold text-gray-800">404</h1>-->
<!--    <p class="text-2xl text-gray-600 mt-4">Oops! Page not found.</p>-->
<!--    <p class="text-gray-500 mt-2">The page you are looking for does not exist.</p>-->
<!--    <a href="--><?php //echo "/$necessaryUrl" ?><!--" class="mt-6 inline-block bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Go To The Previous Page</a>-->
<!--</div>-->
<!--</body>-->
<!--</html>-->
