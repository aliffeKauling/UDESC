<?php include('cabecalho.php');
require('display.inc') ?>


<?php
   $conexao=conecta();
   $id = $_GET["id"]; 
   mysql_select_db($db, $conexao); 
   $consulta="SELECT * from departamento where id='$id'"; 
   $resultado = mysql_query($consulta,$conexao); 
   while ($linha = mysql_fetch_row($resultado))
   {
   		$sigla = $linha[1];
   		$descricao = $linha[2];
   		$chefe = $linha[3];
   	}
   ?>

<center>   
<table width="438">
<tr>
  <td class="titulo" width="428"> <p align="center">&nbsp;<br>
    Cadastro de Departamentos</p> </td>
</tr>     
<tr>
  <td class="titulo" width="428"> 
    <p align="center">
    &nbsp;&nbsp;&nbsp;
 
<form method="POST" action="edita_departamento_bd.php" name="form">     
     
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="formulario" >
      <tr> 
        <td width="100%" align="center" class="titulo_tabela" colspan="2">Edi&ccedil;&atilde;o de Departamento</td>
      </tr>
      <tr> 
        <td width="166" class="item">Sigla:</td>
        <td width="619" class="campo"><input name="sigla" type="text" size="28" value="<?php echo $sigla;?>"></td>
      </tr>
      <tr>
        <td width="166" class="item">Descri&ccedil;&atilde;o:</td>
        <td width="396" class="campo"><input name="descricao" type="text" size="28" value="<?php echo $descricao;?>"></td>
      </tr>
		<tr>
        <td width="166" class="item">Chefe:</td>
        <td width="396" class="campo"> 
        <select size="1" name="chefe">
          <option value="0">-- Nenhum chefe --</option>
			 <?php selectparticipante($chefe);?>
        </select>
        </td>
       </tr>
      <tr> 
        <td width="562" align="center" colspan="2">&nbsp;</td>
      </tr>
      <tr> 
        <td width="562" align="center" colspan="2">
            <input name="" class="botao" type="submit" value="Editar"></td>
      </tr>
      <tr> 
        <td width="562" align="center" colspan="2">&nbsp; </td>
      </tr>
      <input type="hidden" name="id" value="<?php echo $id;?>">
      </form>
      <tr> 
        <td width="562" align="center" colspan="2">
          <form method="POST" action="javascript:history.go(-1)">
           <input name="" type="submit" value="Voltar" class="botao">
          </form>

        </td>
      </tr>
      <tr> 
        <td width="562" align="center" colspan="2">&nbsp;</td>
      </tr>
    </table>
     </td>
</tr>
   </table>
</center>
