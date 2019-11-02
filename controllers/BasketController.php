<?php
require_once (ROOT."/models/Basket.php");
require_once (ROOT."/models/Categoria.php");
session_start();
class BasketController
{

    public function actionItemsBasketAdd ($id) {
        if (!empty($id)) {
            $kol = 0;
            $exzist = false;
            if (!isset($_SESSION['items'])) {
                $_SESSION['items'] = array();
            }
            for ($i = 0; $i < count($_SESSION['items']); $i++) {
                if ($_SESSION['items'][$i]['id'] == $id) {
                    $_SESSION['items'][$i]['kol']++;
                    $exzist = true;
                    break;
                }
            }
            if ($exzist == false) {
                Basket::getInfoItems($id);
            }
            $totalSum = 0;
            foreach ($_SESSION['items'] as $tmp) {
                $totalSum += $tmp['kol'];
            }
            $_SESSION['kolItems'] = $totalSum;
            header('Location: /');
            return true;
        }
    }

    public function actionBasketList () {
        $catList = Categoria::getListCat();
        require_once (ROOT."/views/basket.php");
        return true;
    }

    public function actionItemsBasketDell ($id) {
        if (isset($id) && !empty($id)) {

            for ($i = 0; $i < count($_SESSION['items']); $i++) {
                if ($_SESSION['items'][$i]['id'] == $id) {
                    $_SESSION['kolItems'] = $_SESSION['kolItems'] - $_SESSION['items'][$i]['kol'];
                    unset($_SESSION['items'][$i]);
                    break;
                }
            }

            $items = array();
            foreach ($_SESSION['items'] as $tmp) {
                if (!empty($tmp)) {
                    $items[] = $tmp;
                }
            }
            unset($_SESSION['items']);
            $_SESSION['items'] = array();
            $_SESSION['items'] = $items;
            unset($items);

            header('Location: /basketList');
        }
    }

    public function actionItemsBasketClear () {
        if (isset($_SESSION['items']) && count($_SESSION['items']) > 0) {
            unset($_SESSION['items']);
            $_SESSION['items'] = array();
            $_SESSION['kolItems'] = 0;
        }
        header('Location: /');
        return true;
    }

    public function actionRecount () {
        if (isset($_SESSION['items']) && count($_SESSION['items']) > 0) {
            if (isset($_POST['recount'])) {
                $_SESSION['kolItems'] = 0;
                for ($i = 0; $i < count($_SESSION['items']); $i++) {
                    $name_elem = "kol".$_SESSION['items'][$i]['id'];
                    $_SESSION['items'][$i]['kol'] = $_POST[$name_elem];
                    $_SESSION['kolItems'] += $_SESSION['items'][$i]['kol'];
                }
            }
            header('Location: /basketList');
        }
        return true;
    }

    public function actionOrder () {
        if (isset($_SESSION['items']) && count($_SESSION['items']) > 0) {
            $catList = Categoria::getListCat();
            require_once (ROOT. "/views/order.php");
            return true;
        }
    }

    public function actionOrderClient () {
        if (isset($_POST['orderClient']) && !empty($_POST['nameClient']) && !empty($_POST['phoneClient']) && !empty($_POST['emailClient']) && !empty($_POST['addressClient'])) {
            $client = array('name'=>$_POST['nameClient'], 'phone'=>$_POST['phoneClient'], 'email'=>$_POST['emailClient'], 'address'=>$_POST['addressClient'], 'note'=>$_POST['noteClient']);
            $idClient = Basket::addOrder($client);
            $relavion = array();
            foreach ($_SESSION['items'] as $tmp) {
                $relavion = array('id_client'=>$idClient, 'id_item'=>$tmp['id'], 'kolvo'=>$tmp['kol']);
                Basket::addRelation($relavion);
            }
            unset($_SESSION['kolItems']);
            $_SESSION['kolItems'] = array();
            $_SESSION['items'] = array();
            header('Location: /');
        } else {
            echo 0;
        }
        return true;
    }
}