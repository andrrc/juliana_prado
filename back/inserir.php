<?php

function inserir($pdo,$venda)
{
    try{
    $sql = "INSERT INTO vendas (sku, forma_pagamento, preco, quantidade, data) 
        VALUES (:sku, :forma_pagamento, :preco, :quantidade, :data)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':sku' => $venda->sku,
        ':forma_pagamento' => $venda->forma_pagamento,
        ':preco' => $venda->preco,
        ':quantidade' => $venda->quantidade,
        ':data' => $venda->data
    ]);
    }
    catch(PDOException $e){
        echo "Erro ao registrar venda: " . $e->getMessage();
    }
}
?>
