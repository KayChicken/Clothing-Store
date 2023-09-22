<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopBD";

// Создание подключения
$mysql = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}
?>