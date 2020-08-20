<?php

include 'conexao.php'; 

$valorDeposito = (float)$_POST['deposito'];
$numeroConta = $_POST['numConta'];
$saldoArray = recupera_saldo($mysqli_connection, $numeroConta);
$saldoAtual = (float)$saldoArray['saldo'];

$novoSaldo = $saldoAtual + $valorDeposito;

atualiza_saldo($mysqli_connection, $novoSaldo, $numeroConta);
echo "Depósito realizado";

?>