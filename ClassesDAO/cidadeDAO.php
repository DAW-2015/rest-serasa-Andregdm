<?php

class CidadeDAO {

    public static function getCidadeByID($id) {
        $connection = Connection::getConnection();
        $sql = "SELECT * FROM cidades WHERE id=$id";
        $result = mysqli_query($connection, $sql);
        $cidade = mysqli_fetch_object($result);

        //recupera estado da cidade
        $sql = "SELECT * FROM estados WHERE id='$cidade->estados_id'";
        $result = mysqli_query($connection, $sql);
        $cidade->estado = mysqli_fetch_object($result);

        return $cidade;
    }

    public static function getAll() {
        $connection = Connection::getConnection();
        $sql = "SELECT * FROM cidades";

        // recupera todos os cidades
        $result = mysqli_query($connection, $sql);
        $cidades = array();
        while ($cidade = mysqli_fetch_object($result)) {
            if ($cidade != null) {
                $cidades[] = $cidade;
            }
        }
        return $cidades;
    }

    public static function updateCidade($cidade, $id) {
        $connection = Connection::getConnection();
        $sql = "UPDATE cidades SET nome='$cidade->nome', estados_id=$cidade->estados_id WHERE id=$id";
        $result = mysqli_query($connection, $sql);

        $cidadeAtualizado = CidadeDAO::getCidadeByID($cidade->id);
        return $cidadeAtualizado;
    }

    public static function deleteCidade($id) {
        $connection = Connection::getConnection();
        $sql = "DELETE FROM cidades WHERE id=$id";
        $result = mysqli_query($connection, $sql);

        if ($result === FALSE) {
            return false;
        } else {
            return true;
        }
    }

    public static function addCidade($cidade) {
        $connection = Connection::getConnection();
        $sql = "INSERT INTO cidades (nome, estados_id) VALUES ('$cidade->nome', $cidade->estados_id)";
        $result = mysqli_query($connection, $sql);

        $novoCidade = CidadeDAO::getCidadeByID($cidade->id);
        return $novoCidade;
    }

}
