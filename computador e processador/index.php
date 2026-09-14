<?php

declare(strict_types=1);

class Processador
{

    public function __construct(private string $marca, private string $modelo) {}

    public function processarDados(): string
    {
        return "⚙️ Processador trabalhando e calculando dados...";
    }
}


class Computador
{
    private Processador $processador;

    public function __construct(private string $marcaComputador, string $marcaProcessador, string $modeloProcessador)
    {
        $this->processador = new Processador($marcaProcessador, $modeloProcessador);
    }

    public function ligar(): string
    {
        return $this->processador->processarDados() . "<br>Maquina ligada!!";
    }
}

$dell = new Computador("DELL","intel","i9 de 10° Geração");

echo $dell->ligar();