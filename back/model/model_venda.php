<?php

class Venda
{
    public int $sku;
    public string $forma_pagamento;
    public float $preco;
    public int $quantidade;
    public string $data;
    public array $produto;


    public function __construct($sku, $forma_pagamento, $preco, $quantidade, $data, $produto)
    {

        $this->sku = $sku;
        $this->forma_pagamento = $forma_pagamento;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
        $this->data = $data;
        $this->produto = $produto;
    }
    public function valorTotal()
    {
        return $this->preco * $this->quantidade;
    }
    public function estoqueDisponivel(): int {
    $novoEstoque = $this->produto['estoque_atual'] - $this->quantidade;
    if ($novoEstoque < 0) {
        throw new Exception("Estoque insuficiente para o produto SKU {$this->sku}");
    }
    return $novoEstoque;
}
}
