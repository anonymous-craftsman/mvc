<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Видалення категорії - Stony</title>
    <link rel="stylesheet" href="../templates/css/stony-reset.css">
    <link rel="stylesheet" href="../templates/css/stony-main.css">
</head>
<body>

<header class="header">
    <div class="container">
        <div class="container-header">
            <div class="admin-name">
                <img class="icon" src="../templates/img/stony/icon.png" alt="icon">
                <div class="admin-name__text">
                    Stony
                </div>
            </div>
            <div class="admin-setting">
                <img class="admin-setting-img" src="../templates/img/user/<?=$_SESSION['avatar']?>">
                <div class="admin-setting__text">
                    <?=$_SESSION['name']?>
                </div>
                <a href="../exit"><img class="admin-setting-exit" src="../templates/img/exit.png"></a>
            </div>
        </div>
    </div>
</header>

<section class="left-menu">
    <div class="user">
        <div class="user-block">
            <img src="../templates/img/user/<?=$_SESSION['avatar']?>" alt="user">
            <div class="user-name">
                <?=$_SESSION['name']?>
                <hr>
            </div>
        </div>
    </div>
    <div class="menu-text">
        <img src="../templates/img/stony/list_bullet_icon_124933.png">
        <div class="menu-text__text">
            Меню:
        </div>
        <menu class="menu">
            <li><a href="../listCat">Список категорій</a></li>
            <li><a href="../addCat">Добавлення категорій</a></li>
            <li><a href="../listTov">Список товарів</a></li>
            <li><a href="../addTov">Добавлення товару</a></li>
            <li><a href="#">Добавлення користувача</a></li>
        </menu>
    </div>
</section>

<section class="content">
    <div class="heading-block">
        <div class="heading-block__text">
            <a href="/admin">Головна</a> / <a href="/admin/listCat">Список категорій</a> / Видалення категорії - <?= /** @var TYPE_NAME $dataCat */
            $dataCat['name']?> <hr>
        </div>
        <div class="content-info">
            <div class="content-info__text">
                <form action="../../admin/deleteCat/<?=$dataCat['id']?>" method="POST" class="formDell">
                    <div class="label">Ви дійсно бажаєте видалити категорію - <?=$dataCat['name']?> ?</div>
                    <img src="../templates/img/cat/<?=$dataCat['photo']?>"<br><br>
                    <input type="radio" name="dell" checked value="yes">Так
                    <input type="radio" name="dell" value="noy">Ні<br>
                    <input type="submit" class="button" name="deleteCat" id="deleteCat" value="Видалити">
                </form>
            </div>
        </div>
    </div>
</section>

</body>
</html>