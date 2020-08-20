<?php 

    include 'Conta.php';
    include 'conexao.php';

    $separaigual  = explode("=", $_SERVER["REQUEST_URI"]);
    $numContaDeletar = $separaigual['1'];

    fechar_conta($mysqli_connection, $numContaDeletar);
?>

