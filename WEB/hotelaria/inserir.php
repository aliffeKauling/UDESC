<?php

include("menu.html");

$CPF = $_POST['CPF'];
$situação = $_POST['situação'];
$desconto = $_POST['desconto'];
$nr_de_quartos = $_POST['nr_de_quartos'];

$Codigo_f = $_POST['Codigo_f'];
$Data_ini = $_POST['Data_ini'];
$Data_fim = $_POST['Data_fim'];
$Id_Hospedagem = $_POST['Id_Hospedagem'];



$link = mysqli_connect("localhost", "root", "", "hotelaria");


$query = "INSERT INTO reserva (CPF, desconto, nr_de_quartos, situação) VALUES ('$CPF', '$desconto', '$nr_de_quartos', '$situação')";
$query2 = "INSERT INTO reserva_dia (nome, desconto, nr_de_quartos, situação) VALUES ('$nome', '$desconto', '$nr_de_quartos', '$situação')";

echo "INSERT: $query<br><hr>";
mysqli_query($link, $query);
mysqli_close($link);
			
?>
