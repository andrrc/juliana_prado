<?php
session_start();
require 'config.php';
require 'conferir_estoque.php';
require 'model/model_venda.php';
require 'inserir.php';
require 'atualizar.php';
$sku = 123;
$quantidade = 1;
$forma_pagamento = 'pix';
$data = '2025-05-05';
$preco = 2.5;
$produto = conferir_estoque(pdo: $pdo, sku: $sku, quantidade: $quantidade);
if ($produto) {
    $venda = new Venda(sku: $sku, forma_pagamento: $forma_pagamento, quantidade: $quantidade, data: $data, produto: $produto, preco: $preco);
    $venda->estoqueDisponivel();
    inserir(pdo: $pdo, venda: $venda);
    atualizar(pdo: $pdo, venda: $venda);
} else {
    $_SESSION['mensagem'] = "Erro: Produto não encontrado";
    header("Location:../venda.php");
}
