<?php

include 'conexao.php'; 

$valorSaque = (float)$_POST['saque'];
$numeroConta = $_POST['numConta'];
$saldoArray = recupera_saldo($mysqli_connection, $numeroConta);
$saldoAtual = (float)$saldoArray['saldo'];

if ($valorSaque > $saldoAtual){
    echo "Saldo insuficiente";
} else {
    $novoSaldo = $saldoAtual - $valorSaque;
    atualiza_saldo($mysqli_connection, $novoSaldo, $numeroConta);
    echo "Saque realizado";
}

?>