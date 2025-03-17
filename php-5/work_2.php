<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($message) >= 10) {

    } else {
        echo "Убедитесь в правильности данных.";
    }
}
