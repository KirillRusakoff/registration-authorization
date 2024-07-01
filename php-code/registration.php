<?php

require_once './connect.php';

$user_name = htmlspecialchars(trim($_POST['name']));
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$pass = htmlspecialchars(trim($_POST['password']));
$pass_double = htmlspecialchars(trim($_POST['password_double']));

if (!empty($user_name) AND !empty($pass) AND $pass === $pass_double) 
{
    $pass_hash = hash('sha256', $pass);

    try 
    {
        // Подготовленное выражение для вставки данных
        $stmt = $conn->prepare("INSERT INTO users (user_name, email, pass) VALUES (:user_name, :email, :pass)");
        
        // Привязка параметров
        $stmt->bindParam(':user_name', $user_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $pass_hash);

        // Выполнение запроса
        $stmt->execute();

        echo "Новая запись в таблицу успешно добавлена";
    } 
    catch (PDOException $Exception) 
    {
        // Обработка ошибок
        echo "Ошибка добавления записи в таблицу: " . $Exception->getMessage();
    }
}
elseif(empty($user_name))
{
    echo "Не заполнено поле 'Имя'!";
} 
elseif(empty($pass))
{
    echo "Не заполнено поле 'пароль'!";
} 
else 
{
    echo "Пароли не совпадают!";
}

// Закрытие подключения
$conn->close();

?>
