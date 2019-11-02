<?php
include_once(ROOT."/models/Basket.php");

class BasketController
{
    public function actionOrderList()
    {
        require_once(ROOT . "/views/protection.php");
        if (isset($_SESSION['name']) && isset($_SESSION['avatar'])) {
            $orderList = Basket::getListOrder();
            //print_r($orderList);
            require_once(ROOT . "/views/orderlist.php");
            return true;
        } else {
            header('Location: /admin/login');
        }
    }

    public function actionRunBasket ($id) {
        if (isset($id) && !empty($id)) {
            Basket::RunBasket($id);
            header('Location: /admin');
            return true;
        }
    }

    public function actionDellBasket ($id) {
        if (isset($id) && !empty($id)) {
            Basket::DellBasket($id);
            header('Location: /admin');
            return true;
        }
    }
}