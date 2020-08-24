<?php 

include 'ContaCorrente.php';
include 'BD/conexao.php';

class Banco 
{
    protected $contas = array();

    public function adicionaConta(ContaCorrente $conta): void
    {
        array_push($this->contas, $conta);
        $saldo = $conta->getSaldo();
        $aberta = $conta->getAberta();
        $limite = $conta->getLimite();
        $sqlGravar = "INSERT INTO contas (limite, saldo, aberta) VALUES ($limite, $saldo, $aberta)";
        $conexao = conexao();
        mysqli_query($conexao, $sqlGravar);
    }

    public function abrirConta(float $limite): void
    {
        if ($limite >= 0) {
            $conta = new ContaCorrente($limite);
            $this->adicionaConta($conta);
            $mensagem = "Conta aberta com sucesso!";
        } else {
            $mensagem = "Operação não permitida. <br> Informe um valor positivo.";
        }
        echo $mensagem;
    }

    public function fecharConta(int $numConta): void
    {
        $sqlFecha = "UPDATE contas SET aberta = 0 WHERE numConta = '$numConta'"; 
        $conexao = conexao();
        mysqli_query($conexao, $sqlFecha);
    }

    public function saque(int $numConta, float $valor): void
    {
        $sqlSaldo = "SELECT saldo FROM contas WHERE numConta = '$numConta'";
        $sqlLimite = "SELECT limite FROM contas WHERE numConta = '$numConta'";
        $conexao = conexao();
        $saldoSQL = mysqli_query($conexao, $sqlSaldo);
        $limiteSQL = mysqli_query($conexao, $sqlLimite);
        $saldo = mysqli_fetch_assoc($saldoSQL);
        $limite = mysqli_fetch_assoc($limiteSQL);
        $saldoAtual = (float)$saldo['saldo'];
        $limiteConta = (float)$limite['limite'];

        if ($valor > $saldoAtual){
            $mensagem = "Saldo insuficiente!";
        } elseif ($valor < 0) {
            $mensagem = "Operação não permitida. <br> Informe um valor positivo.";
        } elseif ($valor > $limiteConta) {
            $mensagem = "Operação não permitida. <br> O valor solicitado é maior do que o limite da conta.";
        } 
        else {
            $novoSaldo = $saldoAtual - $valor;
            $tipo = -1; //débito
            $descricao = 'Saque';
            $sqlSaldo = "UPDATE contas SET saldo = '$novoSaldo' WHERE numConta = '$numConta'"; 
            mysqli_query($conexao, $sqlSaldo);
            $sqlGravar = "INSERT INTO movimentos (numConta, tipo, valor, descricao) VALUES ('$numConta', '$tipo', '$valor', '$descricao')";
            mysqli_query($conexao, $sqlGravar) or die (mysqli_error($mysqli_connection));
            $mensagem = "Saque realizado com sucesso!";
        }
        echo $mensagem;
    }

    public function deposito(int $numConta, float $valor): void
    {
        if ($valor < 0) {
            $mensagem = "Operação não permitida. <br> Informe um valor positivo.";
        } else {
            $sqlSaldo = "SELECT saldo FROM contas WHERE numConta = '$numConta'";
            $conexao = conexao();
            $saldoSQL = mysqli_query($conexao, $sqlSaldo);
            $saldo = mysqli_fetch_assoc($saldoSQL);
            $saldoAtual = (float)$saldo['saldo'];

            $novoSaldo = $saldoAtual + $valor;
            $sqlSaldo = "UPDATE contas SET saldo = '$novoSaldo' WHERE numConta = '$numConta'"; 
            mysqli_query($conexao, $sqlSaldo);

            $tipo = 1; //crédito
            $descricao = 'Depósito';
            $sqlGravar = "INSERT INTO movimentos (numConta, tipo, valor, descricao) VALUES ('$numConta', '$tipo', '$valor', '$descricao')";
            mysqli_query($conexao, $sqlGravar) or die (mysqli_error($mysqli_connection));
            $mensagem = "Depósito realizado com sucesso!";
        }
        echo $mensagem;
    }

