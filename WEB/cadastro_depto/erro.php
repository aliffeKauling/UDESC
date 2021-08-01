
<?php include('cabecalho.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<center>
<table class="titulo">
<tr>
  <td> </td>
</tr>
         

<tr>
  <td> 
    <p align="center">
    &nbsp;
    <p>&nbsp;&nbsp;</td>
</tr>
         

    <table width="294" border="0" cellpadding="0" cellspacing="0" align="center" class="formulario" >
      <tr> 
        <td width="294" align="center">&nbsp;&nbsp;</td>
      </tr>
      <tr> 
        <td class="titulo" width="294">
          <p align="center">
	     <?php
              $erro= urldecode($_GET['erro']);
	      echo $erro;
	     ?>

	</td>
      </tr>
      <tr> 
        <td class="item" width="800">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" width="286">
         <form method="POST" action="javascript:history.go(-2)">
           <input name="" type="submit" value="Voltar" class="botao"></td>
         </form>
      </tr>
	  <tr>
	   <td align="center" width="286">&nbsp;</td>
	  </tr>
    </table>
</form>
</center>
</table>
