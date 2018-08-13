<?php
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

    $entry = Departamento::all();

    for ($i = 0; $i < count($entry); $i++) {
        echo $entry[$i]->idDepartamento ."$#". $entry[$i]->Nome."$#@";
        
}
?>

