<?php

include("menu.html");

$link = mysqli_connect("localhost", "root", "", "hotelaria");
	
$query = "SELECT * FROM reserva ORDER BY CPF_Hospede";
$result = mysqli_query($link, $query);

echo "SELECT: $query<br>";
echo "<table border=\"1\">";
echo "<tr><td><b></b></td>";
echo "<td><b></b></td>";
echo "<td><b></b></td>";
echo "<td><b></b></td>";
echo "<td><b>&nbsp;</b></td>";
echo "<td><b>&nbsp;</b></td></tr>";
while ($row = mysqli_fetch_row($result)) {
	echo "<tr><td>".$row[0]."</td>";
	echo "<td>".$row[1]."</td>";
	echo "<td>".$row[2]."</td>";
	echo "<td>".$row[3]."</td>";
	echo "<td><a href=\"deletar.php?codigo=".$row[0]."\">deletar</a>";
	echo "<td><a href=\"form_alterar.php?codigo=".$row[0]."\">alterar</a></tr>";
}
echo "</table><hr>";

mysqli_close($link);

?>
