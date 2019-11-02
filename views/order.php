
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Internet SHOP</title>
    <link rel="stylesheet" href="../templates/css/shop-reset.css">
    <link rel="stylesheet" href="../templates/css/shop-main.css">
</head>
<body>
<header class="header">
    <div class="info-line">
        <div class="container">
            <menu class="menu-info">
                <li><a href="#">Головна</a></li>
                <li><a href="#">Товари</a></li>
                <li><a href="#">Про нас</a></li>
                <li><a href="#">Контакти</a></li>
            </menu>
        </div>
    </div>
    <div class="logo">

        <div class="container">
            <a href="/" class="nonemode">
                <div class="logo__text">
                    Stony Shop
                </div>
            </a>
            <div class="logo__text2">
                Розумний вибір
            </div>
        </div>
    </div>
    <div class="info">
        <div class="container">
            <div class="block-border">
                <div class="catalog-text">
                    <div class="catalog-text-data">
                        <div class="menu-img">
                            <img src="../templates/img/menu-png.png">
                        </div>
                        <div class="catalog-text__text">
                            Каталог товарів
                        </div>
                    </div>
                </div>

                <div class="block-phone-info">
                    <div class="phone-info__text">
                        +380(68)263-83-88
                    </div>
                </div>

                <div class="block-search">
                    <form action="" method="post">
                        <input class="text-search" type="text" placeholder="Що ви хочете придбати ?">
                        <input class="button-search" type="submit" value="Знайти">
                    </form>

                </div>
            </div>
            <div class="block-basket">
                <div class="basket-data">
                    <img src="../templates/img/basket.png">
                    <div class="basket__text">
                        Кошик
                    </div>
                    <div class="basket__text__kol">
                        <?php
                        if (isset($_SESSION['kolItems']) && !empty($_SESSION['kolItems'])) {
                            echo $_SESSION['kolItems'];
                        } else {
                            echo 0;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
<div class="container">
    <section class="categoria">
        <div class="section-block-categoria">
            <menu class="menu-categoria">
                <?php /** @var TYPE_NAME $catList */
                foreach ($catList as $tmp):?>
                    <li><a href=""><?=$tmp['name']?><img alt="" class="arrow-right" src="../templates/img/arrow-right.png"></a></li>
                <?php endforeach;?>
                <!--                <li><a href="">Телефони<img alt="" class="arrow-right" src="../templates/img/arrow-right.png"></a></li>-->
                <!--                <li><a href="">Планшети<img alt="" class="arrow-right" src="../templates/img/arrow-right.png"></a></li>-->
                <!--                <li><a href="">Ноутбуки<img alt="" class="arrow-right" src="../templates/img/arrow-right.png"></a></li>-->
            </menu>
        </div>
    </section>
    <section class="block-items">
        <div class="section-block-items">
            <div class="section-block-items__text">
                Замовлення товарів
                <hr>
            </div>
            <div class="items-block">
                <div class="block-items-order">
                    <div class="items-client">
                        <?php foreach ($_SESSION['items'] as $tmp):?>
                            <div class="items-client__one">
                                <img src="../Admin/templates/img/tov/<?=$tmp['photo']?>">
                                <div class="items-client__text">
                                <div class="items-client__name">
                                    <?=$tmp['name']?>
                                </div>
                                    <div class="items-client__kol">
                                       Кількість: <?=$tmp['kol']?>
                                    </div>
                                    <div class="items-client__sum">
                                        Сума: <?=$tmp['price'] * $tmp['kol']?> грн
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>

                <div class="block-form-order">
                    <div class="form-client">
                    <form action="/basket/orderClient" method="post">
                        <label for="nameClient" class="label-client_text">Введіть ФІО</label><br>
                        <input type="text" class="text-search form-input" id="nameClient" name="nameClient" placeholder="ФІО"><br>
                        <label for="phoneClient" class="label-client_text">Введіть номер телефону</label><br>
                        <input type="text" class="text-search form-input" id="phoneClient" name="phoneClient" placeholder="Номер телефону"><br>
                        <label for="emailClient" class="label-client_text">Введіть електронну адресу</label><br>
                        <input type="text" class="text-search form-input" id="emailClient" name="emailClient" placeholder="Електронна адреса"><br>
                        <label for="addressClient" class="label-client_text">Укажіть домашню адресу</label><br>
                        <input type="text" class="text-search form-input" id="addressClient" name="addressClient" placeholder="Адреса"><br>
                        <label for="noteClient" class="label-client_text">Задайте примітку</label><br>
                        <textarea class="text-search form-input" id="noteClient" name="noteClient" placeholder="Примітка"></textarea><br>
                        <input type="submit" class="button-search" style="margin-left: 1px" id="orderClient" name="orderClient" value="Замовити">
                    </form>
                    </div>
                </div>
<!--                <form action="/basket/recount" method="POST">-->
<!--                    --><?php //$totalSum = 0; foreach ($_SESSION['items'] as $tmp): $totalSum += $tmp['price'] * $tmp['kol']?>
<!--                        <div class="items-basket">-->
<!--                            <img src="../Admin/templates/img/tov/--><?//=$tmp['photo']?><!--">-->
<!--                            <div class="items-basket__info-text">-->
<!--                                <div class="info-text__name">--><?//=$tmp['name']?><!--</div>-->
<!--                                <div class="info-text__price">--><?//=floatval($tmp['price'])?><!-- грн</div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="items-basket__dell">-->
<!--                                <a href="basket/dell/--><?//=$tmp['id']?><!--" class="nonemode text-button"><span class="button-buy">Видалити</span></a>-->
<!--                            </div>-->
<!--                            <div class="total-sum">-->
<!--                                Сума:<br>-->
<!--                                --><?php //echo $tmp['price'] * $tmp['kol']; ?><!-- грн-->
<!--                            </div>-->
<!--                            <div class="items-basket__kol">-->
<!--                                <input type="number" name="kol--><?//=$tmp['id']?><!--" min="1" max="100" id="kol" value="--><?//=$tmp['kol']?><!--">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    --><?php //endforeach;?>
<!--                    <div class="block-button">-->
<!--                        <input type="submit" name="recount" class="button-buy" value="Перерахувати">-->
<!--                        <a href="/basket/clear" class="nonemode text-button"><span class="button-buy">Очистити</span></a>-->
<!--                        <a href="/basket/order" class="nonemode text-button"><span class="button-buy">Замовити</span></a>-->
<!--                    </div>-->
<!--                </form>-->
<!--                <div class="block-sum">-->
<!--                    Загальна сума: --><?php //echo floatval($totalSum);?><!-- грн-->
<!--                </div>-->
            </div>
        </div>
    </section>
</div>

<footer>
    <div class="container">
        <div class="footer-block-left">
            © 2019 Надійний інтернет-магазин Stony Shop
        </div>
        <div class="footer-block-right">
            <img src="../templates/img/mastercard.jpg">
            <img src="../templates/img/visa.jpg">
            <div class="footer-block-right__text">
                Проєктування і дизайн - Антон Стащенко
            </div>
        </div>
    </div>
</footer>


</body>
</html>