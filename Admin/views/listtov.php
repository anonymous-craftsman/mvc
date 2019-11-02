<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список товарів - Stony</title>
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
            <a href="/admin">Головна</a> / Список товарів <hr>
        </div>
        <div class="content-info">
            <div class="content-info__text">
                <table class="table-cat">
                    <thead>
                    <tr>
                        <th>Назва товару</th>
                        <th>Ціна</th>
                        <th>Кількість</th>
                        <th>Фото</th>
                        <th>Редагувати</th>
                        <th>Видалити</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php /** @var TYPE_NAME $tovarList */
                    foreach ($tovarList as $tmp):?>
                        <tr>
                            <td><?=$tmp['nameTov']?></td>
                            <td><?=floatval($tmp['priceTov'])?> грн</td>
                            <td class="td-centr"><?=$tmp['kolTov']?></td>
                            <td class="td-centr"><img class="cat-img" src="templates/img/tov/<?=$tmp['photoTov']?>"></td>
                            <td class="td-centr"><a href=""><img style="width: 30px" src="templates/img/cat/red.png"></a></td>
                            <td class="td-centr"><a href="/admin/delTov/<?=$tmp['idTov']?>"><img style="width: 30px" src="templates/img/cat/dell.png"></a></td>
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