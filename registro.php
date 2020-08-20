<?php 

include 'ContaCorrente.php';
include 'conexao.php';

$limite = (float)$_POST['limite'];

$conta = new ContaCorrente($limite);
$saldo = $conta->recuperaSaldo();
$aberta = $conta->recuperaAberta();

gravar_conta($mysqli_connection, $limite, $saldo, $aberta);

echo "Conta aberta com sucesso!";

?>