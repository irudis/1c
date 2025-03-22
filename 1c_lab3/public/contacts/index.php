<?php
    include("../../src/utils.php");
    include("../../src/mysql.php");

    $activePage = "news"
?>

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/beercss@3.9.5/dist/cdn/beer.min.css" rel="stylesheet">
        <link href="/files/index.css" rel="stylesheet">
    </head>
    <body class="dark">
        <main class="responsive">
        <?= renderTemplate("/src/header.php", ["active" => "contacts"]) ?>

            <div class="padding-large surface-container-lowest">
                <div class="grid row-flex">
                    <div class="s6 padding">
                        <article class="round padding-large">
                            <div class="row">
                                <div class="rainbow-container circle large">
                                    <img class="circle large" src="/files/images/about_1.jpg">
                                </div>
                                <div class="max">
                                    <h5>Невзоров Владислав</h5>
                                    <p>Группа - ПМ-23 </p>
                                    <p>Факультет - ФПМИ</p>
                                    <p>Эл. почта -  vnevz@list.ru</p>
                                </div>
                            </div>
                            
                        </article>
                    </div>

                    <div class="s6 padding">
                        <article class="round padding-large">
                            <div class="row">
                                <div class="rainbow-container circle large">
                                    <img class="circle large" src="/files/images/about_2.jpg">
                                </div>
                                <div class="max">
                                    <h5>Рыбин Кирилл</h5>
                                    <p>Группа - ПМ-23 </p>
                                    <p>Факультет - ФПМИ</p>
                                    <p>Эл. почта - TheHardkorGamingTHG@ya.kz</p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <article class="medium-margin top">
                    <h5 class="padding">Место расположения офиса:</h5>
                    <div class="round overflow-hidden" style="height: 400px">
                        <iframe 
                            src="https://yandex.ru/map-widget/v1/-/CHqtYZ9W?mode=dark&theme=dark" 
                            width="100%" 
                            height="100%" 
                            frameborder="0"
                            allowfullscreen
                            class="no-border">
                        </iframe>
                    </div>
                </article>
            </div>
        </main>
    </body>
</html>