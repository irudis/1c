<?php
$serverName = "localhost";
$userName = "mysql";
$password = "1";
$dbName = "cul";
$pageSize = 5;

$connection = new mysqli($serverName, $userName, $password, $dbName);

if ($connection->connect_error) {
    die("DB connection error: " . $connection->connect_error);
}

function getNews($page) {
    global $connection;
    global $pageSize;
    
    $news = $connection->prepare("
        SELECT id, date, title, s_text, img
        FROM news 
        ORDER BY date DESC 
        LIMIT ?, $pageSize
    ");

    $offset = $page * $pageSize; 
    $news->bind_param("i", $offset);
    $news->execute();

    // Get results
    $result = $news->get_result();
    $newsItems = $result->fetch_all(MYSQLI_ASSOC);

    $news->close();

    return $newsItems;
}

function getTotalNewsCount() {
    global $connection;
    global $pageSize;
    
    $newsCount = $connection->query("SELECT COUNT(*) AS total FROM news");
    $result = $newsCount->fetch_assoc()["total"];

    return $result;
}

?>