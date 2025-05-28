<?php
require '../vendor/autoload.php';

use Andrefilho\JulianaPrado\Models\VendaModel;
use Andrefilho\JulianaPrado\Repository\ProdutoRepository;
use Andrefilho\JulianaPrado\Repository\VendaRepository;
use Andrefilho\JulianaPrado\Models\DatabaseModel;

try {

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (isset($_GET['submit'])) {


            // Dados da venda (poderiam vir de um formulário ou API futuramente)
            $sku = $_GET['sku'];
            $forma_pagamento = $_GET['forma_pagamento'];
            $preco = $_GET['preco'];
            $quantidade = $_GET['quantidade'];
            $data = $_GET['data_venda'];

            // Conexão com banco
            $pdo = DatabaseModel::getConnection();

            // Instanciando classes
            $produtoRepo = new ProdutoRepository($pdo);
            $vendaRepo = new VendaRepository($pdo);

            // Buscar produto pelo SKU
            $produto = $produtoRepo->buscarPorSku($sku);
            if (!$produto) {
                throw new Exception("Produto com SKU {$sku} não encontrado.");
            }

            // Verificar estoque
            if (!$produto->podeVender($quantidade)) {
                throw new Exception("Estoque insuficiente para SKU {$sku}.");
            }

            // Criar venda
            $venda = new VendaModel(
                sku: $sku,
                forma_pagamento: $forma_pagamento,
                preco: $preco,
                quantidade: $quantidade,
                data: $data
            );
            // Salvar venda
            $vendaRepo->salvar_venda(venda: $venda);

            // Atualizar estoque
            $produto->baixarEstoque($quantidade);
            $produtoRepo->atualizarEstoque($produto);

            echo "Venda realizada com sucesso!";
        }else{
            throw new Exception("Submit não realizado corretamente...");
        }
    } else {
        throw new Exception("Metodo errado, usar 'GET'");
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
