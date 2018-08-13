<?php
$idFuncionario = $_GET['idFuncionario'];
$descricaoMovimentacao = $_GET['descMovimentacao'];
$valorMovimentacao = $_GET['valorMovimentacao'];
$servername = "localhost";
$username = "root";
$password = "root";
$banco = "meucontrole";
$conn = mysqli_connect($servername, $username, $password, $banco);

// Include the SimpleOrm class
include 'SimpleOrm.class.php';

if ($conn->connect_error)
  die(sprintf('Unable to connect to the database. %s', $conn->connect_error));

// Tell SimpleOrm to use the connection you just created.
SimpleOrm::useConnection($conn, $banco);

// Define an object that relates to a table.
class Movimentacao extends SimpleOrm {
    protected static
      $database = 'meucontrole',
      $table = 'movimentacao',
      $pk = 'idMovimentacao';
}

// Create an entry.
$entry = new Movimentacao;
$entry->idFuncionario = $idFuncionario;
$entry->Descricao = $descricaoMovimentacao;
$entry->Valor = $valorMovimentacao;
$entry->save();

echo "Registro efetuado com sucesso";
?>

