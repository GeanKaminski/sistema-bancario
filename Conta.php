<?php

abstract class Conta
{
    protected $saldo;
    protected $limite;
    protected $aberta;

    public function __construct(float $limite)
    {
        $this->limite = $limite;
        $this->saldo = 0;
        $this->aberta = true;
    }

    public function saca(float $valorASacar): void
    {
        
        if ($valorASacar > $this->saldo) {
            echo "Saldo indisponível";
            return;
        }

        $this->saldo -= $valorASacar;
    }

    public function deposita(float $valorADepositar): void
    {
        if ($valorADepositar < 0) {
            echo "Valor precisa ser positivo";
            return;
        }

        $this->saldo += $valorADepositar;
    }

    public function recuperaSaldo(): float
    {
        return $this->saldo;
    }

    public function recuperaLimite(): float
    {
        return $this->limite;
    }

    public function recuperaAberta(): bool
    {
        return $this->aberta;
    }

}