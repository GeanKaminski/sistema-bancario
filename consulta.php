<?php 
include 'BD/conexao.php'; 
$con = consultar_contas_abertas($mysqli_connection);
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

            <table class="table table-striped">
                <tr>
                    <th>Conta</th>
                    <th>Ação</th>
                </tr>
                <?php while($dado = $con->fetch_array()) { ?>
                <tr>
                    <td><?php echo $dado['numConta']; ?></td>
                    <td>
                        <a href="saldo.php?numConta=<?php echo $dado['numConta']; ?>">Saldo</a>
                        <a href="extrato.php?numConta=<?php echo $dado['numConta']; ?>">Extrato</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </section>

</body>

</html>