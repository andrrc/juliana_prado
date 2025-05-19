<?php

function atualizar($venda, $pdo)
{
    try {
        $sql = "UPDATE estoque SET 
           estoque_atual = :estoque_atual
        WHERE sku = :sku";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':sku' => $venda->sku,
            ':estoque_atual' => $venda->estoqueDisponivel(),
        ]);
    } catch (PDOException $e) {
        echo "Erro ao atualizar venda: " . $e->getMessage();
    }
}
?>
