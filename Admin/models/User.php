<?php

class User
{
    public static function addUser ($user) {
        if (is_array($user)) {
            $dbc = Db::getConnection();
            $query = "INSERT INTO users (name, login, email, phone, pass, avatar) VALUES ('".$user['nameUser']."', '".$user['loginUser']."' ,'".$user['emailUser']."', 
            '".$user['phoneUser']."', '".$user['pass']."', '".$user['avatarUser']."')";
            $result = $dbc->query($query);
            if (!$result) {
                echo "DIE";
                die;
            }
            return "Користувач добавлений";
        }
    }
}