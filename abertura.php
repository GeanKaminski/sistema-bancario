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
    <h1>Abertura de conta</h1>
    
    <form action="registro.php" method="POST">
        <p>Defina um limite para a conta: </p>   
        <input type="number" name="limite">
        <input type="submit" value="Submit">
    </form>

  </body>
</html>