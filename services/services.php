<?php

require_once 'services/database.php';

$db = new DataBase();

if (isset($_POST['exhibitions'])) {

    $send = $db->GetExhibition($_POST['exhibitions']);
    $jsonData = json_encode($send);

    echo  $jsonData;
    die();
}
if (isset($_POST['dog_id'])) {

    $send = $db->GetDogJson($_POST['dog_id']);
    $jsonData = json_encode($send);

    echo  $jsonData;
    die();
}
/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверка наличия данных в полях
    if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["message"])) {
        echo "Пожалуйста, заполните все поля.";
        exit; // Останавливаем выполнение скрипта
    }

    $to = "ваш_email@example.com";
    $subject = "Обратная связь с сайта";
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Проверка валидности email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Пожалуйста, введите корректный email адрес.";
        exit; // Останавливаем выполнение скрипта
    }

    $headers = "From: $name <$email>";

    if (mail($to, $subject, $message, $headers)) {
        echo "Ваше сообщение ыс яыс  успешно отправлено!";
    } else {
        echo "Что-то пошло не так. Сообщение не было отправлено.";
    }
}*/



