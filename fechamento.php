<?php 
include("conexao.php"); 
$con = consultar_contas_abertas($mysqli_connection);
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
    <h1>Fechamento de conta</h1>
    
    <table border="1"> 
        <tr> 
          <td>Número da conta</td> 
          <td>Saldo</td> 
          <td>Limite</td> 
          <td>Ação</td> 
        </tr> 
        <?php while($dado = $con->fetch_array()) { ?> 
        <tr> 
          <td><?php echo $dado['numConta']; ?></td>
          <td><?php echo $dado['saldo']; ?></td> 
          <td><?php echo $dado['limite']; ?></td> 
          <td> 
            <a href="excluir.php?numConta=<?php echo $dado['numConta']; ?>">Fechar</a> 
          </td> 
        </tr> 
        <?php } ?> 
      </table> 

  </body>
</html>