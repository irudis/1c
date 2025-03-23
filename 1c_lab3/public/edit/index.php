<?php
    session_start();

    if ($_SESSION['is_admin'] != true) {
        exit;
    }

    include("../../src/mysql.php");
    include("../../src/utils.php");

    $id = (int)$_GET['id'];
    $news = $connection->query("SELECT * FROM news WHERE id = $id")->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt = $connection->prepare("
            UPDATE news SET
                title = ?,
                s_text = ?,
                full_text = ?,
                img = ?
            WHERE id = ?
        ");
        
        $stmt->bind_param("ssssi", 
            $_POST['title'],
            $_POST['s_text'],
            $_POST['full_text'],
            $_POST['img'],
            $id
        );
        
        if ($stmt->execute()) {
            header('Location: /?update_success=1');
        } else {
            $error = "Ошибка при обновлении новости";
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

            <form method="POST" class="padding-large surface-container-lowest">
                <h4>Редактировать новость</h4>
                
                <?php if (isset($error)): ?>
                    <div class="red-text padding"><?= $error ?></div>
                <?php endif; ?>

                <div class="field border">
                    <input type="text" name="title" required value="<?= htmlspecialchars($news['title']) ?>">
                    <span class="helper">Заголовок</span>
                </div>

                <div class="field border textarea">
                    <textarea name="s_text" required><?= htmlspecialchars($news['s_text']) ?></textarea>
                    <span class="helper">Краткий текст</span>
                </div>

                <div class="field border textarea" style="height: 1000px;">
                    <textarea name="full_text" required><?= htmlspecialchars($news['full_text']) ?></textarea>
                    <span class="helper">Полный текст</span>
                </div>

                <div class="field border">
                    <input type="text" name="img" required value="<?= htmlspecialchars($news['img']) ?>">
                    <span class="helper">URL изображения</span>
                </div>

                <div class="grid no-space">
                    <div class="s6">
                        <button type="submit" class="border right-round top-round responsive">Сохранить</button>
                    </div>
                    <div class="s6">
                        <a href="/news/view?id=<?= $id ?>" class="button border left-round top-round responsive">Отмена</a>
                    </div>
                </div>
            </form>
        </main>
    </body>
</html>