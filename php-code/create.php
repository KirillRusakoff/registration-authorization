<?php

require_once './connect.php';

try 
{
    // SQL-запрос для создания таблицы
    $sql = "CREATE TABLE IF NOT EXISTS users (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                user_name VARCHAR(150) NOT NULL,
                email VARCHAR(150) UNIQUE,
                pass VARCHAR(150) NOT NULL
            )";
    // Выполнение запроса
    $conn->exec($sql);
    echo "Таблица создана успешно!";
} 
catch (PDOException $Exception) 
{
    // Обработка ошибок
    echo "Ошибка при создании таблицы: " . $Exception->getMessage();
}

// Закрытие подключения
$conn->close();

?>