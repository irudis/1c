<?php
    include("../src/utils.php");
    include("../src/mysql.php");

    $activePage = "news"
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/beercss@3.9.5/dist/cdn/beer.min.css" rel="stylesheet">
        <link href="/files/index.css" rel="stylesheet">
    </head>
    <body class="dark">
        <main class="responsive">
            <?= renderTemplate("/src/header.php") ?>
            <?= renderTemplate("/src/news-list.php") ?>
        </main>
    </body>
</html>