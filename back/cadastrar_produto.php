<?php
require '../vendor/autoload.php';

use Andrefilho\JulianaPrado\Models\ProdutoModel;
use Andrefilho\JulianaPrado\Repository\ProdutoRepository;
use Andrefilho\JulianaPrado\Models\DatabaseModel;

$sku = $_GET['sku'];
$produto_nome = $_GET['produto'];
$tamanho = $_GET['tamanho'];
$preco = $_GET['preco'];
$estoque_atual = $_GET['estoque_atual'];
$tipo = $_GET['tipo'];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_GET['submit'])){
    try {
        //Conexão com o banco de dados
        $pdo = DatabaseModel::getConnection();
        // Criando objeto Produto Model
        $produto = new ProdutoModel(sku: $sku, produto: $produto_nome, tamanho: $tamanho, preco: $preco, estoque_atual: $estoque_atual, tipo: $tipo);
        // Criando produtoRepo
        $repositorio_produto = new ProdutoRepository(pdo: $pdo);
        //Buscando se ja existe o produto no banco de dados
        $buscaSku = $repositorio_produto->buscarPorSku(sku: $produto->getSku());
        // Se a variavel estiver vazia é porque não existe o produto, então logicamente, podemos cadastrar ele, sem duplicar
        if (empty($buscaSku)) {
            //Cadastrando produto
            $repositorio_produto->cadastrar(produto: $produto);
        } else {
            echo "esse produto já existe";
        }
    } catch (Exception $e) {
        echo ' deu erro meno';
    }
    }
}
