<?php
require_once (ROOT."/models/Login.php");
class LoginController
{
    public function actionLogin () {
        require_once (ROOT."/views/login.php");
        return true;
    }

    public function actionLoginData () {
        if (isset($_POST['loginin']) && !empty($_POST['login']) && !empty($_POST['pass'])) {
            $userData = array("login"=>$_POST['login'], "pass"=>SHA1(SHA1($_POST['pass'])));
            $result = Login::checkLogin($userData);
            if (!$result) {
                echo "Горе";
                exit;
            }
            session_start();
            setcookie("name", $result['name'], time()+60*60*24*30*3);
            setcookie("avatar", $result['avatar'], time()+60*60*24*30*3);
            $_SESSION['name'] = $result['name'];
            $_SESSION['avatar'] = $result['avatar'];
            header('Location: /admin/');
        } else {
            echo "Не достатньо данних для входу";
        }
        return true;
    }

    public function actionExit () {
        require_once(ROOT . "/views/protection.php");
        if (isset($_SESSION['name']) && isset($_SESSION['avatar'])) {
            if (isset($_COOKIE['name'])) {
                setcookie('name','',time()-60*60*2);
            }
            if (isset($_COOKIE['avatar'])) {
                setcookie('avatar','',time()-60*60*2);
            }
            if (isset($_COOKIE[session_name()])) {
                setcookie(session_name(),'',time()-60*60*2);
            }
            $_SESSION = array();
//            session_destroy();
            header('Location: /admin/index');
        } else {
            header('Location: /admin/login');
        }
    }
}