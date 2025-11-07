<?php

class Computador {
    private string $estado = self::ESTADO_DESLIGADO;

    const ESTADO_LIGADO = "Ligado",
        ESTADO_DESLIGADO = "Desligado";

    public function ligar() {
        if ($this->estado == self::ESTADO_LIGADO) return false;

        $this->estado = self::ESTADO_LIGADO;
        return true;
    }

    public function desligar() {
        if ($this->estado == self::ESTADO_DESLIGADO) return false;

        $this->estado = self::ESTADO_DESLIGADO;
        return true;
    }

    public function status() {
        return $this->estado;
    }
}

$computador = new Computador();

if( $computador->ligar() ) {

} else {
    
}

echo $computador->status();