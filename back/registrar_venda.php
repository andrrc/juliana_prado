<?php
require 'vendor/autoload.php';

use Andrefilho\JulianaPrado\Models\VendaModel;
// use Andrefilho\JulianaPrado\Repository\ProdutoRepository;
// use Andrefilho\JulianaPrado\Repository\VendaRepository;
// use Andrefilho\JulianaPrado\Models\DatabaseModel;
// use PDO;


$sku = 1;
$forma_pagamento = 'pix';
$preco = 10.90;
$quantidade = 1;
$data = "2025-05-20";
try{
    $venda = new VendaModel(sku:$sku,forma_pagamento:$forma_pagamento,preco:$preco,quantidade:$quantidade,data:$data);
    echo $venda->getData();
}catch(Exception $e){
    echo $e->getMessage();
}

?>
