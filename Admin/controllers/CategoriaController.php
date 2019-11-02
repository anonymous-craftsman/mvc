<?php
include_once(ROOT . "/models/Categoria.php");

class CategoriaController
{
    public function actionAddCat()
    {
        require_once(ROOT . "/views/protection.php");
        if (isset($_SESSION['name']) && isset($_SESSION['avatar'])) {
            require_once(ROOT . "/views/addcat.php");
            return true;
        } else {
            header('Location: /admin/login');
        }
    }

    public function actionAddCatData()
    {
        require_once(ROOT . "/views/protection.php");
        if (isset($_SESSION['name']) && isset($_SESSION['avatar'])) {
            if (isset($_POST['addCat']) && !empty($_POST['nameCat'])) {
                if ($_FILES['photoCat']['error'] == 0) {
                    $fileNameTMP = $_FILES['photoCat']['tmp_name'];
                    $fileName = time() . $_FILES['photoCat']['name'];
                    move_uploaded_file($fileNameTMP, ROOT . "/templates/img/cat/" . $fileName);
                } else {
                    $fileName = "";
                }
                $addCat = array("nameCat" => $_POST['nameCat'], "photoCat" => $fileName);
                $result = Categoria::addCategoria($addCat);
            } else {
                echo "Не достатньо данних для добавлення";
                die;
            }
            header('Location: /admin/listCat');
            return true;
        } else {
            header('Location: /admin/login');
        }
    }

    public function actionListCat()
    {
        require_once(ROOT . "/views/protection.php");
        if (isset($_SESSION['name']) && isset($_SESSION['avatar'])) {
            $categoriaList = Categoria::getCategoriaList();
            require_once(ROOT . "/views/listcat.php");
            return true;
        } else {
            header('Location: /admin/login');
        }
    }

    public function actionDellCat($id)
    {
        require_once(ROOT . "/views/protection.php");
        if (isset($_SESSION['name']) && isset($_SESSION['avatar'])) {
            if (isset($id) && !empty($id)) {
                $dataCat = Categoria::getOneCat($id);
                if (!$dataCat['photo']) {
                    $dataCat['photo'] = "nophoto.jpg";
                }
                require_once(ROOT . "/views/delcat.php");
                return true;
            }
        } else {
            header('Location: /admin/login');
        }
    }

    public function actionDeleteCat($id)
    {
        require_once(ROOT . "/views/protection.php");
        if (isset($_SESSION['name']) && isset($_SESSION['avatar'])) {
            if (isset($_POST['deleteCat']) && !empty($id) && !empty($_POST['dell']) && $_POST['dell'] == "yes") {
                $file = Categoria::getOneCat($id);
                if ($file['photo'] != "nophoto.jpg") {
                    @unlink(ROOT . "/templates/img/cat/" . $file['photo']);
                }
                Categoria::deleteCat($id);
                header('Location: /admin/listCat');
            } else {
                echo "Видалення відмінене";
            }
            return true;
        } else {
            header('Location: /admin/login');
        }
    }

    public function actionRedCat($id)
    {
        require_once(ROOT . "/views/protection.php");
        if (isset($_SESSION['name']) && isset($_SESSION['avatar'])) {
            if (isset($id) && !empty($id)) {
                $dataRedCat = Categoria::getOneCat($id);
                if (!$dataRedCat['photo']) {
                    $dataRedCat['photo'] = "nophoto.jpg";
                }
                require_once(ROOT . "/views/redcat.php");
                return true;
            }
        } else {
            header('Location: /admin/login');
        }
    }

    public function actionRedaguvCat($id)
    {
        require_once(ROOT . "/views/protection.php");
        if (isset($_SESSION['name']) && isset($_SESSION['avatar'])) {
            if (isset($_POST['redCat']) && !empty($_POST['nameRedCat'])) {
                $catData = Categoria::getOneCat($id);
                if ($_FILES['newPhotoCat']['error'] == 0) {
                    @unlink(ROOT . "/templates/img/cat/" . $catData['photo']);
                    $fileNameTMP = $_FILES['newPhotoCat']['tmp_name'];
                    $fileName = time() . $_FILES['newPhotoCat']['name'];
                    move_uploaded_file($fileNameTMP, ROOT . "/templates/img/cat/" . $fileName);
                } else {
                    if (!empty($catData['photo'])) {
                        $fileName = $catData['photo'];
                    } else {
                        $fileName = "";
                    }
                }
                $redCat = array("id" => $id, "name" => $_POST['nameRedCat'], "photo" => $fileName);
                $result = Categoria::redCat($redCat);
            } else {
                echo "Не достатньо данних для редагування";
                die;
            }
            header('Location: /admin/listCat');
            return true;
        } else {
            header('Location: /admin/login');
        }
    }

}