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
            <div id="cadFuncionario">
                Nome do Funcionário:
                <br><select id="nomeFuncionario">
                   <script>
                        var aux="";
                        $.ajax({url:"ORM/ormConsultaFuncionario.php",success: function(result){
                            idNomeFuncionario=result.split("$#@");
                            for (i = 0;i < idNomeFuncionario.length-1; i++) { 
                                    selIdFuncionario = idNomeFuncionario[i].split("$#");
                                    aux = aux + "<option value="+selIdFuncionario[0]+">"+selIdFuncionario[1]+"</option><br>";
                            }
                            $("#nomeFuncionario").html(aux);
                        }});
                   </script>  
                    </select><br><br>
                Descrição: 
                <br><textarea id="descricaoMovimentacao" rows="5" cols="50">
                    </textarea><br><br>
                Valor(R$):
                <br><input type="text" id="valorMovimentacao" onkeypress="mascara(this,mvalor )" size="5" maxlength="8"><br>
                <div id="validaCadastro">
                    <br>
                    <button type="button" value="ins" onclick="validaCampo();">Salvar</button>
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
   
    function mascara(o,f){
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
    }

    function execmascara(){
        v_obj.value=v_fun(v_obj.value)
    }
    
    function mvalor(v){
        v=v.replace(/\D/g,"");
        v=v.replace(/(\d)(\d{2})$/,"$1.$2");
        return v;
    }   
    
    function limpaCampo(){
        var nomeFuncionario,descricaoMovimentacao,valorMovimentacao; 
        nomeFuncionario = document.getElementById("nomeFuncionario");
        descricaoMovimentacao = document.getElementById("descricaoMovimentacao");
        valorMovimentacao = document.getElementById("valorMovimentacao");
        nomeFuncionario.value="";
        descricaoMovimentacao.value="";
        valorMovimentacao.value="";
    }
    
    function validaCampo(){
        var idFuncionario,descricaoMovimentacao,valorMovimentacao; 
        idFuncionario = document.getElementById("nomeFuncionario");
        descricaoMovimentacao = document.getElementById("descricaoMovimentacao");
        valorMovimentacao = document.getElementById("valorMovimentacao");

        if(idFuncionario.value==""){
            alert("Favor preencher o campo nome do funcionário!");
            return;
           }
        if(descricaoMovimentacao.value==""){
            alert("Favor preencher o campo Descrição!");
            return;
           }
        if(valorMovimentacao.value==""){
            alert("Favor preencher o campo valor!");
            return;
        }
        descricaoMovimentacao.value = descricaoMovimentacao.value.trim();
        var url="ORM/ormMovimentacao.php?idFuncionario="+idFuncionario.value+"&descMovimentacao="+descricaoMovimentacao.value+"&valorMovimentacao="+valorMovimentacao.value;
        
        $.ajax({url: url  ,success: function(result){
            alert(result);
        }});
    }
</script>