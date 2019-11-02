<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавлення категорій - Stony</title>
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
            <a href="/admin">Головна</a> / Добавлення категорій <hr>
        </div>
        <div class="content-info">
            <div class="content-info__text">
                <form action="/admin/addCatData" method="POST" enctype="multipart/form-data">
                    <label class="label" for="nameCat">Назва категорії</label><br>
                    <input class="input-text" type="text" name="nameCat" id="nameCat" placeholder="Введіть назву категорії"><br><br>
                    <label class="label" for="photoCat">Фото</label><br>
                    <input class="button" type="file" name="photoCat" id="photoCat"><br><br>
                    <input class="button" type="submit" name="addCat" id="addCat" value="Додати категорію">
                </form>
            </div>
        </div>
    </div>
</section>

</body>
</html>