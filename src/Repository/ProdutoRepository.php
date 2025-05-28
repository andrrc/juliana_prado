<?php

namespace Andrefilho\JulianaPrado\Repository;

use Andrefilho\JulianaPrado\Models\ProdutoModel;
use \PDO;

class ProdutoRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function atualizarEstoque(ProdutoModel $produto): void
    {
        $sql = "UPDATE estoque SET estoque_atual = :estoque WHERE sku = :sku";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':estoque' => $produto->getEstoqueAtual(),
            ':sku' => $produto->getSku()
        ]);
    }
    public function cadastrar(ProdutoModel $produto): bool
    {
        $sql = "INSERT INTO estoque(sku,produto,tamanho,preco,estoque_atual,tipo) VALUES (:sku,:produto,:tamanho,:preco,:estoque_atual,:tipo)";
        $stmt = $this->pdo->prepare(query: $sql);
        return $stmt->execute(params: [
            'sku' => $produto->getSku(),
            'produto' => $produto->getProduto(),
            'tamanho' => $produto->getTamanho(),
            'preco' => $produto->getPreco(),
            'estoque_atual' => $produto->getEstoqueAtual(),
            'tipo' => $produto->getTipo()
        ]);
    }
    public function buscarPorSku(int $sku): ?ProdutoModel
    {
        $stmt = $this->pdo->prepare("SELECT * FROM estoque WHERE sku = :sku");
        $stmt->execute(['sku' => $sku]);
        $row = $stmt->fetch();

        if ($row) {
            return new ProdutoModel(
                sku: $row['sku'],
                produto: $row['produto'],
                tamanho: $row['tamanho'],
                preco: $row['preco'],
                estoque_atual: $row['estoque_atual'],
                tipo: $row['tipo']
            );
        }
        return null;
    }
    
}
