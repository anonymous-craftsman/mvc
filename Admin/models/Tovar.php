<?php


class Tovar
{
    public static function getIdCat () {
        $dbc = Db::getConnection();
        $massIdCat = array();
        $query = "SELECT id, name FROM categoria";
        $result = $dbc->query($query);
        if (!$result) {
            echo "DIE";
            die;
        }
        $i = 0;
        while ($next = $result->fetch(PDO::FETCH_ASSOC)) {
            $massIdCat[$i]['idCat'] = $next['id'];
            $massIdCat[$i]['nameCat'] = $next['name'];
            $i++;
        }
        return $massIdCat;
    }

    public static function addTovar ($tov) {
        $dbc = Db::getConnection();
        $query = "INSERT INTO items (name, price, kol, har, id_cat, photo) VALUE ('".$tov['nameTov']."', '".$tov['priceTov']."', '".$tov['kolTov']."',
         '".$tov['harTov']."', '".$tov['idCatTov']."', '".$tov['photoTov']."')";
        $result = $dbc->query($query);
        if (!$result) {
            echo "DIE";
            die;
        }
        return "Товар успішно доданий";
    }

    public static function getTovarList () {
        $dbc = Db::getConnection();
        $tovars = array();
        $query = "SELECT id, name, price, kol, har, id_cat, photo FROM items";
        $result = $dbc->query($query);
        if (!$result) {
            echo "DIE";
            die;
        }
        $i = 0;
        while ($next = $result->fetch(PDO::FETCH_ASSOC)) {
            $tovars[$i]['idTov'] = $next['id'];
            $tovars[$i]['nameTov'] = $next['name'];
            $tovars[$i]['priceTov'] = $next['price'];
            $tovars[$i]['kolTov'] = $next['kol'];
            $tovars[$i]['harTov'] = $next['har'];
            $tovars[$i]['idCatTov'] = $next['id_cat'];
            if (empty($next['photo'])) {
                $tovars[$i]['photoTov'] = "nophoto.jpg";
            } else {
                $tovars[$i]['photoTov'] = $next['photo'];
            }
            $i++;
        }
        return $tovars;
    }

    public static function getTovarOne ($id) {
        if (isset($id) && !empty($id)) {
            $dbc = Db::getConnection();
            $query = "SELECT id, name, price, kol, har, photo, id_cat FROM items WHERE id=$id";
            $result = $dbc->query($query);
            if (!$result) {
                echo "DIE";
                die;
            }
            $dataTov = array();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $dataTov = $result->fetch();
            return $dataTov;
        }
    }

    public static function deleteTov ($id) {
        if (isset($id) && !empty($id)) {
            $dbc = Db::getConnection();
            $query = "DELETE FROM items WHERE id=$id";
            $result = $dbc->query($query);
            if (!$result) {
                echo "DIE";
                die;
            }
            return "Видалення успішне";
        }
    }
}