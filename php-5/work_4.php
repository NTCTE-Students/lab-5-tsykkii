<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars(trim($_POST['email']));

    if (empty($email)) {
        echo "Пожалуйста, введите вашу электронную почту.";
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Неправильный формат электронной почты.";
        exit;
    }

    echo "Спасибо за подписку! Вы успешно добавлены в рассылку на: " . $email;
}