<?php

include("menu.html");

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

$link = mysqli_connect("localhost", "root", "", "agenda");


$query = "INSERT INTO agenda (nome, telefone, email) VALUES ('$nome', '$telefone', '$email')";
echo "INSERT: $query<br><hr>";
mysqli_query($link, $query);
mysqli_close($link);
			
?>
