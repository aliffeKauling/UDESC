<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<script>

function envia()
	{
 	 document.formulario.submit();
 	}
</script>
</head>	
<body bgcolor="#ffffff" onLoad="javascript:envia()">
  <?php include('cabecalho.php');
  
$sigla = $_POST["sigla"];
$descricao = $_POST["descricao"];
$chefe = $_POST["chefe"];
    
$descricao = ltrim($descricao);
$sigla = ltrim($sigla);
$erro="";

if($descricao=="" or $sigla=="")
{
	$erro = "Os campos sigla e descri&ccedil;&atilde;o devem estar preenchidos";
}
if($erro == "")
{

   $conexao=conecta();
   mysql_select_db($db, $conexao); 
   $consulta="insert into departamento (id,sigla,descricao,cod_chefe) values('','$sigla','$descricao', $chefe)"; 
   $resultado = mysql_query($consulta,$conexao); 
   if($resultado)
	{
		$mensagem = "Cadastro realizado com Sucesso."; 
		$mensagem = urlencode($mensagem);
		$url = "sucesso.php?mensagem=$mensagem&url=cadastro_departamento.php";
	}
	else
	{
		$erro = "Erro ao realizar o cadastro.";
		$erro = urlencode($erro);
		$url = "erro.php?erro=".$erro;	
	}
}else
	{
		$erro = urlencode($erro);
		$url = "erro.php?erro=".$erro;	
	}


?>
<form name="formulario" method="POST" action="<?php echo $url;?>">
</form>
</body>
</html>
