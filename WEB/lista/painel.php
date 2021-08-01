<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="css/bulma.min.css" />
<link rel="stylesheet" type="text/css" href="css/login.css">
<div class="box">
<div class="box">
<?php
include("header.html");
session_start();
include('verifica_login.php');


$link = mysqli_connect("localhost", "root", "", "login");
	
$query = "SELECT * FROM item ORDER BY nome";
$result = mysqli_query($link, $query);

echo "<table border=\"1\">";
echo "<tr><td><b></b></td>";
echo "<td><b></b></td>";
echo "<td><b></b></td>";
echo "<td><b></b></td>";
echo "<td><b></b></td>";

echo "<td><b>&nbsp;</b></td></tr>";
while ($row = mysqli_fetch_row($result)) {
	echo "<tr><td>".$row[0]."</td>";
	echo "<td>".$row[1]."</td>";
	echo "<td>".$row[2]."</td>";
	echo "<td>".$row[3]."</td>";
    echo "<td>".$row[4]."</td>";
	echo "<td><a href=\"deletar.php?item_id=".$row[0]."\">deletar</a>";

}
echo "</table><hr>";

mysqli_close($link);

?>
</div>
</div>;




