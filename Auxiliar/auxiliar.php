<?php

include 'BD/conexao.php';

function retornaContasAbertas(){
    $conexao = conexao();
    $sqlConsulta = "SELECT * FROM contas WHERE aberta = 1"; 
    $contasAbertas = mysqli_query($conexao, $sqlConsulta);
    return $contasAbertas;
}

function retornaSelectDeContasOrigem(){

    $contasAbertas = retornaContasAbertas();
    $optionsHtml = '';

    while ($row = $contasAbertas->fetch_array()) {
      $optionsHtml .= '
      <option value="' . $row["numConta"] . '">
        ' . $row["numConta"] . '
      </option>';
    }

    $outputHtml = '
      <select name="origem">
        ' . $optionsHtml . '
      </select>';
      return $outputHtml;
}

function retornaSelectDeContasDestino(){

    $contasAbertas = retornaContasAbertas();
    $optionsHtml = '';

    while ($row = $contasAbertas->fetch_array()) {
      $optionsHtml .= '
      <option value="' . $row["numConta"] . '">
        ' . $row["numConta"] . '
      </option>';
    }

    $outputHtml = '
      <select name="destino">
        ' . $optionsHtml . '
      </select>';
      return $outputHtml;
}

?>