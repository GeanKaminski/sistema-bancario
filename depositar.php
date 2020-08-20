<?php 

    include 'Conta.php';
    include 'conexao.php';

    $separaigual  = explode("=", $_SERVER["REQUEST_URI"]);
    $numContaDepositar = $separaigual['1'];

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Banco - PHP</title>
  </head>
  <body>
    <h1>Depósito</h1>
    <h2>Conta <?php echo $numContaDepositar ?></h2>
 
    <form action="operaDeposito.php" method="POST">
        <p>Valor do depósito: </p>   
        <input type="number" name="deposito">
        <input type="hidden" name="numConta" value="<?php echo $numContaDepositar; ?>">
        <input type="submit" value="Submit">
    </form>
    

  </body>
</html>