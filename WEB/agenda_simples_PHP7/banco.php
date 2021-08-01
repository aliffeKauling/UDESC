<?php
 $db = "agenda";
 function conecta()
 {
   $conexao = mysqli_connect("localhost","root","", "agenda");
   return $conexao;
 }

?>
