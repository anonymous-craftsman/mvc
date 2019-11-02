<?php


class Basket
{
    private static function myData ($data) {
        $year = substr($data, 0, 4);
        $mounse = substr($data, 5, 2);
        $days = substr($data, 8);
        return $days."-".$mounse."-".$year;
    }

    public static function getListOrder () {
        $dbc = Db::getConnection();
        $query = "SELECT clients.name as name_client, email, phone, address, note, id_client, relation.kolvo as relation_kol, order_date, items.name as name_item, 
        price, items.photo as photo_item FROM clients INNER JOIN relation on clients.id=relation.id_client INNER JOIN items 
        on relation.id_item=items.id WHERE relation.status=0 ORDER BY relation.order_date DESC, relation.id_client ASC";
       // echo $query;
        $result = $dbc->query($query);
        if (!$result) {
            echo "DIE";
            die;
        }
        $i = 0;
        $listOrder = array();
        while ($next = $result->fetch(PDO::FETCH_ASSOC)) {
            $listOrder[$i]['name_client'] = $next['name_client'];
            $listOrder[$i]['email'] = $next['email'];
            $listOrder[$i]['phone'] = $next['phone'];
            $listOrder[$i]['address'] = $next['address'];
            $listOrder[$i]['note'] = $next['note'];
            $listOrder[$i]['id_client'] = $next['id_client'];
            $listOrder[$i]['relation_kol'] = $next['relation_kol'];
            $listOrder[$i]['order_date'] = self::myData($next['order_date']);
            $listOrder[$i]['name_item'] = $next['name_item'];
            $listOrder[$i]['price'] = $next['price'];
            if (!$next['photo_item']) {
                $next['photo_item'] = "nophoto.jpg";
            }
            $listOrder[$i]['photo_item'] = $next['photo_item'];

            $listOrder[$i]['count_rows'] = self::countLine($next['id_client']);

            $i++;
        }
        return $listOrder;
    }

    public static function countLine ($id_client) {
        if (isset($id_client)) {
            $dbc = Db::getConnection();
            $query = "SELECT id_item FROM relation WHERE id_client = $id_client";
            $result = $dbc->query($query);
            if (!$result) {
                echo "DIE";
                die;
            }
            $countLine = $result->rowCount();
            return $countLine;
        }
    }

    public static function RunBasket ($id_client) {
        if (isset($id_client) && !empty($id_client)) {
            $dbc = Db::getConnection();
            $query = "UPDATE relation SET status = 1 WHERE id_client = $id_client";
            $result = $dbc->query($query);
            if (!$result) {
                echo "ERROR UPDATE STATUS";
                die;
            }
            $queryItem = "SELECT id_item, kolvo FROM relation WHERE id_client = $id_client";
             $resultItem = $dbc->query($queryItem);
             if (!$resultItem){
                 echo "NO ITEMS";
                 die;
             }
             while ($nextItem = $resultItem->fetch(PDO::FETCH_ASSOC)) {
                 $queryKol = "UPDATE items SET kol = kol - ".$nextItem['kolvo']." WHERE id = ".$nextItem['id_item'];
                 $resultKol = $dbc->query($queryKol);
                 if (!$resultKol) {
                     echo "ERROR KOL";
                     die;
                 }
             }
            return true;
        }
    }

    public static function DellBasket ($id_client) {
        if (isset($id_client) && !empty($id_client)) {
            $dbc = Db::getConnection();
            $query = "DELETE FROM relation WHERE id_client = $id_client";
            $result = $dbc->query($query);
            if (!$result) {
                echo "DIE DELETE RELATION";
                die;
            }
            return true;
        }
    }
}