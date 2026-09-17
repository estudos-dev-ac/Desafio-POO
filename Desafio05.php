<?php

declare(strict_types=1);

interface MetodoPagamento{
    public function pagar(float $valor):bool;
}

class Pix implements MetodoPagamento{

    public function pagar(float $valor):bool{
        echo "Pagamento de R$ " . number_format($valor, 2, ',', '.') . " realizado via Pix. <br>";
        return true;
    }
}

class CartaoCredito implements MetodoPagamento{

    public function pagar(float $valor):bool{
        echo "Pagamento de R$ " . number_format($valor, 2, ',', '.') . "realizado via Cartao de Crédito. <br>";
        return true;
    }
}

class Boleto implements MetodoPagamento{

    public function pagar(float $valor):bool{
        echo "Boleto de R$ " . number_format($valor, 2, ',', '.') . " gerado. <br>";
        return true;
    }
}

interface Notificavel{
    public function enviar(string $mensagem): void;
}

class Email implements Notificavel{

    public function enviar(string $mensagem):void{
        echo "Enviando Email: $mensagem<br>";
    }
}

class WhatsApp implements Notificavel{

    public function enviar(string $mensagem):void{
        echo "Enviando WhatsApp: $mensagem<br>";
    }
}


class Produto{

    private string $nome;
    private float $preco;

    public function __construct(string $nome, float $preco){
        $this->nome = $nome;
        $this->preco = $preco;
    } 

    public function getNome():string{
        return $this->nome ;
    }

    public function getPreco():float{
        return $this->preco ;
    }
}

class Cliente{

    private string $nome;
    private string $email;

    public function __construct(string $nome, string $email){
        $this->nome = $nome;
        $this->email = $email;
    } 

    public function getNome():string{
        return $this->nome ;
    }

    public function getEmail():string{
        return $this->email ;
    }
}


class Pedido{

    private Cliente $cliente;
    private array $produtos = [];
    private MetodoPagamento $metodoPagamento;
    private Notificavel $notificacao;

    public function __construct(Cliente $cliente, MetodoPagamento $metodoPagamento, Notificavel $notificacao){
        $this->cliente = $cliente;
        $this->metodoPagamento = $metodoPagamento;
        $this->notificacao = $notificacao;
    }

    public function adicionarProduto(Produto $produtos):void{
        $this->produtos[] = $produtos;
    }
    
    public function calcularTotal():float{

        $total = 0;

        foreach($this->produtos as $produto){
            $total += $produto->getPreco();
        }

        return $total;

    }

    public function finalizar():void{
        $total = $this->calcularTotal();
        echo "Total: R$ " . number_format($total,2, ',', '.') . "<br>";

        $pagamentoAprovado = $this->metodoPagamento->pagar($total);

        if($pagamentoAprovado){
            $mensagem = "Olá {$this->cliente->getNome()}, seu pedido foi aprovado";

            $this->notificacao->enviar($mensagem);
        }
        else{
            echo "Pagamento Recusado. <br>";
        }

    }


}


$cliente = new Cliente("luany", "luanylima@gmail.com");

$notebook = new Produto("Notebook", 3500);
$mouse = new Produto("Mouse", 350);
$fone = new Produto("Fone", 500);

$pedido = new Pedido($cliente, new Pix(), new WhatsApp() );

$pedido->adicionarProduto($notebook);
$pedido->adicionarProduto($mouse);
$pedido->adicionarProduto($fone);

$pedido->finalizar();

?>