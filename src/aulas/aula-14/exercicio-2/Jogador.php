<?php

class Jogador
{

    private string $nome;
    private string $posicao;
    private string $dataNascimento;

    public function __construct(
        string $nome = '',
        string $posicao = '',
        string $dataNascimento = ''
    ) {
        $this->nome = $nome;
        $this->posicao = $posicao;
        $this->dataNascimento = $dataNascimento;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getPosicao(): string
    {
        return $this->posicao;
    }

    public function getDataNascimento(): string
    {
        return $this->dataNascimento;
    }

    public function setNome(string $nome = ''): static
    {
        $this->nome = $nome;
        return $this;
    }

    public function setPosicao(string $posicao = ''): static
    {
        $this->posicao = $posicao;
        return $this;
    }

    public function setDataNascimento(string $dataNascimento = ''): static
    {
        $this->dataNascimento = $dataNascimento;
        return $this;
    }

}