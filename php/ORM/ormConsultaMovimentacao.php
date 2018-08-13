<?php
$opcao = $_GET['opcao'];
$servername = "localhost";
$username = "root";
$password = "root";
$banco = "meucontrole";
$conn = mysqli_connect($servername, $username, $password, $banco);

include 'SimpleOrm.class.php';

if ($conn->connect_error)
  die(sprintf('Unable to connect to the database. %s', $conn->connect_error));

// Tell SimpleOrm to use the connection you just created.
SimpleOrm::useConnection($conn, $banco);


    class Movimentacao extends SimpleOrm {
    protected static
      $database = 'meucontrole',
      $table = 'movimentacao',
      $pk = 'idMovimentacao';
    }
    
    switch($opcao){
        case "geral":
            //$entry = Movimentacao::all();
            $sql= "SELECT funcionario.Nome as Nome ,Descricao,Valor from movimentacao "
            ."join funcionario on movimentacao.idFuncionario = funcionario.idFuncionario";
            $entry = Movimentacao::sql($sql);        
        break;
        
        case "descricao":
            $descricao = $_GET['descricao'];
            $sql= "SELECT funcionario.Nome as Nome ,Descricao,Valor from movimentacao "    
            ." join funcionario on movimentacao.idFuncionario = funcionario.idFuncionario"
            ." where Descricao like '%".$descricao."%'";
            $entry = Movimentacao::sql($sql);
        break;
            
        case "funcionario":
            $idFuncionario = $_GET['idFuncionario'];
            $sql= "SELECT funcionario.Nome as Nome ,Descricao,Valor from movimentacao "    
            ." join funcionario on movimentacao.idFuncionario = funcionario.idFuncionario"
            ." where funcionario.idFuncionario=".$idFuncionario;
            $entry = Movimentacao::sql($sql);
        
        break;
    }
    
    for ($i = 0; $i < count($entry); $i++) {
        
     echo $entry[$i]->Nome ."$#". $entry[$i]->Descricao ."$#". $entry[$i]->Valor ."$#@";
        
    }
?>

