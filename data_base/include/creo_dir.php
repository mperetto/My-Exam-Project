<?php

function cartella($cart)
{
	//controllo se la cartella esiste
	if(!is_dir($cart))
	{
		echo"la cartella non esiste<br>";
		//creo la cartella
		if(!mkdir($cart))
			echo 'La cartella è stata creata';
	}
	else
		echo"la cartella esiste<br>";
}

?>