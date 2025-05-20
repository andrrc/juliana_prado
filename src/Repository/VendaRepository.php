<?php
namespace Andrefilho\JulianaPrado\Repository;
use Andrefilho\JulianaPrado\Models\VendaModel;
use Andrefilho\JulianaPrado\Models\DatabaseModel;
use PDO;
class VendaRepository {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Salvar uma venda no banco
    public function salvar_venda(VendaModel $venda): bool {
        $sql = "INSERT INTO vendas (sku, forma_pagamento, preco, quantidade, data) 
                VALUES (:sku, :forma_pagamento, :preco, :quantidade, :data)";

        $stmt = $this->pdo->prepare(query: $sql);
        return $stmt->execute(params: [
            'sku' => $venda->getSku(),
            'forma_pagamento' => $venda->getFormaPagamento(),
            'preco' => $venda->getPreco(),
            'quantidade' => $venda->getQuantidade(),
            'data' => $venda->getData(),
        ]);
    }

    // Buscar vendas por SKU
    public function buscarPorSku(int $sku): array {
        $stmt = $this->pdo->prepare("SELECT * FROM vendas WHERE sku = :sku ORDER BY data DESC");
        $stmt->execute(['sku' => $sku]);
        $rows = $stmt->fetchAll();

        $vendas = [];
        foreach ($rows as $row) {
            $vendas[] = new VendaModel(
                $row['sku'],
                $row['forma_pagamento'],
                (float)$row['preco'],
                (int)$row['quantidade'],
                $row['data']
            );
        }
        return $vendas;
    }

    // Outros métodos como atualizar, deletar, listar, etc, podem ser implementados aqui.
}
?>