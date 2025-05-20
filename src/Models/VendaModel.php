<?php
namespace Andrefilho\JulianaPrado\Models;
use Exception;
use InvalidArgumentException;
class VendaModel{
    private int $sku;
    private string $forma_pagamento;
    private float $preco;
    private int $quantidade;
    private string $data;

    public function __construct(int $sku, string $forma_pagamento, float $preco, int $quantidade, string $data)
    {
        $this->setSku(sku: $sku);
        $this->setFormaPagamento(forma_pagamento: $forma_pagamento);
        $this->setPreco(preco: $preco);
        $this->setQuantidade(quantidade: $quantidade);
        $this->setData(data: $data);
    }

    public function getSku(): int
    {
        return $this->sku;
    }

    public function setSku(int $sku): void
    {
        if ($sku <= 0) {
            throw new InvalidArgumentException("SKU inválido.");
        }
        $this->sku = $sku;
    }

    public function getFormaPagamento(): string
    {
        return $this->forma_pagamento;
    }

    public function setFormaPagamento(string $forma_pagamento): void
    {
        // Aqui você pode validar formas de pagamento válidas, por exemplo
        $this->forma_pagamento = $forma_pagamento;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function setPreco(float $preco): void
    {
        if ($preco < 0) {
            throw new InvalidArgumentException("Preço não pode ser negativo.");
        }
        $this->preco = $preco;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    public function setQuantidade(int $quantidade): void
    {
        if ($quantidade <= 0) {
            throw new InvalidArgumentException("Quantidade inválida.");
        }
        $this->quantidade = $quantidade;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function setData(string $data): void
    {
        $this->data = $data;
    }
}
