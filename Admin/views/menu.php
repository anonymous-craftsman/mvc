<!--<div class="pod-menu">-->
<!--    <menu class="menu-li">-->
<!--        <h3>Навігація</h3>-->
<!--        <li><a href="#">Список товарів</a></li>-->
<!--        <li><a href="#">Добавлення товару</a></li>-->
<!--        <li><a href="#">Добавлення адміністратора</a></li>-->
<!--    </menu>-->
<!--</div>-->
<section class="left-menu">
    <div class="user">
        <div class="user-block">
            <img src="templates/img/user/<?=$_SESSION['avatar']?>" alt="user">
            <div class="user-name">
                <?=$_SESSION['name']?>
                <hr>
            </div>
        </div>
    </div>
    <div class="menu-text">
        <img src="templates/img/stony/list_bullet_icon_124933.png">
        <div class="menu-text__text">
            Меню:
        </div>
        <menu class="menu">
            <li><a href="listCat">Список категорій</a></li>
            <li><a href="addCat">Добавлення категорій</a></li>
            <li><a href="listTov">Список товарів</a></li>
            <li><a href="addTov">Добавлення товару</a></li>
            <li><a href="addUser">Добавлення користувача</a></li>
            <li><a href="orderlist">Список замовлень</a></li>
        </menu>
    </div>
</section>