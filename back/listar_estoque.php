<?php
require '../vendor/autoload.php';

use Andrefilho\JulianaPrado\Repository\ProdutoRepository;
use Andrefilho\JulianaPrado\Models\DatabaseModel;
try{
    $pdo = DatabaseModel::getConnection();
    $produtoRepository = new ProdutoRepository($pdo);
    $produtos = $produtoRepository->listarProdutos();
}
catch (Exception $e) {
    echo "Erro ao listar produtos: " . $e->getMessage();
    exit;
}
?>