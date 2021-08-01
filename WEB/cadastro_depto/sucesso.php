
<?php include('cabecalho.php'); ?>

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
              $mensagem= urldecode($_GET['mensagem']);
	      		echo $mensagem;
	     ?>

	</td>
      </tr>
      <tr> 
        <td class="item" width="800">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" width="286">
         <form method="POST" action="<?php echo $_GET['url'];?>">
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
