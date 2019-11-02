<?php

class Categoria
{
    public static function getCategoriaList () {
        $dbc = Db::getConnection();
        $categoriaList = array();
        $query = "SELECT id, name, photo FROM categoria";
        $result = $dbc->query($query);
        if (!$result) {
            echo "DIE";
            die;
        }
        $i = 0;
        while ($next = $result->fetch(PDO::FETCH_ASSOC)) {
            $categoriaList[$i]['id'] = $next['id'];
            $categoriaList[$i]['name'] = $next['name'];
            if (empty($next['photo'])) {
                $categoriaList[$i]['photo'] = "nophoto.jpg";
            } else {
                $categoriaList[$i]['photo'] = $next['photo'];
            }
            $i++;
        }
        return $categoriaList;
    }

    public static function addCategoria ($cat) {
        $dbc = Db::getConnection();
        $query = "INSERT INTO categoria (name, photo) VALUES ('".$cat['nameCat']."', '".$cat['photoCat']."')";
        $result = $dbc->query($query);
        if (!$result) {
            echo "DIE";
            die;
        }
        return "Категорія успішно додана";
    }

    public static function getOneCat ($id) {
        $dbc = Db::getConnection();
        $query = "SELECT id, name, photo FROM categoria WHERE id = $id";
        $result = $dbc->query($query);
        if (!$result) {
            echo "DIE";
            die;
        }
        $dataCat = array();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $dataCat = $result->fetch();
        return $dataCat;
    }

    public static function deleteCat ($id) {
        $dbc = Db::getConnection();
        $query = "DELETE FROM categoria WHERE id = $id";
        $result = $dbc->query($query);
        if (!$result) {
            echo "DIE";
            die;
        }
        return "Категорія успішно видалена";
    }

    public static function redCat ($cat) {
        if (is_array($cat)) {
            $dbc = Db::getConnection();
            $query = "UPDATE categoria SET name='".$cat['name']."', photo='".$cat['photo']."' WHERE id=".$cat['id'];
            $result = $dbc->query($query);
            if (!$result) {
                echo "DIE";
                die;
            }
            return "Товар успішно відредагований";
        }
    }
}