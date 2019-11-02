<?php
require_once(ROOT . "/models/User.php");

class UserController
{

    public function actionIndex()
    {
        require_once(ROOT . "/views/protection.php");
        if (isset($_SESSION['name']) && isset($_SESSION['avatar'])) {
            require_once(ROOT . "/views/index.php");
            return true;
        } else {
            header('Location: /admin/login');
        }

    }

    public function actionAddUser()
    {
        require_once(ROOT . "/views/protection.php");
        if (isset($_SESSION['name']) && isset($_SESSION['avatar'])) {
            require_once(ROOT . "/views/adduser.php");
            return true;
        } else {
            header('Location: /admin/login');
        }
    }

    public function actionAddUserData()
    {
        require_once(ROOT . "/views/protection.php");
        if (isset($_SESSION['name']) && isset($_SESSION['avatar'])) {
            if (isset($_POST['addUser']) && !empty($_POST['nameUser']) && !empty($_POST['loginUser']) && !empty($_POST['emailUser']) && !empty($_POST['phoneUser']) &&
                !empty($_POST['pass1User']) && $_POST['pass1User'] == $_POST['pass2User']) {
                if ($_FILES['avatarUser']['error'] == 0) {
                    $fileNameTMP = $_FILES['avatarUser']['tmp_name'];
                    $fileName = time() . $_FILES['avatarUser']['name'];
                    move_uploaded_file($fileNameTMP, ROOT . "/templates/img/user/" . $fileName);
                } else {
                    $fileName = "";
                }
                $addUser = array("nameUser" => $_POST['nameUser'], "loginUser" => $_POST['loginUser'], "emailUser" => $_POST['emailUser'], "phoneUser" => $_POST['phoneUser'], "avatarUser" => $fileName,
                    "pass" => SHA1(SHA1($_POST['pass1User'])));
                $result = User::addUser($addUser);
                echo "Користувач добавлений";
            } else {
                echo "Не достатньо данних для добавлення";
            }
            return true;
        } else {
            header('Location: /admin/login');
        }
    }

}