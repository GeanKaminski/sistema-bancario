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
    <h1>Transferência</h1>
    <form action="operaTransferencia.php" method="POST">
    <p> Transferir da conta </p>
<?php 
    
    include "conexao.php";
    $con = consultar_contas_abertas($mysqli_connection);
    $optionsHtml = '';
    // temos resultados, processar cada um
    while ($row = $con->fetch_array()) {
    $optionsHtml.= '
      <option value="'.$row["numConta"].'">
        '.$row["numConta"].'
      </option>';
    }
    $outputHtml = '
      <select name="sacado">
        '.$optionsHtml.'
      </select>';
    echo $outputHtml;

?>
    <p>para a conta </p>

    <?php 
    
    // temos resultados, processar cada um
    while ($row = $con->fetch_array()) {
    $optionsHtml.= '
      <option value="'.$row["numConta"].'">
        '.$row["numConta"].'
      </option>';
    }
    $outputHtml = '
      <select name="beneficiario">
        '.$optionsHtml.'
      </select>';
    echo $outputHtml;

?>
    <p> Valor da transferência </p>
    <input type="number" name="valor">
    <input type="submit" value="Submit">
    </form>

  </body>
</html>