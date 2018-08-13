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
            <div id="tipoConsulta">
            Geral: <input type="button" value="buscar" id="consultaGeral"><br><br>    
            Descrição:   <br><input type="text" id="Descricao">
            <input type="button" value="buscar" id="consultaDescricao" ><br><br>
            Funcionário:
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
                </select> <input type="button" value="buscar" id="consultaFuncionario"><br>
            </div>    
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
            <table class="table" border="1" id="tblMovimentacao">
            </table>  
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
        var url="ORM/ormFuncionario.php?nomeFuncionario="+nomeFuncionario.value+"&idDepartamento="+idDepartamento.value;
    $.ajax({url: url  ,success: function(result){
                        alert(result);
    }});
    }
    
    $("#consultaGeral").click(function(){
        var aux="<tr><th>Nome</th><th>Descrição</th><th>Valor</th></tr>";
         
        $.ajax({url:"ORM/ormConsultaMovimentacao.php?opcao=geral",async:false,success: function(result){
          
        idDescValor=result.split("$#@");
            
        for (i = 0;i < idDescValor.length-1; i++) { 
                selIdFuncionario = idDescValor[i].split("$#");
                aux = aux + "<tr><td>"+selIdFuncionario[0]+"</td><td>"+selIdFuncionario[1]+"</td><td>"+selIdFuncionario[2]+"</td></tr>";
        }
        $("#tblMovimentacao").html(aux);
        }});  
    });
    
    $("#consultaDescricao").click(function(){
        var aux="<tr><th>Nome</th><th>Descrição</th><th>Valor</th></tr>";
        var descricao=document.getElementById("Descricao");
        $.ajax({url:"ORM/ormConsultaMovimentacao.php?opcao=descricao&descricao="+descricao.value,async:false,success: function(result){
            idDescValor=result.split("$#@");
            
            for (i = 0;i < idDescValor.length-1; i++) { 
                selIdFuncionario = idDescValor[i].split("$#");
                aux = aux + "<tr><td>"+selIdFuncionario[0]+"</td><td>"+selIdFuncionario[1]+"</td><td>"+selIdFuncionario[2]+"</td></tr>";
            }
            $("#tblMovimentacao").html(aux);
        }});      
    }); 
    
    $("#consultaFuncionario").click(function(){
        var aux="<tr><th>Nome</th><th>Descrição</th><th>Valor</th></tr>";
        var idFuncionario=document.getElementById("nomeFuncionario");
        
        $.ajax({url:"ORM/ormConsultaMovimentacao.php?opcao=funcionario&idFuncionario="+idFuncionario.value,async:false,success: function(result){
            
        idDescValor=result.split("$#@");
            
        for (i = 0;i < idDescValor.length-1; i++) { 
            selIdFuncionario = idDescValor[i].split("$#");
            aux = aux + "<tr><td>"+selIdFuncionario[0]+"</td><td>"+selIdFuncionario[1]+"</td><td>"+selIdFuncionario[2]+"</td></tr>";
        }
        $("#tblMovimentacao").html(aux);
        }});
    }); 
    
</script>