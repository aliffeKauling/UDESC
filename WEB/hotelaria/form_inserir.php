<?php
	include("menu.html");
?>

<form action="inserir.php" method="post">
<b>Inserir nova reserva:<b><br><br>
CPF Hospede: <input type="numeric" name="CPF"><br>
Situação: <input type="text" name="situação"><br>
desconto: <input type="text" name="desconto"><br>
Nr de quartos: <input type="numeric" name="nr_de_quartos"><br>
Código funcionario: <input type="numeric" name="Codigo_f"><br>
Data Entrada: <input type="date" name="Data_ini"><br>
Data Fim: <input type="date" name="Data_fim"><br>
Id_Hospedagem: <input type="numeric" name="Id_Hospedagem"><br>
<input type="submit" name="adicionar" value="adicionar">
</form><hr>

