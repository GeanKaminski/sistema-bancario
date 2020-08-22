<?php

class ContaCorrente 
{   
    protected $movimentos = array();
    protected $saldo;
    protected $limite;
    protected $aberta;

    public function __construct(float $limite)
    {
        $this->limite = $limite;
        $this->saldo = 0;
        $this->aberta = true;
    }

    public function getSaldo()
    {
        return $this->saldo;
    }

    public function getLimite()
    {
        return $this->limite;
    }

    public function getAberta()
    {
        return $this->aberta;
    }

    public function adicionaMovimento(string $descricao, float $valor, int $tipo)
    {
        $movimento = array();
        array_push($movimento, $descricao, $valor, $tipo);
        array_push($this->movimentos, $movimento);
    }

   
}