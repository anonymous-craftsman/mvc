<?php


class Tovar
{
    public static function getListTov () {
        $dbc = Db::getConnection();
        $query = "SELECT id, name, price, kol,  photo, id_cat FROM items";
        $result = $dbc->query($query);
        $i = 0;
        $listTov = array();
        while ($next = $result->fetch(PDO::FETCH_ASSOC)) {
            $listTov[$i]['id'] = $next['id'];
            $listTov[$i]['name'] = $next['name'];
            $listTov[$i]['price'] = $next['price'];
            $listTov[$i]['kol'] = $next['kol'];
            $listTov[$i]['id_cat'] = $next['id_cat'];
            if (!$next['photo']) {
                $listTov[$i]['photo'] = "nophoto.jpg";
            } else {
                $listTov[$i]['photo'] = $next['photo'];
            }
            $i++;
        }
        return $listTov;
    }
}