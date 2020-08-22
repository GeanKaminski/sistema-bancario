<?php

include 'conexao.php';

$separaigual  = explode("=", $_SERVER["REQUEST_URI"]);
$numeroConta = $separaigual['1'];

$extratoArray = recupera_extrato($mysqli_connection, $numeroConta);

$tipoArray = array();
$valorArray = array();
$descricaoArray = array();

foreach($extratoArray as $value) {
    array_push($tipoArray, $value[2]);
    array_push($valorArray, $value[1]);
    array_push($descricaoArray, $value[3]);
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
            <p> Extrato da conta <?php echo $numeroConta ?> </p>
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th>Tipo da operação</th>
                    </tr>
                </thead>

                <tbody>
                    <?php for($dado = 0; $dado < count($tipoArray); $dado++) { ?>
                    <tr>
                        <td><?php echo $descricaoArray[$dado];  ?></td>
                        <td><?php echo $valorArray[$dado]; ?></td>
                        <td><?php                  
                    if ($tipoArray[$dado] == 1){
                        echo "Crédito";
                    } else {
                        echo "Débito";
                    }
                 } ?></td>

                    </tr>
                </tbody>

            </table>
        
        <a href="index.php"><button type="button" class="btn btn-primary">Início</button></a>

        </div>
    </section>

</body>