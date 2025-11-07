<?php 

class Session {
    private string $sessionId;
    private int $status;
    private Usuario $usuario;
    private string $dataHoraInicio;
    private string $dataHoraUltimoAcesso;

    public function __construct() {
        $this->iniciaSessao();
    }

    public function iniciaSessao() {
        session_start();
        if( $_SESSION['usuario'] ) {

        } else {
            $this->status = 0;
        }
        $this->status = 1;
        $this->sessionId = session_id();
        $this->dataHoraInicio = date('Y-m-d H:i:s');
    }

    public function encerraSessao() {

        $this->gravaDadosSessao('dataHoraInicio', $this->dataHoraInicio);
        $this->gravaDadosSessao('dataHoraUltimoAcesso', $this->dataHoraUltimoAcesso);
        $this->gravaDadosSessao('usuario', $this->usuario);

        session_unset();
        session_destroy();
    }

    public function gravaDadosSessao($chave, $valor) {
        $_SESSION[$chave] = $valor;
        return $this;
    }

    public function getDadosSessao($chave) {
        return $_SESSION[$chave];
    }

    public function getUsuarioSessao() {
        return $this->usuario;
    }

}