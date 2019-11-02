<!--<header class="compact">-->
<!--        <span class="logo">-->
<!--            <img class="image-logo" src="templates/img/logo.png">-->
<!--        </span>-->
<!--    <menu class="menu">-->
<!--        <li><a href="#">Головна</a></li>-->
<!--        <li><a href="#">Товари</a></li>-->
<!--        <li><a href="#">Інформація</a></li>-->
<!--    </menu>-->
<!--</header>-->
<header class="header">
    <div class="container">
        <div class="container-header">
            <div class="admin-name">
                <img class="icon" src="templates/img/stony/icon.png" alt="icon">
                <div class="admin-name__text">
                    Stony
                </div>
            </div>
            <div class="admin-setting">
                <img class="admin-setting-img" src="templates/img/user/<?=$_SESSION['avatar']?>">
                <div class="admin-setting__text">
                    <?=$_SESSION['name']?>
                </div>
                <a href="exit"><img class="admin-setting-exit" src="templates/img/exit.png"></a>
            </div>
        </div>
    </div>
</header>