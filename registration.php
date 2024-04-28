<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
    <link rel="stylesheet" href="css/style.css">
    <title>Хлуд П.О.</title>
</head>
    <body>
        <div class="contaniner">
            <div class="row justify-content-center">
                <div class="col-9 px-0 py-0">
                    <h1>Регистрация</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-9">
                    <form method="post" action="/registration.php">
                        <div class="row mb-3 form"><input class="form" type="email" name="email" placeholder="Email"></div>
                        <div class="row mb-3 form_reg"><input class="form" type="text" name="username" placeholder="Login"></div>
                        <div class="row mb-3 form_reg"><input class="form" type="password" name="password" placeholder="Password"></div>
                        <button type="submit" class="btn btn-danger btn-block" name="submit">Продолжить</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php

if (isset($_COOKIE['User'])) {
    header("Location: profile.php");
}

require_once('db.php');

$link = mysqli_connect('127.0.0.1', 'root', '123', 'first');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!$email || !$username || !$password) die ("Пожалуйста введите все значения!");

    $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";

    if(!mysqli_query($link, $sql)) {
        echo "Не удалось добавить пользователя";
      }

  };

?>