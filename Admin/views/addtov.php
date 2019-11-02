<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавлення товару - Stony</title>
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
            <a href="/admin">Головна</a> / Добавлення товару <hr>
        </div>
        <div class="content-info">
            <div class="content-info__text">
                <form action="/admin/addTovData" method="POST" enctype="multipart/form-data">
                    <label class="label" for="nameTov">Назва товару</label><br>
                    <input class="input-text" type="text" name="nameTov" id="nameTov" placeholder="Введіть назву товару"><br>
                    <label class="label" for="priceTov">Ціна товару</label><br>
                    <input class="input-text" type="text" name="priceTov" id="priceTov" placeholder="Введіть ціну товару"><br>
                    <label class="label" for="photoTov">Фото</label><br>
                    <input class="button" type="file" name="photoTov" id="photoTov"><br>
                    <label class="label" for="idCatTov">Виберіть категорію товару</label><br>
                    <select class="button" name="idCatTov" id="idCatTov">
                        <?php /** @var TYPE_NAME $idCat */
                        foreach ($idCat as $tmp): ?>
                        <option value="<?=$tmp['idCat']?>"><?=$tmp['nameCat']?></option>
                        <?php endforeach; ?>
                    </select><br>
                    <label class="label" for="harTov">Характеристика товару</label><br>
                    <textarea class="input-text" name="harTov" id="harTov" style="width: 290px"></textarea><br>
                    <label class="label" for="kolTov">Кількість товару</label><br>
                    <input class="input-text" type="text" name="kolTov" id="kolTov" placeholder="Введіть кількість товару"><br><br>
                    <input class="button" type="submit" name="addTov" id="addTov" value="Додати товар">
                </form>
            </div>
        </div>
    </div>
</section>

</body>
</html>