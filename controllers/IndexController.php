<?php
require_once (ROOT."/models/Categoria.php");
require_once (ROOT."/models/Tovar.php");
session_start();
class IndexController
{
    public function actionMain () {
        $catList = Categoria::getListCat();
        $itemsList = Tovar::getListTov();
        require_once (ROOT."/views/main.php");
        return true;
    }
}