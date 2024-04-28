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
    <div class="container nav_bar">
        <div class="row">
            <div class="row">
                <div class="row">
                    <div class="col-4 nav_logo"></div>
                    <div class="col-8">
                        <div class="nav_text">Информация обо мне!</div>
                    </div>
                </div>
            </div>
        </div>
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <h2>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta, deserunt consequuntur
                            doloremque
                            vitae quam quas et eos, unde necessitatibus tempore placeat reiciendis ratione adipisci
                            perferendis
                            ipsam atque deleniti. Voluptatibus, architecto.
                        </h2>
                    </div>
                    <div class="col-4">
                        <div class="row my_photo"></div>
                        <div class="row">
                            <p class="title_photo">Хлуд П.О.</p>
                        </div>
                    </div>

                    <div class="container">
                    <div class="additional_block">
                        <p>На самом деле у меня плохо с фантазией, поэтому здесь будет вот такой блок</p>
                    </div>
                    <div class="additional_block">
                        <p>И еще</p>
                    </div>
                    <div class="additional_block">
                        <p>И еще!</p>
                    </div>
                    <div class="additional_block">
                        <p>И вот я уже не могу остановиться</p>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <button id="myButton" class="btn_red">Click me</button>
                            <p id="demo"></p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="hello">
                    Привет, <?php echo $_COOKIE['User']; ?>
                </h1>
            </div>
            <div class="col-12">
                <form method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                    <input type="text" class="form col-12" name="title" placeholder="Заголовок вашего поста">
                    <textarea class="col-12" name="text" cols="30" rows="10" placeholder="Введите тест вашего поста..."></textarea>
                    <input type="file" name="file" /><br>
                    <button type="submit" class="btn_red" name="submit">Сохранить пост!</button>
                </form>
            </div>
        </div>
    </div>




<script type="text/javascript" src="./buttons/buttons.js"></script>
</body>

</html>

<?php

require_once('db.php');

$link = mysqli_connect('127.0.0.1', 'root', '123', 'first');

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $main_text = $_POST['text'];

    if (!$title || !$main_text) die ("Заполните все поля");

    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

    if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");

    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }
};

?>