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
            <?php if (isset($_GET['delete_success'])): ?>
                <div class="green-text padding">Новость успешно удалена!</div>
            <?php endif; ?>

            <?php if (isset($_GET['delete_error'])): ?>
                <div class="red-text padding">Ошибка при удалении новости</div>
            <?php endif; ?>
            <?= renderTemplate("/src/header.php", ["active" => "main"]) ?>
            <?= renderTemplate("/src/news-list.php") ?>
        </main>
    </body>
</html>