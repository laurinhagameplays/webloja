<?php

function addPedido($idUsuario, $idEndereco, $idFormaPagamento) {
    $comando = "insert into pedido (idUsuario, idEndereco, idFormapagamento, dataCompra)"
            . "values ($idUsuario, $idEndereco, $idFormaPagamento, curdate())";
    $cnx = conn();
    $resul = mysqli_query($cnx, $comando);
    if (!$resul) {
        die(mysqli_error($cnx));
    }

    $idPedido = mysqli_insert_id($cnx);
    for ($i = 0; $i < count($_SESSION["carrinho"]); $i++) {
        $produto = $_SESSION["carrinho"][$i];
        $id = $produto["idProduto"];
        $quantidade = $produto["quantidade"];
        $comando = "call prc_adicionarPedidoProduto($id, $idPedido, $quantidade)";
        $cnx = conn();
        $resul = mysqli_query($cnx, $comando);
        if (!$resul) {
            die(mysqli_error($cnx));
        }
    }
}

function pegarPedidoIdUsuario($id) {
    $comando = "call prc_pegarPedidoIdUsuario($id)";
    $cnx = conn();
    $resul = mysqli_query($cnx, $comando);
    $pedidos = array();
    while ($pedido = mysqli_fetch_assoc($resul)) {
        $pedidos[] = $pedido;
    }
    return $pedidos;
}

function pegarPedidoId($id) {
    $comando = "call prc_pegarPedidoId($id)";
    $cnx = conn();
    $resul = mysqli_query($cnx, $comando);
    $produtos = array();
    while ($produto = mysqli_fetch_assoc($resul)) {
        $produtos[] = $produto;
    }
    return $produtos;
}

function deletarPedido($id) {
    $comando = "call prc_deletarPedido($id);";
    $cnx = conn();
    $resul = mysqli_query($cnx, $comando);
    if (!$resul) {
        die(mysqli_error($cnx));
    }

    return "Pedido deletado";
}

function pegarPedidosTempo($data1, $data2) {
    $comando = "call prc_pegarPedidosTempo('$data1', '$data2')";
    $cnx = conn();
    $resul = mysqli_query($cnx, $comando);
    $pedidos = array();
    while ($pedido = mysqli_fetch_assoc($resul)) {
        $pedidos[] = $pedido;
    }
    return $pedidos;
}

function pegarPedidosLocalizacao($cidade) {
    $comando = "call prc_pegarPedidosLocalizacao('$cidade')";
    $cnx = conn();
    $resul = mysqli_query($cnx, $comando);
    $pedidos = array();
    while ($pedido = mysqli_fetch_assoc($resul)) {
        $pedidos[] = $pedido;
    }
    return $pedidos;
}

function pegarFaturamentoPeriodo($data1, $data2) {
    $comando = "call prc_pegarFaturamentoPeriodo('$data1', '$data2')";

    $cnx = conn();
    $resul = mysqli_query($cnx, $comando);
    $pedidos = array();
    while ($pedido = mysqli_fetch_assoc($resul)) {
        $pedidos[] = $pedido;
    }
    return $pedidos;
}
