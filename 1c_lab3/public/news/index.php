<?php
    include("../../src/utils.php");
    include("../../src/mysql.php");

    $id = (int)($_GET['id'] ?? 0);
    $news = $connection->query("SELECT * FROM news WHERE id = $id")->fetch_assoc();
?>

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/beercss@3.9.5/dist/cdn/beer.min.css" rel="stylesheet">
        <link href="/files/index.css" rel="stylesheet">
    </head>
    <body class="dark">
        <main class="responsive">
            <?= renderTemplate("/src/header.php") ?>
            <div class="padding-large surface-container-lowest">
                <article class="padding-large">
                    <div class="news-page-image card center" style="background-image: url(<?= htmlspecialchars($news['img']) ?>);">
                        <article class="no-round laruge-blur absolute bottom left right align-center">
                            <h3><?= htmlspecialchars($news['title']) ?></h3>
                        </article>
                    </div>
                    <p><?= nl2br(htmlspecialchars($news['full_text'])) ?></p>
                    <div class="right-align small-text">
                        <?= $news['date'] ?>
                    </div>
                </article>
            </div>
        </main>
    </body>
</html>