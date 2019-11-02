<?php

class Categoria
{
    public static function getListCat () {
        $dbc = Db::getConnection();
        $query = "SELECT id, name FROM categoria";
        $result = $dbc->query($query);
        if (!$result) {
            echo "DIE";
            die;
        }
        $i = 0;
        $categoriaList = array();
        while ($next = $result->fetch(PDO::FETCH_ASSOC)) {
            $categoriaList[$i]['id'] = $next['id'];
            $categoriaList[$i]['name'] = $next['name'];
            $i++;
        }
        return $categoriaList;
    }
}