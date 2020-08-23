<?php

include 'Modelo/Banco.php';

$valor = (float)$_POST['deposito'];
$numConta = $_POST['numConta'];

$banco = new Banco();
$banco->deposito($numConta, $valor);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Banco PHP
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="material-dashboard.css?v=2.1.2" rel="stylesheet" />

</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
            <div class="logo"><a href="index.php" class="simple-text logo-normal">
                    Banco PHP
                </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">
                            <i class="material-icons">dashboard</i>
                            <p>Início</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="abertura.php">
                            <i class="material-icons">person</i>
                            <p>Abertura de Conta</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="fechamento.php">
                            <i class="material-icons">content_paste</i>
                            <p>Encerramento de Conta</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="movimentacao.php">
                            <i class="material-icons">library_books</i>
                            <p>Saque/Depósito</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="transferencia.php">
                            <i class="material-icons">bubble_chart</i>
                            <p>Transferência</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="consulta.php">
                            <i class="material-icons">location_ons</i>
                            <p>Consultas</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">Depósito</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <form class="navbar-form">
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Conta
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="#">Perfil</a>
                                    <a class="dropdown-item" href="#">Configurações</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <div class="content">
                <div class="container-fluid">
                    <p><?php echo "Depósito realizado com sucesso!"; ?></p>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Banco PHP
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Sobre
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </footer>
        </div>
    </div>

  
</body>


</html>