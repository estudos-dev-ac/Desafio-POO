<?php

declare(strict_types=1);

class Bateria{

    private int $carga = 100;

    public function gastarEnergia(): void{
        $this->carga -= 10;
    }

    public function getCarga(): int{
        return $this->carga;
    }
}

class Celular{

    private string $marca;
    private Bateria $bateria;

    public function __construct(string $marca, Bateria $bateria){
        $this->marca = $marca;
        $this->bateria = $bateria;
    }

    public function jogarJogo(): void{
        echo "Jogando no celular {$this->marca}🎮...<br>";
        $this->bateria->gastarEnergia();
    }
}


$bateria = new Bateria();

$celular = new Celular("Redmi Note 13", $bateria);

$celular->jogarJogo();
$celular->jogarJogo();

echo "🔋 Bateria restante: " . $bateria->getCarga() . "%";
?>