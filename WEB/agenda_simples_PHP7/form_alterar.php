<?php

include("menu.html");

$codigo = $_GET['codigo'];
$nome = "";
$telefone = "";
$email = "";

$link = mysqli_connect("localhost", "root", "", "agenda");

$query = "SELECT * FROM agenda WHERE coda='$codigo'";
$result = mysqli_query($link, $query);
if ($row = mysqli_fetch_row($result)) {
	$nome = $row[1];
	$telefone = $row[2];
	$email = $row[3];
}

mysqli_close($link);

echo "
	<form action='alterar.php' method='post'>
	<b>Alterar elemento codigo $codigo:<b><br><br>
	<input type='hidden' name='codigo' value='$codigo'>
	Nome: <input type='text' name='nome' value='$nome'><br>
	Telefone: <input type='text' name='telefone' value='$telefone'><br>
	Email: <input type='text' name='email' value='$email'><br>
	<input type='submit' name='adicionar' value='adicionar'>
	</form><hr>
";

?>