    public function transferencia(int $contaOrigem, int $contaDestino, float $valor): void
    {   
        $sqlLimite = "SELECT limite FROM contas WHERE numConta = '$contaOrigem'";
        $conexao = conexao();
        $limiteSQL = mysqli_query($conexao, $sqlLimite);
        $limite = mysqli_fetch_assoc($limiteSQL);
        $limiteConta = (float)$limite['limite'];

        if ($valor < 0) {
            $mensagem = "Operação não permitida. <br> Informe um valor positivo.";
        } elseif ($valor > $limiteConta) {
            $mensagem = "Operação não permitida. <br> O valor é maior do que o limite da conta.";
        } else {
        $sqlSaldo = "SELECT saldo FROM contas WHERE numConta = '$contaOrigem'";
        $conexao = conexao();
        $saldoSQL = mysqli_query($conexao, $sqlSaldo);
        $saldo = mysqli_fetch_assoc($saldoSQL);
        $saldoOrigem = (float)$saldo['saldo'];

        $sqlSaldo = "SELECT saldo FROM contas WHERE numConta = '$contaDestino'";
        $saldoSQL = mysqli_query($conexao, $sqlSaldo);
        $saldo = mysqli_fetch_assoc($saldoSQL);
        $saldoDestino = (float)$saldo['saldo'];

        if ($valor > $saldoOrigem){
            $mensagem = "Saldo insuficiente para transferir";
        } elseif ($contaOrigem == $contaDestino){
            $mensagem = "Impossível transferir para a mesma conta. <br> Tente novamente.";
        } else {
            $novoSaldoOrigem = $saldoOrigem - $valor;
            $sqlSaldo = "UPDATE contas SET saldo = '$novoSaldoOrigem' WHERE numConta = '$contaOrigem'"; 
            mysqli_query($conexao, $sqlSaldo);
            $novoSaldoDestino = $saldoDestino + $valor;
            $sqlSaldo = "UPDATE contas SET saldo = '$novoSaldoDestino' WHERE numConta = '$contaDestino'"; 
            mysqli_query($conexao, $sqlSaldo);
        
            $tipoOrigem = -1; //débito
            $tipoDestino = 1; //crédito
            $descricao = 'Transferência';
        
            $sqlGravar = "INSERT INTO movimentos (numConta, tipo, valor, descricao) VALUES ('$contaOrigem', '$tipoOrigem', '$valor', '$descricao')";
            mysqli_query($conexao, $sqlGravar);
            $sqlGravar = "INSERT INTO movimentos (numConta, tipo, valor, descricao) VALUES ('$contaDestino', '$tipoDestino', '$valor', '$descricao')";
            mysqli_query($conexao, $sqlGravar);

            $mensagem = "Transferência realizada com sucesso!";
        }
    }
        echo $mensagem;
    }

    public function emitirSaldo(int $numConta): void
    {
        $sqlSaldo = "SELECT saldo FROM contas WHERE numConta = '$numConta'";
        $conexao = conexao();
        $saldoSQL = mysqli_query($conexao, $sqlSaldo);
        $saldo = mysqli_fetch_assoc($saldoSQL);
        $saldoAtual = (float)$saldo['saldo'];
        echo $saldoAtual;
    }

    public function emitirExtrato(int $numConta)
    {
        $sqlExtrato = "SELECT * FROM movimentos WHERE numConta = '$numConta'"; 
        $conexao = conexao();
        $extratoSQL = mysqli_query($conexao, $sqlExtrato);
        $extratoArray = mysqli_fetch_all($extratoSQL);
       
        $tipoArray = array();
        $valorArray = array();
        $descricaoArray = array();

        foreach($extratoArray as $value) {
            array_push($valorArray, $value[1]);
            array_push($tipoArray, $value[2]);
            array_push($descricaoArray, $value[3]);
        }

        $sqlSaldo = "SELECT saldo FROM contas WHERE numConta = '$numConta'"; 
        $saldoSQL = mysqli_query($conexao, $sqlSaldo);
        $saldoArray = mysqli_fetch_assoc($saldoSQL);
        $saldo = (float)$saldoArray['saldo'];

        for ($dado = 0; $dado < count($tipoArray); $dado++) { 

            echo $descricaoArray[$dado]; 

            if ($tipoArray[$dado] == 1){
                echo "Crédito";
                } else {
                 echo "Débito";
                }

            echo $valorArray[$dado]; }

    }


}

?>