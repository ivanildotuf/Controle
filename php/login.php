<?php

$opcao = $_GET['opcao'];
$servername = "localhost";
$username = "root";
$password = "root";
$banco = "meucontrole";
$conn = mysqli_connect($servername, $username, $password, $banco);

if($opcao == "logout"){
	session_start();
 unset($_SESSION['usuario']);
 unset($_SESSION['senha']);
echo "Deslogado com sucesso";
exit();
}
$usuario = $_GET['usuario'];
$senha = $_GET['senha'];
include 'ORM/SimpleOrm.class.php';

if ($conn->connect_error)
  die(sprintf('Unable to connect to the database. %s', $conn->connect_error));

SimpleOrm::useConnection($conn, $banco);

class usuario extends SimpleOrm {
    protected static
      $database = 'meucontrole',
      $table = 'usuario',
      $pk = 'idUsuario';
}

$entry = usuario::all();
if ($entry[0]->usuario == $usuario && $entry[0]->senha == $senha){
	session_start();
$_SESSION['usuario'] = $usuario;
$_SESSION['senha'] = $senha;
  echo "Logado com sucesso";

}

//$entry->save();
//echo "Registro efetuado com sucesso";
?>

