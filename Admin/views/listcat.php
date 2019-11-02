<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список категорій - Stony</title>
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
            <a href="/admin">Головна</a> / Список категорій <hr>
        </div>
        <div class="content-info">
            <div class="content-info__text">
                <table class="table-cat">
                    <thead>
                        <tr>
                            <th>Назва категорії</th>
                            <th>Фото</th>
                            <th>Редагувати</th>
                            <th>Видалити</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php /** @var TYPE_NAME $categoriaList */
                    foreach ($categoriaList as $tmp):?>
                    <tr>
                        <td><?=$tmp['name']?></td>
                        <td><img class="cat-img" src="templates/img/cat/<?=$tmp['photo']?>"></td>
                        <td class="td-centr"><a href="redCat/<?=$tmp['id']?>"><img style="width: 30px" src="templates/img/cat/red.png"></a></td>
                        <td class="td-centr"><a href="delCat/<?=$tmp['id']?>"><img style="width: 30px" src="templates/img/cat/dell.png"></a></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

</body>
</html>