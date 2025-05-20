<?php
require '../vendor/autoload.php';

use Andrefilho\JulianaPrado\Models\ProdutoModel;
use Andrefilho\JulianaPrado\Repository\ProdutoRepository;
use Andrefilho\JulianaPrado\Models\DatabaseModel;

$sku = 1;
$produto = "Coracao";
$tamanho = "M";
$preco = 10.90;
$estoque_atual = 10;
$tipo = "Brinco";
try {
    $produto = new ProdutoModel(sku: $sku, produto: $produto, tamanho: $tamanho, preco: $preco, estoque_atual: $estoque_atual, tipo: $tipo);
    $pdo = DatabaseModel::getConnection();
    $repositorio_produto = new ProdutoRepository(pdo: $pdo);
    $buscaSku = $repositorio_produto->buscarPorSku(sku: $produto->getSku());
    if (empty($buscaSku)){
        $repositorio_produto->cadastrar(produto: $produto);
    }else{
        echo "esse produto já existe";
    }
} catch (Exception $e) {
    echo ' deu erro meno';
}
