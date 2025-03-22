<?php
    session_start();
?>

<header>
    <input type="checkbox" id="login-toggle" class="hidden-toggle">
    
    <nav class="medium-padding">
        <div class="logo-container">
            <div class="rainbow-container">
                <div class="logo"></div>
            </div>
        </div>
        <h5 class="max medium-padding">Супер новости!</h5>

<!-- ================================================ ЕСЛИ АВТОРИЗОВАН =============================================== -->
        <?php if ($_SESSION["authenticated"] == true): ?>
            <div class="row">
                <span class="small-padding">Вы: <?=$_SESSION["username"]?></span>
                <i class="extra">
                    <?php renderTemplate("/src/auth-icon.php") ?>
                </i>
                <form method="POST" action="/logout" class="inline">
                    <button class="border right-round top-round small">Выйти</button>
                </form>
            </div>
<!-- ============================================== ЕСЛИ НЕ АВТОРИЗОВАН ============================================= -->
        <?php else: ?>
            <div>
                <label for="login-toggle" class="button border left-round top-round small">Войти</label>
                <i class="extra">
                    <?php renderTemplate("/src/auth-icon.php") ?>
                </i>
                <button class="border right-round top-round small">Регистрация</button>
            </div>
        <?php endif; ?>
<!-- =============================================== КОНЕЦ АВТОРИЗАЦИИ ============================================== -->

<!-- =============================================== КНОПКИ НАВИГАЦИИ =============================================== -->
    </nav>
    <nav class="medium-padding tabbed small">
        <a class="left-round <?= $active == null ? 'active' : '' ?>" href="/">
            <i>home</i>
            <div>Главная</div>
        </a>
        <a class="right-round <?= $active == "contacts" ? 'active' : '' ?>" href="/contacts">
            <i>contacts</i>
            <div>Контакты</div>
        </a>
    </nav>
<!-- ================================================ КОНЕЦ НАВИГАЦИИ =============================================== -->
    
<!-- ================================================= ОКНО ДЛЯ ВХОДА =============================================== -->
    <div class="modal">
        <form method="POST" action="/login" class="modal-content round">
            <article>
                <h4 class="center">
                    <div class="circle center large">
                        <?php renderTemplate("/src/auth-icon.php") ?>
                    </div>
                    <span>Вход</span>
                </h2>
                <div class="field border">
                    <input type="text" required name="login">
                    <span class="helper">Логин</span>
                </div>
                <div class="field border">
                    <input type="text" required name="password">
                    <span class="helper">Пароль</span>
                </div>
                <div class="grid no-space">
                    <div class="s3">
                        <button type="submit" class="responsive left-round top-round">Войти</button>
                    </div>
                    <div class="s9">
                        <label for="login-toggle" class="responsive button border right-round top-round">Закрыть</label>
                    </div>
                </div>
            </article>
        </form>
    </div>
</header>
<!-- ============================================== КОНЕЦ ОКНА ДЛЯ ВХОДА ============================================ -->

<style>
    <?php renderTemplate("/src/header.css") ?>
</style>