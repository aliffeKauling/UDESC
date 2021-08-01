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

   $id = $_GET["id"];
   
   $conexao=conecta();
   mysql_select_db($db, $conexao);
	
   $consulta="delete from departamento where id = '$id' "; 
   $resultado = mysql_query($consulta,$conexao); 
   if($resultado)
   {
	$mensagem = "Exclus&atilde;o realizada com Sucesso."; 
	$mensagem = urlencode($mensagem);
	$url = "sucesso.php?mensagem=$mensagem&url=cadastro_departamento.php";
   }
   else
   {
	$erro = "Erro ao realizar a exclus&atilde;o.";
	$erro = urlencode($erro);
	$url = "erro.php?erro=".$erro;	
   }
?>
<form name="formulario" method="POST" action="<?php echo $url;?>">
</form>
</body>
</html>
