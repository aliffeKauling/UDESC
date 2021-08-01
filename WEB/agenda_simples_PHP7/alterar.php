<?php

include("menu.html");

$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

$link = mysqli_connect("localhost", "root", "", "agenda");

$query = "UPDATE agenda SET nome='$nome', telefone='$telefone', email='$email' WHERE coda='$codigo'";
echo "UPDATE: $query<br><hr>";
mysqli_query($link, $query);
mysqli_close($link);
			
?>
