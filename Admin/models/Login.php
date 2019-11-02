<?php

class Login
{
    public static function checkLogin ($mass) {
        if (is_array($mass)) {
            $dbc = Db::getConnection();
            $query = "SELECT name, avatar FROM users WHERE login='".$mass['login']."' AND pass='".$mass['pass']."'";
            $result = $dbc->query($query);
            if (!$result) {
                echo "DIE<br>";
                echo $query;
                die;
            }
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $file = $result->fetch();
            return $file;
        }
    }
}