<?php

class Calculadora {
    private int $valor1;
    private int $valor2;

    public function __construct(
        int|float $valor1 = 0,
        int|float $valor2 = 0
    ) {
        $this->valor1 = $valor1;
        $this->valor2 = $valor2;
    }

    public function calculaAdicao() {
        return $this->valor1 + $this->valor2;
    }

    public function calculaSubtracao() {
        return $this->valor1 - $this->valor2;
    }

    public function calculaMultiplicacao() {
        return $this->valor1 * $this->valor2;
    }

    public function calculaDivisao() {
        if( $this->valor1 > 0 && $this->valor2 > 0 ) {
            return $this->valor1 / $this->valor2;
        }
    }

}