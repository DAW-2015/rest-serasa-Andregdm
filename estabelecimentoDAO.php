<?php

require 'connection.php';

class EstabelecimentoDAO
{

  public static function getEstabelecimentoByID($id) {
    $connection = Connection::getConnection();
    $sql = "SELECT * FROM estabelecimentos WHERE id=$id";
    $result  = mysqli_query($connection, $sql);
    $estabelecimento = mysqli_fetch_object($result);

    //recupera cidade do estabelecimento
    $sql = "SELECT * FROM cidades WHERE id=$estabelecimento->cidades_id";
    $result = mysqli_query($connection, $sql);
    $estabelecimento->cidade =  mysqli_fetch_object($result);

    return $estabelecimento;
  }


  public static function getAll()
  {
    $connection = Connection::getConnection();
    $sql = "SELECT * FROM estabelecimentos";

    // recupera todos os clientes
    $result  = mysqli_query($connection, $sql);
    $estabelecimentos = array();
    while ($estabelecimento = mysqli_fetch_object($result)) {
      if ($estabelecimento != null) {
        $estabelecimentos[] = $estabelecimento;
      }
    }
    return $estabelecimentos;
  }


  public static function updateEstabelecimento($estabelecimento, $id) {
    $connection = Connection::getConnection();
    $sql = "UPDATE estabelecimentos SET nome='$estabelecimento->nome', cidades_id=$estabelecimento->cidades_id WHERE id=$id";
    $result  = mysqli_query($connection, $sql);

    $estabelecimentoAtualizado = EstabelecimentoDAO::getEstabelecimentoByID($estabelecimento->id);
    return $estabelecimentoAtualizado;
  }


  public static function deleteEstabelecimento($id) {
    $connection = Connection::getConnection();
    $sql = "DELETE FROM estabelecimentos WHERE id=$id";
    $result  = mysqli_query($connection, $sql);

    if ($result === FALSE) {
      return false;
    } else {
      return true;
    }
  }


  public static function addEstabelecimento($estabelecimento) {
    $connection = Connection::getConnection();
    $sql = "INSERT INTO estabelecimentos (nome, cidades_id) VALUES ('$estabelecimento->nome', $estabelecimento->cidades_id)";
    $result  = mysqli_query($connection, $sql);

    $novoEstabelecimento = ClienteDAO::getClienteByCPF($estabelecimento->cpf);
    return $novoEstabelecimento;
  }
}
