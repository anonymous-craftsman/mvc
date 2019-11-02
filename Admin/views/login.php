<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="templates/css/stony-reset.css">
    <link rel="stylesheet" href="templates/css/stony-login.css">
</head>
<body>
<header class="main-block">
    <div class="login-in-block">
        <div class="login-in-block__text">
            Авторизація
        </div>
        <div class="login-in-block__text-rep">
            Будь ласка, авторизуйтесь
        </div>
        <form action="loginData" method="POST">
        <div class="input-block">
            <div class="input-block-text">
                <label class="label" for="login">Логін</label><br>
                <input class="input-text" type="text" name="login" id="login" placeholder="Введіть логін">
            </div>
            <div class="input-block-text">
                <label class="label" for="pass">Пароль</label><br>
                <input class="input-text" type="password" name="pass" id="pass" placeholder="Введіть пароль">
            </div>
            <input class="button" type="submit" name="loginin" id="loginin" value="Увійти">
        </div>
        </form>
    </div>
</header>
</body>
</html>