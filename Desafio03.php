<?php

declare(strict_types=1);

class Cliente{

    private string $nome;
    private string $cpf;

    public function __construct(string $nome, string $cpf){
        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    public function getNome(): string{
        return $this->nome;
    }

    public function getCpf(): string{
        return $this->cpf;
    }
}


class Pedido{

    private int $numeroPedido;
    private float $valorTotal;
    private Cliente $cliente;

    public function __construct(int $numeroPedido, float $valorTotal, Cliente $cliente){
        $this->numeroPedido = $numeroPedido;
        $this->valorTotal = $valorTotal;
        $this->cliente = $cliente;
        
    }

    public function exibirResumo():void{
        echo "Número do pedido: {$this->numeroPedido}<br>";
        echo "Cliente:" . $this->cliente->getNome() . "<br>";
        echo "Cpf:" . $this->cliente->getCpf() . "<br>";
        echo "Valor Total: R$" . number_format($this->valorTotal, 2, ",", ".") . "<br>";
    }
}


$cliente = new Cliente("Luany lima", "123.456.789-00");

$pedido = new Pedido(130, 280.00, $cliente);


$pedido->exibirResumo();

?>