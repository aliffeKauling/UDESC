<?php
 $db = "hotelaria";
 function conecta()
 {
   $conexao = mysqli_connect("localhost","root","", "hotelaria");
   return $conexao;
 }

?>
