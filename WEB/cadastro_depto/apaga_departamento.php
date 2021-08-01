
<?php include('cabecalho.php'); ?>

<?php
$sigla = $_GET["sigla"];
$id = $_GET["id"];
?>

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
          <p align="center"> Quer realmente excluir o departamento<font color="#990000">
	     <?php
              echo $sigla;
	     ?></font>?

	</td>
      </tr>
      <tr> 
        <td class="item" width="800">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" width="286">
          <form method="POST" action="apaga_departamento_bd.php?id=<?php echo $id;?>">
            <input type="submit" value=" Sim " name="B1" class="botao">
          </form>

          <form method="POST" action="cadastro_departamento.php?>">
            <input type="submit" value=" N&atilde;o " name="B1" class="botao">
          </form>
          
       </tr>
             <tr> 
        <td align="center">
          &nbsp;

        </td>
      </tr>

             <tr> 
        <td align="center">
          <form method="POST" action="javascript:history.go(-1)">
           <input name="" type="submit" value="Voltar" class="botao">
          </form>

        </td>
      </tr>

	  <tr>
	   <td align="center" width="286">&nbsp;</td>
	  </tr>
    </table>
</form>
</center>
</table>
