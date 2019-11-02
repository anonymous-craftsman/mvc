<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавлення користувача - Stony</title>
    <link rel="stylesheet" href="templates/css/stony-reset.css">
    <link rel="stylesheet" href="templates/css/stony-main.css">
</head>
<body>
<?php
include("header.php");
include("menu.php");
?>

<section class="content">
    <div class="heading-block">
        <div class="heading-block__text">
            <a href="/admin">Головна</a> / Добавлення користувача <hr>
        </div>
        <div class="content-info">
            <div class="content-info__text">
                <form action="/admin/addUserData" method="POST" enctype="multipart/form-data">
                    <label class="label" for="nameUser">Введіть ім'я</label><br>
                    <input class="input-text" type="text" name="nameUser" id="nameUser" placeholder="Введіть ФІО"><br>
                    <label class="label" for="loginUser">Введіть логін</label><br>
                    <input class="input-text" type="text" name="loginUser" id="loginUser" placeholder="Введіть логін"><br>
                    <label class="label" for="emailUser">Введіть email</label><br>
                    <input class="input-text" type="text" name="emailUser" id="emailUser" placeholder="Введіть Email"><br>
                    <label class="label" for="phoneUser">Введіть телефон</label><br>
                    <input class="input-text" type="text" name="phoneUser" id="phoneUser" placeholder="Введіть телефон"><br>
                    <label class="label" for="avatarUser">Виберіть фото</label><br>
                    <input type="file" class="button" id="avatarUser" name="avatarUser"><br>
                    <label class="label" for="pass1User">Введіть пароль</label><br>
                    <input class="input-text" type="password" name="pass1User" id="pass1User" placeholder="Введіть пароль"><br>
                    <label class="label" for="pass2User">Повторіть пароль</label><br>
                    <input class="input-text" type="password" name="pass2User" id="pass2User" placeholder="Повторіть пароль"><br><br>
                    <input class="button" type="submit" name="addUser" id="addUser" value="Додати">
                </form>
            </div>
        </div>
    </div>
</section>

</body>
</html>