<?php

declare(strict_types=1);


abstract class Conta{

    private string $titular;
    private float $saldo;

    public function __construct(string $titular, float $saldoInicial){
        
        if($saldoInicial < 0){
            echo 'saldo inicial nao pode ser negativo';
            return false;
            
        }

        $this->titular = $titular;
        $this->saldo = $saldoInicial;

    }

    public function mostrarTitular(): string{
        return $this->titular;
    }

    public function mostrarSaldo(): float{
        return $this->saldo;
    }

    public function adicionarSaldo(float $valor): void{
        $this->saldo += $valor;
    }

    public function removerSaldo(float $valor): void{
        $this->saldo -= $valor;
    }

    public function depositar(float $valor): bool{
        if ($valor < 0) {
            echo "O valor do deposito deve ser maior que 0";
            return false;
        }

        $this->adicionarSaldo($valor);

        echo "Deposito realizado com sucesso!";

        return true;
        

    }
    
    abstract public function sacar(float $valor): bool;
    abstract public function tipoConta(): string;


    public function exibirDadosDaConta(): void{
        echo "Nome:" . $this->titular . "<br>";
        echo "Saldo: R$" .  number_format($this->saldo,2, ",", ".") . "<br>"; 
        echo "Tipo de conta:" . $this->tipoConta() . "<br>";

    }

}


class ContaCorrente extends Conta{

    public function tipoConta(): string{
        return "Conta Corrente";
    }

    public function sacar(float $valor): bool{
        if($valor < 0){
            echo "o valor de saque deve ser maior que 0";
            return false;
        }

        if($valor > $this->mostrarSaldo()){
            echo "Saldo insuficiente";
            return false;

        }
        
        $this->removerSaldo($valor);
        return true;
    }
}


class ContaPoupanca extends Conta{

    public function tipoConta(): string{
        return "Conta Poupança";
    }

    public function sacar(float $valor): bool{
        
        if ($valor <= 0) {
            echo "o valor de saque deve ser maior que 0";
            return false;
        }

        $saldoMinimo = 100;

        if ($this->mostrarSaldo() - $valor < $saldoMinimo) {
            echo "A conta poupaça precisa manter R$ 100 pila de saldo minimo";
            return false;
        }
        
        $this->removerSaldo($valor);

        return true;
    }
}

$contaLuany1 = new ContaPoupanca("luany", 1000);
$contaLuany2 = new ContaCorrente("lua", 2000);

$contaLuany1->exibirDadosDaConta();
$contaLuany2->exibirDadosDaConta();


$contas = [
    $contaLuany1,
    $contaLuany2
];

foreach ($contas as $conta){
        echo "Realizando saques na conta do titular: " . $conta->mostrarTitular();
        echo "<br>";
        $conta->sacar(100);
        $conta->exibirDadosDaConta();
}
?>