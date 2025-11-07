<?php

class Time
{
    private string $nome;
    private int $anoFundacao;
    private array $jogadores = [];

    public function __construct(string $nome, int $anoFundacao)
    {
        $this->nome = $nome;
        $this->anoFundacao = $anoFundacao;
    }

    public function adicionaJogador(
        string $nome,
        string $posicao,
        string $dataNascimento
    ) {
        $jogador = new Jogador($nome, $posicao, $dataNascimento);
        $this->jogadores[] = $jogador;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getAnoFundacao(): int
    {
        return $this->anoFundacao;
    }

    public function getJogadores(): array
    {
        return $this->jogadores;
    }

    public function setNome(string $nome = ''): static
    {
        $this->nome = $nome;
        return $this;
    }

    public function setAnoFundacao(int $ano = 0): static
    {
        $this->anoFundacao = $ano;
        return $this;
    }

    public function setJogadores(array $jogadores): static
    {
        $this->jogadores = $jogadores;
        return $this;
    }

}