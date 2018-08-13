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
                <a href="../sobre.html">Sobre</a>    
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
                <br><input type="text" id="nomeFuncionario" maxlength="200"><br><br>
                Departamento:
                <br><select id="nomeDepartamento">
                <script>
                    var aux="";
                    $.ajax({url:"ORM/ormConsultaDepartamento.php",success: function(result){
                        idNomeDepartamento=result.split("$#@");

                        for (i = 0;i < idNomeDepartamento.length-1; i++) { 
                                selIdDepartamento = idNomeDepartamento[i].split("$#");
                                aux = aux + "<option value="+selIdDepartamento[0]+">"+selIdDepartamento[1]+"</option><br>";
                        }
                        $("#nomeDepartamento").html(aux);
                    }});
                </script>    
                    </select>
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

    function limpaCampo(){
        var nomeFuncionario,nomeDepartamento; 
        nomeFuncionario = document.getElementById("nomeFuncionario");
        nomeDepartamento = document.getElementById("nomeDepartamento");
        nomeFuncionario.value="";
        nomeDepartamento.value="";
    }
    
    function validaCampo(){
        var nomeFuncionario,idDepartamento; 
        nomeFuncionario = document.getElementById("nomeFuncionario");
        idDepartamento = document.getElementById("nomeDepartamento");
        
        if(nomeFuncionario.value==""){
            alert("Favor preencher o campo nome do funcionário!");
            return;
           }
        
        if(idDepartamento.value==""){
            alert("Favor preencher o campo nome do Departamento!");
            return;
           }
        
        var url="ORM/ormFuncionario.php?nomeFuncionario="+nomeFuncionario.value+"&idDepartamento="+idDepartamento.value;
        $.ajax({url: url  ,success: function(result){
                            alert(result);
        }});
    }
</script>