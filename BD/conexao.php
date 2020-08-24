<?php

function conexao(){
    return $mysqli_connection = new MySQLi('127.0.0.1', 'admin', 'admin', 'bancario');
    if($mysqli_connection->connect_error){
    echo "Desconectado! Erro: " . $mysqli_connection->connect_error;
    }
}

?>