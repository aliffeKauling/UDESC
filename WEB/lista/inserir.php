<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="css/bulma.min.css" />
<link rel="stylesheet" type="text/css" href="css/login.css">
<?php

include("header.html");

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$cor = $_POST['cor'];
$data = $_POST['data'];

$link = mysqli_connect("localhost", "root", "", "login");


$query = "INSERT INTO item (nome, descricao, cor, data) VALUES ('$nome', '$descricao', '$cor', '$data')";
echo "INSERT: $query<br><hr>";
mysqli_query($link, $query);
mysqli_close($link);
			
?>
