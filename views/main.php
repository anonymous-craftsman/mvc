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
            <div class="logo__text">
                Stony Shop
            </div>
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
                <a href="/basketList">
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
                </a>
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
                Всі товари
                <hr>
            </div>
            <div class="items-block">
                <?php /** @var TYPE_NAME $itemsList */
                foreach ($itemsList as $tmp):?>
                    <a class="info-item" href="#">
                        <div class="items">
                            <div class="items-img">
                                <img src="Admin/templates/img/tov/<?=$tmp['photo']?>">
                            </div>
                            <div class="items-name">
                                <?=$tmp['name']?>
                            </div>
                            <div class="items-price">
                                <?=floatval($tmp['price'])?> грн
                            </div>
                            <div class="items-buy">
                                <a class="href-button" href="/basket/add/<?=$tmp['id']?>"><button class="button-buy">Купити</button></a>
                            </div>
                        </div>
                    </a>
                <?php endforeach;?>


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