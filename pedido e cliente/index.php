<?php

declare(strict_types=1);

function text($string): string
{
    return "<br> $string <br>";
}

class Pedido
{
    private Cliente $cliente;

    public function __construct(private int $numeroProduto, private float $valorTotal, private string $nome, private string $cpf)
    {
        $this->cliente = new Cliente($nome, $cpf);
    }

    public function getNumeroProduto(): int
    {
        return $this->numeroProduto;
    }

    public function getValorTotal(): float
    {
        return $this->valorTotal;
    }

    public function exibirResumo(): string
    {
        return text("Numero do pedido: " . $this->getNumeroProduto()) . text("Valor total do produto: " . $this->getValorTotal()) . text("Nome do cliente: " . $this->cliente->getNome()) . text("CPF do cliente: " . $this->cliente->getCpf());
    }
}

class Cliente
{

    protected Pedido $pedido;

    public function __construct(private string $nome, private string $cpf) {}

    public function getNome(): string
    {
        return $this->nome;
    }
    public function getCpf(): string
    {
        return $this->cpf;
    }
}

$silva = new Cliente("João Silva", "000000000");

$pedido = new Pedido(101, 199.95, $silva->getNome(), $silva->getCpf());

echo $pedido->exibirResumo();

?>

























<style>
    body {
        font-family: sans-serif;
        background: #111111;
        color: whitesmoke;
    }
</style>