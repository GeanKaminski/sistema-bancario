<?php

include 'BD/conexao.php'; 

$valorTransferencia = (float)$_POST['valor'];
$numeroContaSacado = $_POST['sacado'];
$numeroContaBeneficiario = $_POST['beneficiario'];

$saldoArray = recupera_saldo($mysqli_connection, $numeroContaSacado);
$saldoAtualSacado = (float)$saldoArray['saldo'];
$saldoArray = recupera_saldo($mysqli_connection, $numeroContaBeneficiario);
$saldoAtualBeneficiario = (float)$saldoArray['saldo'];

if ($valorTransferencia > $saldoAtualSacado){
    $mensagem = "Saldo insuficiente para transferir";
} elseif ($numeroContaSacado == $numeroContaBeneficiario){
    $mensagem = "Impossível transferir para a mesma conta";
} else {
    $novoSaldoSacado = $saldoAtualSacado - $valorTransferencia;
    atualiza_saldo($mysqli_connection, $novoSaldoSacado, $numeroContaSacado);
    $novoSaldoBeneficiario = $saldoAtualBeneficiario + $valorTransferencia;
    atualiza_saldo($mysqli_connection, $novoSaldoBeneficiario, $numeroContaBeneficiario);
    $mensagem = "Transferência realizada com sucesso!";

    $tipoSacado = -1; //débito
    $tipoBeneficiario = 1; //crédito
    $descricao = 'Transferência';

    inclui_movimento($mysqli_connection, $numeroContaSacado, $tipoSacado, $valorTransferencia, $descricao);
    inclui_movimento($mysqli_connection, $numeroContaBeneficiario, $tipoBeneficiario, $valorTransferencia, $descricao);
}
?>


<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom fonts  -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
        type="text/css">

    <title>Banco - PHP</title>
</head>

<body id="page-top">

    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand" href="#">Start Bootstrap</a>
            <a class="btn btn-primary" href="#">Sign In</a>
        </div>
    </nav>


    <header class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h1 class="mb-5">Início</h1>
                </div>
            </div>
        </div>
    </header>

    <section class="bg-light text-center">
        <div class="container">
            <p><?php echo $mensagem; ?></p>
            <a href="index.php"><button type="button" class="btn btn-primary">Início</button></a>
        </div>
    </section>

</body>

</html>