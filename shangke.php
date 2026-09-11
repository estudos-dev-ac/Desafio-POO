<?php
declare(strict_types=1);


class ContaBancaria{
    private string $titular;

    private floar $saldo;

    public function __construct(string $titular, float $saldoInicial){

        $this->titular = $titular;

        if($saldoInicial < $saldo){
            $this->saldo = 0;
        }
        else{
            $this->saldo = $saldoInicial;
        }
    }
    public function depositar(float $valor): string{
        if($valor <= 0){
            return "[ERRO] O valor depositado deve ser maior que 0";
        }
        else{
            $this->saldo += $valor;
        return "Valor depositado com sucesso";
        }
    }
    public function sacar(float $valor): string
    {
        if($valor <= 0){
            return "[ERRO] O valor depositado deve ser maior que 0";
        }
        elseif ($valor > $this->saldo){
            return "o saldo é insuficiente";
        }
        else{
            $this->saldo -= $valor;
            return "saque feito com sucesso";
        }
    }

    public function verSaldo():float|int
    {
        return $this->saldo;
    }
}

$contaDoJoao = new ContaBancaria(titular: "João", saldoInicial: 100);


echo $contaDoJoao->depositar(valor:50);
echo "<br>";
echo $contaDoJoao->sacar(valor:50);
echo "<br>";
echo $contaDoJoao->verSaldo();

echo $this->saldo;