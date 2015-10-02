<?php

class DividaDAO {

    public static function getDividaByCliAndEstab($cliente_id, $estabelecimento_id) {
        $connection = Connection::getConnection();
        $sql = "SELECT * FROM dividas WHERE clientes_id=$cliente_id AND estabelecimentos_id=$estabelecimentos_id";
        $result = mysqli_query($connection, $sql);
        $divida = mysqli_fetch_object($result);

        //recupera cliente da divida
        $sql = "SELECT * FROM clientes WHERE id=$divida->clientes_id";
        $result = mysqli_query($connection, $sql);
        $divida->cliente = mysqli_fetch_object($result);

        //recupera estabelecimento da divida
        $sql = "SELECT * FROM estabelecimentos WHERE id=$divida->estabelecimentos_id";
        $result = mysqli_query($connection, $sql);
        $divida->estabelecimento = mysqli_fetch_object($result);

        return $divida;
    }

    public static function getAll() {
        $connection = Connection::getConnection();
        $sql = "SELECT * FROM dividas";

        // recupera todos os dividas
        $result = mysqli_query($connection, $sql);
        $dividas = array();
        while ($divida = mysqli_fetch_object($result)) {
            if ($divida != null) {
                $dividas[] = $divida;
            }
        }
        return $dividas;
    }

    public static function updateDivida($divida, $cliente_id, $estabelecimento_id) {
        $connection = Connection::getConnection();
        $sql = "UPDATE dividas SET valor='$divida->valor' WHERE clientes_id=$cliente_id AND estabelecimentos_id=$estabelecimento_id";
        $result = mysqli_query($connection, $sql);

        $dividaAtualizada = DividaDAO::getDividaByCliAndEstab($divida->clientes_id, $divida->estabelecimentos_id);
        return $dividaAtualizada;
    }

    public static function deleteDivida($id) {
        $connection = Connection::getConnection();
        $sql = "DELETE FROM dividas WHERE id=$id";
        $result = mysqli_query($connection, $sql);

        if ($result === FALSE) {
            return false;
        } else {
            return true;
        }
    }

    public static function addDivida($divida) {
        $connection = Connection::getConnection();
        $sql = "INSERT INTO dividas (nome) VALUES ('$divida->nome')";
        $result = mysqli_query($connection, $sql);

        $novaDivida = DividaDAO::getDividaByCliAndEstab($divida->clientes_id, $divida->estabelecimentos_id);
        return $novaDivida;
    }

}
