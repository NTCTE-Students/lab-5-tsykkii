<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы и очищаем их от XSS-атак
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Валидация: проверка, что все поля заполнены
    if (empty($name) || empty($email) || empty($message)) {
        echo "Пожалуйста, заполните все поля.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Неправильный формат электронной почты.";
        exit;
    }

    if (strlen($message) < 10) {
        echo "Сообщение должно содержать не менее 10 символов.";
        exit;
    }

    echo "Спасибо за ваше сообщение!<br>";
    echo "Имя: " . $name . "<br>";
    echo "Электронная почта: " . $email . "<br>";
    echo "Сообщение: " . nl2br($message) . "<br>";
}