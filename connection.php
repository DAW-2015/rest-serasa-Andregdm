<?php

class Connection {

    public static $database = "daw-aluno4-cms";
    public static $address = "150.164.102.160";
    public static $user = "daw-aluno4";
    public static $password = "andre";

    public static function getConnection() {
        $connection = mysqli_connect(Connection::$address, Connection::$user, Connection::$password, Connection::$database);

        return $connection;
    }

}
