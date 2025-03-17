<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $date = htmlspecialchars(trim($_POST['date']));
    $time = htmlspecialchars(trim($_POST['time']));

    if (empty($name) || empty($date) || empty($time)) {
        echo "Пожалуйста, заполните все поля.";
        exit;
    }

    $dateTime = $date . ' ' . $time;
    $dateTimeObj = DateTime::createFromFormat('Y-m-d H:i', $dateTime);

    if ($dateTimeObj === false || array_sum((array) $dateTimeObj->getLastErrors()) > 0) {
        echo "Неправильный формат даты или времени.";
        exit;
    }

    echo "Спасибо, " . $name . "! Ваша бронь на " . $date . " в " . $time . " успешно оформлена.";
}