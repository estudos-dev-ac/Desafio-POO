<?php

declare(strict_types=1);

abstract class Conta
{
    private string $titular;
    private float $saldo;

    public function __construct(string $titular, float $saldoInicial)
    {
        if ($saldoInicial < 0) {
            throw new InvalidArgumentException("Saldo inicial não pode ser negativo");
        }

        $this->titular = $titular;
        $this->saldo = $saldoInicial;
    }

    public function getTitular(): string
    {
        return $this->titular;
    }

    public function getSaldo(): float
    {
        return $this->saldo;
    }

    protected function adicionarSaldo(float $valor): void
    {
        $this->saldo += $valor;
    }

    protected function removerSaldo(float $valor): void
    {
        $this->saldo -= $valor;
    }

    public function depositar(float $valor): bool
    {
        if ($valor <= 0) {
            echo "O valor do depósito deve ser maior que 0<br>";
            return false;
        }

        $this->adicionarSaldo($valor);

        echo "Depósito realizado com sucesso!<br>";

        return true;
    }

    abstract public function sacar(float $valor): bool;

    abstract public function tipoConta(): string;

    public function exibirDadosDaConta(): void
    {
        echo "Nome: " . $this->titular . "<br>";
        echo "Saldo: R$ " . number_format($this->saldo, 2, ',', '.') . "<br>";
        echo "Tipo de Conta: " . $this->tipoConta() . "<br><br>";
    }
}

class ContaCorrente extends Conta
{
    public function sacar(float $valor): bool
    {
        if ($valor <= 0) {
            echo "O valor do saque deve ser maior que 0<br>";
            return false;
        }

        if ($valor > $this->getSaldo()) {
            echo "Saldo insuficiente<br>";
            return false;
        }

        $this->removerSaldo($valor);

        echo "Saque realizado com sucesso!<br>";

        return true;
    }

    public function tipoConta(): string
    {
        return "Conta Corrente";
    }
}

class ContaPoupanca extends Conta
{
    public function sacar(float $valor): bool
    {
        if ($valor <= 0) {
            echo "O valor do saque deve ser maior que 0<br>";
            return false;
        }

        $saldoMinimo = 100;

        if ($this->getSaldo() - $valor < $saldoMinimo) {
            echo "A conta poupança precisa manter R$ 100 de saldo mínimo<br>";
            return false;
        }

        $this->removerSaldo($valor);

        echo "Saque realizado com sucesso!<br>";

        return true;
    }

    public function tipoConta(): string
    {
        return "Conta Poupança";
    }
}

$contaJoao = new ContaPoupanca("Joao", 1000);
$contaMaria = new ContaPoupanca("Maria", 700);

$contaJoao->depositar(500);

$contaJoao->exibirDadosDaConta();

$contas = [
    $contaJoao,
    $contaMaria
];

foreach ($contas as $conta) {
    echo "Realizando saques na de " . $conta->getTitular() . "<br>";
    $conta->sacar(100);
    echo "<br>";
}