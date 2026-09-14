<?php

declare(strict_types=1);

class Processador{

    private string $marca;
    private string $modelo;

    public function __construct(string $marca, string $modelo){
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function processadorDados():void{
        echo "Processador trabalhando e calculando dados...<br>";
    }
}

class Computador{
    
    private string $marca;
    private Processador $processador;

    public function __construct(string $marca, Processador $processador){
        $this->marca = $marca;
        $this->processador = $processador;
    }

    public function ligar(): void{
        echo "Computador {$this->marca} ligado!!<br>";

        $this->processador->processadorDados();
    }
}

$processador = new Processador("Intel", "Core i5");

$computador = new Computador("Dell", $processador);

$computador->ligar();


?>