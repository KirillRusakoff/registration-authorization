<?php

require_once './connect.php';

$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$pass = htmlspecialchars(trim($_POST['password']));

if(!empty($pass))
{
    $pass_hash = hash('sha256', $pass);

    $sql = "SELECT * FROM users WHERE email='$email' AND pass='$pass_hash'";
    $result = $conn->query($sql);

    // Проверка результата
    if ($result->rowCount() > 0) 
    {
        header("Location: ./../welcome.html");
        exit();
    } 
    else 
    {
        header("Location: ./../index.html");
        exit();
    }
}

// Закрытие подключения
$conn->close();

?>