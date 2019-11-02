<?php
if (isset($_COOKIE['name']) && isset($_COOKIE['avatar'])) {
    $_SESSION['name'] = $_COOKIE['name'];
    $_SESSION['avatar'] = $_COOKIE['avatar'];
}