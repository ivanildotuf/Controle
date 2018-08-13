<?php
session_start();
if($_SESSION['usuario']!="adm" && $_SESSION['senha']!="adm"){
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:../index.html');
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Meu Controle</title>
<link rel="stylesheet" href="../stylesheets/base.css" type="text/css" />
<link rel="stylesheet" id="current-theme" href="../stylesheets/style.css" type="text/css" />
<script type="text/javascript" charset="utf-8" src="../js/jquery-3.3.1.js"></script>
</head>
<body>
<div id="container">
<div id="header">
  <h1 align="center"><a href="../index.html">Meu Controle</a></h1>
</div>
<div id="wrapper" class="wat-cf">
  <div id="main" width="100%">
    <div class="block" id="block-text">
      <div class="secondary-navigation">
          <div align="center" style="font-size: 20px;">
            <ul class="wat-cf" >
              <a href="../index.html">Inicio</a>
              <a href="cadastroFuncionario.php">Cadastro de Funcion&aacute;rio</a>
              <a href="cadastroDepartamento.php">Cadastro de Departamento</a>
              <a href="cadastroMovimentacao.php">Cadastro de Movimentacao</a>
              <a href="relatorioMovimentacao.php">Relat&oacute;rio de Movimenta&ccedil;&atilde;o</a>
              <a href="../login.html">Login</a>             
            </ul>
          </div>
      </div>
    </div>
  </div>
</div>
<div id="wrapper" class="wat-cf">
  <div id="main" width="100%">
    <div class="block" id="block-text">
      <div class="secondary-navigation">
          <div style="font-size: 20px;">
            <div id="cadDepartamento">
                Nome do Departamento:
                <br><input type="text" id="nomeDepartamento" maxlength="100"><br><br>
                <div id="validaCadastro">
                    <button type="button" onclick="validaCampo();">Salvar</button>
                    <button type="button" onclick="limpaCampo();">Limpar</button>
                </div>
            </div> 
          </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>

<script>

  function limpaCampo(){
      var nomeDepartamento; 
      nomeDepartamento = document.getElementById("nomeDepartamento");
      nomeDepartamento.value="";
  }

  function validaCampo(){
      var nomeDepartamento; 
      nomeDepartamento = document.getElementById("nomeDepartamento");
      if(nomeDepartamento.value==""){
          alert("Favor preencher o campo nome do Departamento!");
          return;
  }

      $.ajax({url: "ORM/ormDepartamento.php?nomeDepartamento="+nomeDepartamento.value ,success: function(result){
          alert(result);
      }});
  }
</script>