<?php


class Basket
{
    public static function getInfoItems ($id) {
        if (isset($id)) {
            $dbc = Db::getConnection();
            $query = "SELECT name, price, photo FROM items WHERE id=$id";
            $result = $dbc->query($query);
            if (!$result) {
                echo "DIE";
                die;
            }
            $next = $result->fetch(PDO::FETCH_ASSOC);
            if (!$next['photo']) {
                $next['photo'] = "nophoto.jpg";
            }
            $_SESSION['items'][] = array("id"=>$id, "name"=>$next['name'], "photo"=>$next['photo'], "price"=>$next['price'] ,"kol"=>1);
            return true;
        }
    }

    public static function addOrder ($client) {
        if (is_array($client)) {
            $dbc = Db::getConnection();
            $query = "INSERT INTO clients (name, phone, email, address, note) VALUES ('".$client['name']."', '".$client['phone']."', '".$client['email']."', '".$client['address']."', '".$client['note']."')";
            $result = $dbc->query($query);
            if (!$result) {
                echo "DIE";
                die;
            }
            $idClient = $dbc->lastInsertId();
            return $idClient;
        }
    }

    public static function addRelation ($mass) {
        if (is_array($mass)) {
            $dbc = Db::getConnection();
            $query = "INSERT INTO relation (id_client, id_item, kolvo, order_date) VALUES ('" . $mass['id_client'] . "', '" . $mass['id_item'] . "', '" . $mass['kolvo'] . "', now())";
            $result = $dbc->query($query);
            if (!$result) {
                echo "DIE";
                die;
            }
            return true;
        }
    }
}