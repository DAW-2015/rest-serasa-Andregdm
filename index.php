<?php

require 'connection.php';

require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
require './ClassesDAO/cidadeDAO.php';
require './ClassesDAO/clienteDAO.php';
require './ClassesDAO/dividaDAO.php';
require './ClassesDAO/estabelecimentoDAO.php';
require './ClassesDAO/estadoDAO.php';

$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');

$app->get('/cidades/:id', function ($id) {
    //recupera a cidade
    $cidade = CidadeDAO::getCidadeByID($id);
    echo json_encode($cidade);
});

$app->post('/cidades', function() {
    // recupera o request
    $request = \Slim\Slim::getInstance()->request();

    // insere a cidade
    $novaCidade = json_decode($request->getBody());
    $novaCidade = CidadeDAO::addCidade($novaCidade);

    echo json_encode($novaCidade);
});

$app->put('/cidades/:id', function ($id) {
    // recupera o request
    $request = \Slim\Slim::getInstance()->request();

    // atualiza a cidade
    $cidade = json_decode($request->getBody());
    $cidade = CidadeDAO::updateCidade($cidade, $id);

    echo json_encode($cidade);
});

$app->delete('/cidades/:id', function($id) {
    // exclui a cidade
    $isDeleted = CidadeDAO::deleteCidade($id);

    // verifica se houve problema na exclusão
    if ($isDeleted) {
        echo "{'message':'Cidade excluída'}";
    } else {
        echo "{'message':'Erro ao excluir cidade'}";
    }
});

$app->get('/clientes/:id', function ($id) {
    //recupera o cliente
    $cliente = ClienteDAO::getClienteByID($id);
    echo json_encode($cliente);
});

$app->get('/clientes/:cpf', function ($cpf) {
    //recupera o cliente
    $cliente = ClienteDAO::getClienteByCPF($cpf);
    echo json_encode($cliente);
});

$app->get('/clientes', function() {
    // recupera todos os clientes
    $clientes = ClienteDAO::getAll();
    echo json_encode($clientes);
});

$app->post('/clientes', function() {
    // recupera o request
    $request = \Slim\Slim::getInstance()->request();

    // insere o cliente
    $novoCliente = json_decode($request->getBody());
    $novoCliente = ClienteDAO::addCliente($novoCliente);

    echo json_encode($novoCliente);
});

$app->put('/clientes/:id', function ($id) {
    // recupera o request
    $request = \Slim\Slim::getInstance()->request();

    // atualiza o cliente
    $cliente = json_decode($request->getBody());
    $cliente = ClienteDAO::updateCliente($cliente, $id);

    echo json_encode($cliente);
});

$app->delete('/clientes/:id', function($id) {
    // exclui o cliente
    $isDeleted = ClienteDAO::deleteCliente($id);

    // verifica se houve problema na exclusão
    if ($isDeleted) {
        echo "{'message':'Produto excluído'}";
    } else {
        echo "{'message':'Erro ao excluir produto'}";
    }
});

$app->get('/dividas/:id', function ($id) {
    //recupera a cidade
    $divida = DividaDAO::getDividaByID($id);
    echo json_encode($divida);
});

$app->post('/dividas', function() {
    // recupera o request
    $request = \Slim\Slim::getInstance()->request();

    // insere a cidade
    $novaDivida = json_decode($request->getBody());
    $novaDivida = DividaDAO::addDivida($novaDivida);

    echo json_encode($novaDivida);
});

$app->put('/dividas/:id', function ($id) {
    // recupera o request
    $request = \Slim\Slim::getInstance()->request();

    // atualiza a cidade
    $divida = json_decode($request->getBody());
    $divida = DividaDAO::updateDivida($divida, $id);

    echo json_encode($divida);
});

$app->delete('/dividas/:id', function($id) {
    // exclui a divida
    $isDeleted = DividaDAO::deleteDivida($id);

    // verifica se houve problema na exclusão
    if ($isDeleted) {
        echo "{'message':'Divida excluída'}";
    } else {
        echo "{'message':'Erro ao excluir divida'}";
    }
});

$app->get('/estabelecimentos/:id', function ($id) {
    //recupera o estabelecimento
    $estabelecimento = EstabelecimentoDAO::getEstabelecimentoByID($id);
    echo json_encode($estabelecimento);
});

$app->post('/estabelecimentos', function() {
    // recupera o request
    $request = \Slim\Slim::getInstance()->request();

    // insere o estabelecimento
    $novoEstabelecimento = json_decode($request->getBody());
    $novoEstabelecimento = EstabelecimentoDAO::addEstabelecimento($novoEstabelecimento);

    echo json_encode($novoEstabelecimento);
});

$app->put('/estabelecimentos/:id', function ($id) {
    // recupera o request
    $request = \Slim\Slim::getInstance()->request();

    // atualiza o estabelecimento
    $estabelecimento = json_decode($request->getBody());
    $estabelecimento = EstabelecimentoDAO::updateEstabelecimento($estabelecimento, $id);

    echo json_encode($estabelecimento);
});

$app->delete('/estabelecimentos/:id', function($id) {
    // exclui o estabelecimento
    $isDeleted = EstabelecimentoDAO::deleteEstabelecimento($id);

    // verifica se houve problema na exclusão
    if ($isDeleted) {
        echo "{'message':'Estabelecimento excluída'}";
    } else {
        echo "{'message':'Erro ao excluir estabelecimento'}";
    }
});

$app->get('/estados/:id', function ($id) {
    //recupera o estado
    $estado = EstadoDAO::getEstadoByID($id);
    echo json_encode($estado);
});

$app->post('/estados', function() {
    // recupera o request
    $request = \Slim\Slim::getInstance()->request();

    // insere o estado
    $novoEstado = json_decode($request->getBody());
    $novoEstado = EstadoDAO::addEstado($novoEstado);

    echo json_encode($novoEstado);
});

$app->put('/estados/:id', function ($id) {
    // recupera o request
    $request = \Slim\Slim::getInstance()->request();

    // atualiza o estado
    $estado = json_decode($request->getBody());
    $estado = EstadoDAO::updateEstado($estado, $id);

    echo json_encode($estado);
});

$app->delete('/estados/:id', function($id) {
    // exclui o estado
    $isDeleted = EstadoDAO::deleteEstado($id);

    // verifica se houve problema na exclusão
    if ($isDeleted) {
        echo "{'message':'Estado excluído'}";
    } else {
        echo "{'message':'Erro ao excluir estado'}";
    }
});

$app->run();
