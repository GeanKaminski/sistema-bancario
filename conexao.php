<?php

$mysqli_connection = new MySQLi('127.0.0.1', 'admin', 'admin', 'bancario');
if($mysqli_connection->connect_error){
   echo "Desconectado! Erro: " . $mysqli_connection->connect_error;
}

function gravar_conta($mysqli_connection, float $limite, float $saldo, bool $aberta){
    $sqlGravar = "
        INSERT INTO contas
        (limite, saldo, aberta) 
        VALUES 
        ($limite, $saldo, $aberta)
        ";
    mysqli_query($mysqli_connection, $sqlGravar);
}

function consultar_contas_abertas($mysqli_connection){
    $sqlConsulta = "SELECT * FROM contas WHERE aberta = 1"; 
    $con = mysqli_query($mysqli_connection, $sqlConsulta);
    return $con;
}

function fechar_conta($mysqli_connection, int $numeroConta){
    $sqlFecha = "UPDATE contas SET aberta = 0 WHERE numConta = '$numeroConta'"; 
    mysqli_query($mysqli_connection, $sqlFecha);
}

function recupera_saldo($mysqli_connection, int $numeroConta){
    $sqlSaldo = "SELECT saldo FROM contas WHERE numConta = '$numeroConta'"; 
    $saldoSQL = mysqli_query($mysqli_connection, $sqlSaldo);
    $saldo = mysqli_fetch_assoc($saldoSQL);
    return $saldo;
}

function atualiza_saldo($mysqli_connection, float $novoSaldo, int $numeroConta){
    $sqlSaldo = "UPDATE contas SET saldo = '$novoSaldo' WHERE numConta = '$numeroConta'"; 
    mysqli_query($mysqli_connection, $sqlSaldo);
}


?>