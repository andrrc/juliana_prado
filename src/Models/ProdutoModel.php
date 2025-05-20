<?php
namespace Andrefilho\JulianaPrado\Models;
use Exception;
use InvalidArgumentException;
class ProdutoModel{

    private int $sku;
    private string $produto;
    private string $tamanho;
    private float $preco;
    private int $estoque_atual;
    private string $tipo;
    //Setter
    public function setSku(int $sku): void
    {
        if ($sku <= 0) {
            throw new InvalidArgumentException(message: "SKU inválido.");
        }
        $this->sku = $sku;
    }
    //Get
    public function getSku(): int
    {
        return $this->sku;
    }


    public function setProduto($produto): void
    {
        $this->produto = trim(string: $produto);
    }

    public function getProduto(): string
    {
        return $this->produto;
    }


    public function setTamanho($tamanho): void
    {
        $this->tamanho = trim(string: $tamanho);
    }
    public function getTamanho(): string
    {
        return $this->tamanho;
    }

    public function setPreco($preco): void
    {
        if ($preco <= 0) {
            throw new InvalidArgumentException(message: "Preço inválido.");
        }
        $this->preco = $preco;
    }
    public function getPreco(): float
    {
        return $this->preco;
    }
    public function setEstoqueAtual($estoque_atual): void
    {
        if ($estoque_atual < 0) {
            throw new InvalidArgumentException(message: "Estoque inválido, estoque digitado é igual ou menor que 0");
        }
        $this->estoque_atual = $estoque_atual;
    }

    public function getEstoqueAtual(): int
    {
        return $this->estoque_atual;
    }


    public function setTipo($tipo): void
    {
        $this->tipo = trim(string: $tipo);
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }


    public function __construct(
        int $sku,
        string $produto,
        string $tamanho,
        float $preco,
        int $estoque_atual,
        string $tipo
    ) {
        $this->setSku(sku: $sku);
        $this->setProduto(produto: $produto);
        $this->setTamanho(tamanho: $tamanho);
        $this->setPreco(preco: $preco);
        $this->setEstoqueAtual(estoque_atual: $estoque_atual);
        $this->setTipo(tipo: $tipo);
    }

    public function podeVender(int $quantidade): bool
    {
        return $this->estoque_atual >= $quantidade;
    }

    public function baixarEstoque(int $quantidade): void
    {
        if (!$this->podeVender(quantidade: $quantidade)) {
            throw new \Exception("Estoque insuficiente");
        }
        $this->estoque_atual -= $quantidade;
    }
}
