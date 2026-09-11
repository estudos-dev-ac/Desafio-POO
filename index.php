<?php

declare(strict_types=1);
abstract class ContaBancaria
{
    public function __construct(private string $titular, private float $saldo)
    {
        if ($this->saldo < 0) {
            $this->saldo = 0;
        }
    }

    public function mostrarSaldo(): float
    {
        return $this->saldo;
    }
    public function mostrarTitular(): string
    {
        return $this->titular;
    }
    private function adicionarSaldo(float $valor): void
    {
        $this->saldo += $valor;
    }

    protected function removerSaldo(float $valor): void
    {
        $this->saldo -= $valor;
    }
    public function depositar(float $valor): string
    {
        if ($valor <= 0) {
            return "[ERROR] valor invalido";
        } else {
            $this->adicionarSaldo($valor);
            return "Saldo adicionado com sucesso";
        }
    }

    public function exibirDadosDaConta(): void
    {
        echo "======================<br>";
        echo "Titular: " . $this->mostrarTitular() . "<br>";
        echo "Saldo R$: " . number_format($this->mostrarSaldo(), 2, ",", ".") . "<br>";
        echo "Tipo de conta: " . $this->tipoConta() . "<br>";
        echo "======================<br> <br>";
    }


    abstract function sacar(float $valor): string;
    abstract function tipoConta(): string;
}


class ContaCorrente extends ContaBancaria
{


    public function tipoConta(): string
    {
        return "Corrente";
    }
    public function __construct(string $titular, float $saldo, protected bool $acesso = false)
    {
        parent::__construct($titular, $saldo);
    }

    public function permitirAcesso(): string
    {
        $this->acesso = true;
        return "Acesso liberado";
    }
    public function sacar(float $valor): string
    {
        if ($valor > $this->mostrarSaldo()) {
            return "[ERROR] Saldo insuficiente";
        } elseif ($valor <= 0) {
            return "[ERROR] Saque invalido";
        } elseif ($valor >= (($this->mostrarSaldo() * 50) / 100) && $this->acesso == false) {
            return "[ERROR] você não pode efetuar um saque maior ou igual a 50% da so seu saldo sem permissão";
        } else {
            $this->removerSaldo($valor);
            $this->acesso = false;
            return "Saque feito com sucesso";
        }
    }
}

class ContaPoupanca extends ContaBancaria
{

    public function tipoConta(): string
    {
        return "Poupança";
    }
    public function sacar(float $valor): string
    {
        if ($valor > $this->mostrarSaldo()) {
            return "[ERROR] Saldo insuficiente";
        } elseif ($valor <= 0) {
            return "[ERROR] Saque invalido";
        } elseif (($valor - $this->mostrarSaldo()) < 100) {
            return "[ERROR] você não pode efetuar um saque a onde o saldo fique menor que 100 reais";
        } else {
            $this->removerSaldo($valor);
            return "Saque feito com sucesso";
        }
    }
}

$contaSilva = new ContaCorrente("Kauã", 600);
$contaJoao = new ContaPoupanca("João", 1000);

$contaSilva->exibirDadosDaConta();
$contaJoao->exibirDadosDaConta();
