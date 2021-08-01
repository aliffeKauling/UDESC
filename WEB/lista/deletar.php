<?php

include("menu.html");

$item_id = $_GET['item_id'];

$link = mysqli_connect("localhost", "root", "", "login");

$query = "DELETE FROM item WHERE item_id='$item_id'";
echo "DELETAR: $query<br><hr>";
mysqli_query($link, $query);
mysqli_close($link);

?>
