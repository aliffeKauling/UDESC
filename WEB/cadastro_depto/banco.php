<?php
 $db = "cadastro";
 function conecta()
 {
   $conexao = mysql_connect("localhost","root","");
   return $conexao;
 }

?>
