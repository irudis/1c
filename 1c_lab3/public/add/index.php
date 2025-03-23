<?php
session_start();

if ($_SESSION['is_admin'] != true) {
    exit;
}

include("../../src/utils.php");
include("../../src/mysql.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $s_text = $_POST['s_text'];
    $full_text = $_POST['full_text'];
    $img = $_POST['img'];

    $stmt = $connection->prepare("
        INSERT INTO news (title, s_text, full_text, img, date)
        VALUES (?, ?, ?, ?, NOW())
    ");
    $stmt->bind_param("ssss", $title, $s_text, $full_text, $img);

    if ($stmt->execute()) {
        header('Location: /?success=1');
        exit;
    } else {
        $error = "Ошибка при добавлении новости";
    }
}
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
            <h4>Добавить новость</h4>
            
            <?php if (isset($error)): ?>
                <div class="red-text"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="field border">
                    <input type="text" name="title" required>
                    <span class="helper">Заголовок</span>
                </div>

                <div class="field border textarea">
                    <textarea type="text" name="s_text" required></textarea>
                    <span class="helper">Краткое описание</span>
                </div>

                <div class="field border" style="height: 800px;">
                    <textarea name="full_text" required></textarea>
                    <span class="helper">Полный текст</span>
                </div>

                <div class="field border">
                    <input type="text" name="img" required>
                    <span class="helper">Ссылка на изображение</span>
                </div>

                <button type="submit" class="border right-round top-round">Опубликовать</button>
            </form>
        </div>
    </main>
</body>
</html>