<?php
function conferir_estoque($pdo, $sku, $quantidade){
    $sql_confereir = "SELECT * FROM estoque WHERE sku = :sku";
    $stmt = $pdo->prepare(query: $sql_confereir);
    $stmt->execute(params: [':sku' => $sku]);
    $produto = $stmt->fetch();
    if (isset($produto) AND $produto['estoque_atual'] >= $quantidade) {
        return $produto;
    } else {
        return false;
    }
}
