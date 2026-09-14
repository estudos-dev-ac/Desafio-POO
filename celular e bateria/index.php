<?php

declare(strict_types=1);
function text($string): string
{
    return "<br> $string <br>";
}
class Bateria
{
    public int $carga;

    public function __construct(int $carga)
    {
        $this->carga = $carga;
    }

    public function gastarEnergia(): void
    {
        $this->carga -= 10;
    }

    public function getCarga(): int
    {
        return $this->carga;
    }
    public function carregarBateria(): void
    {
        $this->carga = 100;
    }
}


class Celular
{
    public Bateria $bateria;
    protected string $marca;

    public function __construct(string $marca, int $carga)
    {
        $this->marca = $marca;
        $this->bateria = new Bateria($carga);
    }

    public function verInformacoes(): string
    {
        return text("Marca do celular: " . $this->marca . "<br>" . "Carga atual: " . $this->bateria->carga);
    }

    public function jogarJogo(): string
    {
        $this->bateria->gastarEnergia();
        if ($this->bateria->getCarga() > 0) {
            return text("Jogando GTA VI na pre-venda porque o SENAI patrocinou");
        } else {
            return text("Celular descarregado de tanto você ir no sapatinho do GTA VI");
        }
    }
    public function getBateriaAtual() : string {
        return text($this->bateria->carga . "%");
    }
    public function colocarNoCarregador(): string
    {
        if ($this->bateria->getCarga() < 100) {
            $this->bateria->carregarBateria();
            return text("Bateria carregada com sucesso!");
        } else {
            return text("Bateria em 100%");
        }
    }
}

$samsung = new Celular("Samsung", 100);
echo $samsung->verInformacoes();
echo $samsung->jogarJogo();
echo $samsung->jogarJogo();
echo $samsung->getBateriaAtual()
?>

























<style>
    body {
        font-family: sans-serif;
        background: #111111;
        color: whitesmoke;
    }
</style>