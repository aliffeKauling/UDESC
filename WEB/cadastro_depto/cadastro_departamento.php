<?php include('cabecalho.php');
require("display.inc");
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    <table border="0" width="100%" class="formulario" cellspacing="0" cellpadding="0">
      <tr class="titulo_tabela">
        <td width="25%" align="center">Sigla</td>
        <td width="53%" align="center">Descrição</td>
        <td width="22%" align="center">Excluir</td>
      </tr>
      <?php
   $conexao=conecta();
   mysql_select_db($db, $conexao); 
   $consulta="SELECT * from departamento order by sigla"; 
   $resultado = mysql_query($consulta,$conexao); 
   while ($linha = mysql_fetch_row($resultado))
   { ?>
      <tr class="item">
        <td width="25%" align="center"><a href="edita_departamento.php?id=<?php echo $linha[0];?>"><?php echo $linha[1];?></a></td>
        <td width="53%" align="center"><a href="edita_departamento.php?id=<?php echo $linha[0];?>"><?php echo $linha[2];?></a></td>
        <td width="22%" align="center"><a href="apaga_departamento.php?id=<?php echo $linha[0];?>&sigla=<?php echo urlencode($linha[1]);?>"><b><font color="#990000">X</font></b></a></td>
      </tr>
<?php }?>      
    </table>
  </td>
</tr>

<form method="POST" action="grava_departamento_bd.php" name="formgrupo">     
<td width="428">     
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="formulario" >
      <tr> 
        <td width="100%" align="center" class="titulo_tabela" colspan="2">Adicionar
          novo Departamento</td>
      </tr>
      <tr> 
        <td width="166" class="item">Sigla:</td>
        <td width="619" class="campo"><input name="sigla" type="text" size="28"></td>
      </tr>
      <tr>
        <td width="166" class="item">Descrição:</td>
        <td width="396" class="campo"><input name="descricao" type="text" size="28"></td>
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
                <input name="" type="reset" value="Limpar" class="botao">
                <input name="" class="botao" type="submit" value="Cadastrar"></td>
      </tr>
      <tr> 
        <td width="562" align="center" colspan="2">&nbsp; </td>
      </tr>
      </form>
    </table>
</center>
</table>

