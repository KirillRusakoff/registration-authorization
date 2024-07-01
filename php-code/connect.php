<?php

$dsn = 'mysql:dbname=reg-db;host=localhost';
$user = 'root';
$password = '';

try 
{
    // Создание нового объекта PDO для подключения к базе данных
    $conn = new PDO($dsn, $user, $password);
    // Установка режима обработки ошибок
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Успешное подключение!";
} 
catch (PDOException $Exception) 
{
    // Обработка ошибок при подключении
    echo "Ошибка подключения: " . $Exception->getMessage();
}

?>