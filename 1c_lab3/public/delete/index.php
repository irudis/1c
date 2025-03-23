<?php
    session_start();

    if ($_SESSION['is_admin'] != true) {
        http_response_code(403);
        die('Доступ запрещен');
    }

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        die('Метод не разрешен');
    }

    include("../../src/mysql.php");

    $id = (int)($_POST['id'] ?? 0);

    $stmt = $connection->prepare("DELETE FROM news WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header('Location: /?delete_success=1');
    } else {
        header('Location: /?delete_error=1');
    }
?>