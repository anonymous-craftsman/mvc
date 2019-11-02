<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список замовлень - Stony</title>
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
            <a href="/admin">Головна</a> / Список замовлень <hr>
        </div>
        <div class="content-info">
            <div class="content-info__text">
                <table class="table-cat">

                    <?php /** @var TYPE_NAME $orderList */
                    $itogo = 0; $zmina = 0; $stroka = 1;
                    foreach ($orderList as $tmp):
                        $vartist = $tmp['relation_kol'] * $tmp['price']?>

                        <?php if ($zmina != $tmp['id_client']) { $count_strok = $tmp['count_rows'];  $itogo = 0; $stroka = 1;?>
                    <thead>
                    <tr>
                        <th>Замовник</th>
                        <th>Телефон</th>
                        <th>Email</th>
                        <th>Адреса</th>
                        <th>Примітка</th>
                        <th>Дата замовлення</th>
                        <th>Виконати</th>
                        <th>Видалити</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?=$tmp['name_client']?></td>
                            <td><?=$tmp['phone']?></td>
                            <td><?=$tmp['email']?></td>
                            <td><?=$tmp['address']?></td>
                            <td><?=$tmp['note']?></td>
                            <td><?=$tmp['order_date']?></td>
                            <td><a href="run_basket/<?=$tmp['id_client']?>" class="nonemode">✔</a></td>
                            <td><a href="dell_basket/<?=$tmp['id_client']?>" class="nonemode">✖</a></td>
                        </tr>
                        <tr>
                            <th colspan="2">Фото</th>
                            <th>Назва товару</th>
                            <th>Ціна</th>
                            <th>Кількість товару</th>
                            <th colspan="4">Вартість</th>
                        </tr>
                            <?php } $itogo = $itogo + $vartist?>
                        <tr>
                            <td colspan="2"><img src="templates/img/tov/<?=$tmp['photo_item']?>" alt="Фото" style="height: 60px"></td>
                            <td><?=$tmp['name_item']?></td>
                            <td><?=floatval($tmp['price'])?> грн</td>
                            <td><?=$tmp['relation_kol']?></td>
                            <td><?=$vartist?> грн</td>
                        </tr>
                        <?php

                        if ($count_strok == $stroka) {?>
                        <tr>
                            <th colspan="5">Всього:</th>
                            <th colspan="4"><?=$itogo?> грн</th>
                        </tr>
                            <tr><td class="indent" colspan="9"></td></tr>

                        <?php } if ($zmina != $tmp['id_client']) {
                            $zmina = $tmp['id_client'];
                        } ?>
                    <?php $stroka = $stroka+1; endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

</body>
</html>