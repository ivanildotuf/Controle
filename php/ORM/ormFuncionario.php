<?php

$nomeFuncionario = $_GET['nomeFuncionario'];
$idDepartamento = $_GET['idDepartamento'];
$servername = "localhost";
$username = "root";
$password = "root";
$banco = "meucontrole";
$conn = mysqli_connect($servername, $username, $password, $banco);

include 'SimpleOrm.class.php';

if ($conn->connect_error)
  die(sprintf('Unable to connect to the database. %s', $conn->connect_error));

SimpleOrm::useConnection($conn, $banco);

class Funcionario extends SimpleOrm {
    protected static
      $database = 'meucontrole',
      $table = 'funcionario',
      $pk = 'idFuncionario';
}

$entry = new Funcionario;
$entry->Nome = $nomeFuncionario;
$entry->idDepartamento = $idDepartamento;
$entry->save();
echo "Registro efetuado com sucesso";
?>
