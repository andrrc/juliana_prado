<?php

function inserir($pdo,$venda)
{
    try{
    $sql = "INSERT INTO vendido (sku, forma_pagamento, preco, quantidade, data_vendido) 
        VALUES (:sku, :forma_pagamento, :preco, :quantidade, :data_vendido)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':sku' => $venda->sku,
        ':forma_pagamento' => $venda->forma_pagamento,
        ':preco' => $venda->preco,
        ':quantidade' => $venda->quantidade,
        ':data_vendido' => $venda->data
    ]);
    }
    catch(PDOException $e){
        echo "Erro ao registrar venda: " . $e->getMessage();
    }
}
?>
