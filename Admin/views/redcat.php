<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редагування категорії - Stony</title>
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
            <a href="/admin">Головна</a> / <a href="/admin/listCat">Список категорій</a> / Редагування категорії - <?= /** @var TYPE_NAME $dataRedCat */
            $dataRedCat['name']?> <hr>
        </div>
        <div class="content-info">
            <div class="content-info__text">
                <form action="../../admin/redaguvCat/<?=$dataRedCat['id']?>" method="POST" class="formDell" enctype="multipart/form-data">
                    <img src="../templates/img/cat/<?=$dataRedCat['photo']?>"<br><br>
                    <label class="label" for="nameRedCat">Назва категорії</label><br>
                    <input class="input-text" type="text" name="nameRedCat" id="nameRedCat" value="<?=$dataRedCat['name']?>"><br><br>
                    <label class="label" for="newPhotoCat">Нове фото</label><br>
                    <input class="button" type="file" name="newPhotoCat" id="newPhotoCat"><br><br>
                    <input class="button" type="submit" name="redCat" id="redCat" value="Редагувати категорію">
                </form>
            </div>
        </div>
    </div>
</section>



</body>
</html>