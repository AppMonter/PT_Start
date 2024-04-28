<?php
// Подключение к БД
$link = mysqli_connect('db', 'root', '123', 'first');
// Получаем id поста
$id = $_GET['id'];
// Запрос на получение поста
$sql = "SELECT * FROM posts WHERE id=$id";
// Отправка запроса
$res = mysqli_query($link, $sql);
// Вытаскиваем необходимые значения
$rows = mysqli_fetch_array($res);
$title = $rows['title'];
$main_text = $rows['main_text'];
?>

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
    <?php
        echo "<h1> $title </h1>";
        echo "<p> $main_text </p>";
    ?>
</body>

</html>