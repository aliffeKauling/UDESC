<?php

//-----------------------------------------------------------

function selectparticipante($sel)
	{
   		$conexao=conecta();
		mysql_select_db($db, $conexao); 
   		$consulta="SELECT id, nome from participante order by nome"; 
   		$resultado = mysql_query($consulta,$conexao); 			
		echo chr(13);
   		while ($linha = mysql_fetch_row($resultado))
   		{
			$option = "<option ";
			if ($sel==$linha[0])
			$option = $option."selected";
			echo chr(9).chr(9).chr(9).$option." value = ".chr(34).$linha[0].chr(34).">".$linha[1]."</option>".chr(13);
		}
	echo chr(13);
	return;
	}

//-----------------------------------------------------------


?>
