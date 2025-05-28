<?php
namespace Andrefilho\JulianaPrado\Repository;
use Andrefilho\JulianaPrado\Models\VendaModel;
use PDO;
class VendaRepository {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Salvar uma venda no banco
    public function salvar_venda(VendaModel $venda): bool {
    $sql = "INSERT INTO vendido(sku, forma_pagamento, preco, quantidade, data_vendido) 
            VALUES (:sku, :forma_pagamento, :preco, :quantidade, :data_vendido)";

    $stmt = $this->pdo->prepare($sql);
    $resultado = $stmt->execute([
        'sku' => $venda->getSku(),
        'forma_pagamento' => $venda->getFormaPagamento(),
        'preco' => $venda->getPreco(),
        'quantidade' => $venda->getQuantidade(),
        'data_vendido' => $venda->getData(),
    ]);

    if (!$resultado) {
        print_r($stmt->errorInfo()); // <-- mostra o motivo da falha
    }

    return $resultado;
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