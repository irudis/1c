<?php
    include("../../src/mysql.php");

    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';

        $res = tryLogin($login, $password);
        
        if ($res != null) {
            $_SESSION['authenticated'] = true;
            $_SESSION['username'] = $login;
            $_SESSION["is_admin"] = $res["is_admin"];
            header('Location: /');
        } else {
            header('Location: /?login_error=1');
            die("xx");
        }
    }
?>