<?php

class EstadoDAO {

    public static function getEstadoByID($id) {
        $connection = Connection::getConnection();
        $sql = "SELECT * FROM estados WHERE id=$id";
        $result = mysqli_query($connection, $sql);
        $estado = mysqli_fetch_object($result);

        return $estado;
    }

    public static function getAll() {
        $connection = Connection::getConnection();
        $sql = "SELECT * FROM estados";

        // recupera todos os estados
        $result = mysqli_query($connection, $sql);
        $estados = array();
        while ($estado = mysqli_fetch_object($result)) {
            if ($estado != null) {
                $estados[] = $estado;
            }
        }
        return $estados;
    }

    public static function updateEstado($estado, $id) {
        $connection = Connection::getConnection();
        $sql = "UPDATE estados SET nome='$estado->nome' WHERE id=$id";
        $result = mysqli_query($connection, $sql);

        $estadoAtualizado = EstadoDAO::getEstadoByID($estado->id);
        return $estadoAtualizado;
    }

    public static function deleteEstado($id) {
        $connection = Connection::getConnection();
        $sql = "DELETE FROM estados WHERE id=$id";
        $result = mysqli_query($connection, $sql);

        if ($result === FALSE) {
            return false;
        } else {
            return true;
        }
    }

    public static function addEstado($estado) {
        $connection = Connection::getConnection();
        $sql = "INSERT INTO estados (nome) VALUES ('$estado->nome')";
        $result = mysqli_query($connection, $sql);

        $novoEstado = EstadoDAO::getEstadoByID($estado->id);
        return $novoEstado;
    }

}
