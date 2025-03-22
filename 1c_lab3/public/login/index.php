<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if ($login === 'admin' && $password === 'password') {
            $_SESSION['authenticated'] = true;
            $_SESSION['username'] = $login;
            header('Location: /');
        } else {
            header('Location: /?login_error=1');
            die("xx");
        }
    }
?>