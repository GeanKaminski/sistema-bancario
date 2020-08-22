<?php

include 'Modelo/Banco.php';

$banco = new Banco();

$banco->abrirConta(5555);
$banco->fecharConta(20);
$banco->saque(2,100);
$banco->deposito(2,1000);
$banco->transferencia(2,1,1000);
$banco->emitirSaldo(5);
$banco->emitirExtrato(4);


?>