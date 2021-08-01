<?php

include("menu.html");

$codigo = $_GET['codigo'];

$link = mysqli_connect("localhost", "root", "", "agenda");

$query = "DELETE FROM agenda WHERE coda='$codigo'";
echo "DELETAR: $query<br><hr>";
mysqli_query($link, $query);
mysqli_close($link);

?>
