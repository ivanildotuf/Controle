<?php
$nomeDepartamento = $_GET['nomeDepartamento'];
$servername = "localhost";
$username = "root";
$password = "root";
$banco = "meucontrole";
$conn = mysqli_connect($servername, $username, $password, $banco);

include 'SimpleOrm.class.php';

if ($conn->connect_error)
  die(sprintf('Unable to connect to the database. %s', $conn->connect_error));

SimpleOrm::useConnection($conn, $banco);

class Departamento extends SimpleOrm {
    protected static
      $database = 'meucontrole',
      $table = 'departamento',
      $pk = 'idDepartamento';
}

$entry = new Departamento;
$entry->Nome = $nomeDepartamento;
$entry->save();
echo "Registro efetuado com sucesso";
?>

