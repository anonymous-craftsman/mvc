<?php
include_once(ROOT . "/models/Tovar.php");

class TovarController
{
    public function actionAddTov()
    {
        require_once(ROOT . "/views/protection.php");
        if (isset($_SESSION['name']) && isset($_SESSION['avatar'])) {
            $idCat = Tovar::getIdCat();
            require_once(ROOT . "/views/addtov.php");
            return true;
        } else {
            header('Location: /admin/login');
        }
    }

    public function actionAddTovData()
    {
        require_once(ROOT . "/views/protection.php");
        if (isset($_SESSION['name']) && isset($_SESSION['avatar'])) {
            if (isset($_POST['addTov']) && !empty($_POST['nameTov']) && !empty($_POST['priceTov']) && !empty($_POST['idCatTov']) && !empty($_POST['harTov']) &&
                !empty($_POST['kolTov'])) {
                if ($_FILES['photoTov']['error'] == 0) {
                    $fileNameTMP = $_FILES['photoTov']['tmp_name'];
                    $fileName = time() . $_FILES['photoTov']['name'];
                    move_uploaded_file($fileNameTMP, ROOT . "/templates/img/tov/" . $fileName);
                } else {
                    $fileName = "";
                }
                $addTov = array("nameTov" => $_POST['nameTov'], "priceTov" => $_POST['priceTov'], "idCatTov" => $_POST['idCatTov'],
                    "harTov" => $_POST['harTov'], "kolTov" => $_POST['kolTov'], "photoTov" => $fileName);
                $result = Tovar::addTovar($addTov);
            } else {
                echo "Не достатньо данних для добавлення товару";
                exit;
            }
            header('Location: /admin/listTov');
            return true;
        } else {
            header('Location: /admin/login');
        }
    }

    public function actionListTov()
    {
        require_once(ROOT . "/views/protection.php");
        if (isset($_SESSION['name']) && isset($_SESSION['avatar'])) {
            $tovarList = Tovar::getTovarList();
            require_once(ROOT . "/views/listtov.php");
            return true;
        } else {
            header('Location: /admin/login');
        }
    }

    public function actionDelTov($id)
    {
        require_once(ROOT . "/views/protection.php");
        if (isset($_SESSION['name']) && isset($_SESSION['avatar'])) {
            if (isset($id) && !empty($id)) {
                $dataTov = Tovar::getTovarOne($id);
                if (!$dataTov['photo']) {
                    $dataTov['photo'] = "nophoto.jpg";
                }
                require_once(ROOT . "/views/deltov.php");
                return true;
            } else {
                header('Location: /admin/login');
            }
        }
    }

    public function actionDeleteTov($id)
    {
        require_once(ROOT . "/views/protection.php");
        if (isset($_SESSION['name']) && isset($_SESSION['avatar'])) {
            if (isset($id) && isset($_POST['deleteTov']) && !empty($_POST['dell']) && $_POST['dell'] == "yes") {
                $file = Tovar::getTovarOne($id);
                if ($file['photo'] || $file['photo'] != "nophoto.jpg") {
                    @unlink(ROOT . "/templates/img/tov/" . $file['photo']);
                }
                Tovar::deleteTov($id);
                header('Location: /admin/listTov');
            } else {
                echo "Видалення відмінене або неможливе";
                exit;
            }
            return true;
        } else {
            header('Location: /admin/login');
        }
    }

}