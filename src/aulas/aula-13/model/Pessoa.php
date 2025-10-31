<?php

class Pessoa {

    private string $nome;
    private string $sobrenome;
    private DateTime $dataNascimento;
    private string $cpfCnpj;
    private int $tipo;
    private string $telefone;
    private string $endereco;

    CONST TIPO_FISICA = 1, 
        TIPO_JURIDICA = 2;


    public function __construct(
        string $nome      = 'Lucas', 
        string $sobrenome = 'Bressan',
        int    $tipo      = self::TIPO_FISICA
    ) {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->tipo = $tipo;
    }

    public function getNomeCompleto() : string {
        if( isset($this->nome) && isset($this->sobrenome) ) {
            return $this->nome . ' ' . $this->sobrenome;
        }
        return '';
    }

    public function getIdade() : string {
        if( isset($this->dataNascimento) ) {
            $dataAtual = new DateTime();
            $idade = $dataAtual->diff($this->dataNascimento);
            return $idade->format('y');
        }
        return 0;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function getSobrenome(): string {
        return $this->sobrenome;
    }

    public function setSobrenome(string $sobrenome): void {
        $this->sobrenome = $sobrenome;
    }

    public function getDataNascimento(): ?DateTime {
        if (isset($this->dataNascimento)) {
            return $this->dataNascimento;
        }
        return null;
    }

    public function setDataNascimento(DateTime $dataNascimento): void {
        $this->dataNascimento = $dataNascimento;
    }

    public function getCpfCnpj(): ?string {
        if (isset($this->cpfCnpj)) {
            return $this->cpfCnpj;
        }
        return null;
    }

    public function setCpfCnpj(string $cpfCnpj): void {
        $this->cpfCnpj = $cpfCnpj;
    }

    public function getTipo(): ?int {
        if (isset($this->tipo)) {
            return $this->tipo;
        }
        return null;
    }

    public function setTipo(int $tipo): void {
        $this->tipo = $tipo;
    }

    public function getTelefone(): ?string {
        if (isset($this->telefone)) {
            return $this->telefone;
        }
        return null;
    }

    public function setTelefone(string $telefone): void {
        $this->telefone = $telefone;
    }

    public function getEndereco(): ?string {
        if (isset($this->endereco)) {
            return $this->endereco;
        }
        return null;
    }

    public function setEndereco(string $endereco): void {
        $this->endereco = $endereco;
    }

}