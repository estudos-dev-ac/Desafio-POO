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

    public function verDados(): array
    {
        return [
            "titular" => $this->titular,
            "saldo" => $this->saldo,

        ];
    }

    public function mostrarSaldo(): float {
        return $this->saldo;
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
    abstract function sacar(float $valor): string;
}


class ContaCorrente extends ContaBancaria
{
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

class ContaSalario extends ContaBancaria
{
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

$contaSilva = new ContaCorrente("Kauã Silva da Fonseca", 1100);
