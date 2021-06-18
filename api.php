<?php
define("USERNAME", "laravel.admin.panel");
define("PASSWORD", "laravel.admin.panel");
define("DBNAME", "shop");

function locales() {
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'index.html';
    header("Location: http://$host$uri/$extra");
}

$mysqli = new mysqli('localhost', USERNAME, PASSWORD, DBNAME);
if (mysqli_connect_errno()) {
    echo "Подключение невозможно: " . mysqli_connect_error();
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$submit = $_POST['submit'];

if(isset($submit))
{
    if(isset($name) && isset($email) && isset($password))
    {
        $mysqli = $mysqli->query("INSERT INTO `users`(`name`, `email`, `password`) VALUES ('{$name}', '{$email}', '{$password}')");
        locales();
        exit('Регистрация прошла успешно');

    } else {
        echo 'Регистрация прошла плохо';
    }
}

$mysqli->close();
