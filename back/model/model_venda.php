<?php

class Venda{
    public $sku;
public $forma_pagamento;
public $preco;
public $quantidade;
public $data;
public $produto;

public function __construct($sku,$forma_pagamento,$preco,$quantidade,$data,$produto){

$this->sku = $sku;
$this->forma_pagamento = $forma_pagamento;
$this->preco = $preco;
$this->quantidade = $quantidade;
$this->data = $data;
$this->produto = $produto;

}
public function valorTotal(){
    return $this->preco * $this->quantidade;
}
public function estoqueDisponivel(){
    return $this->produto->estoque_atual - $this->quantidade;
}


}
?>