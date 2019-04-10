<?php
			$cartella = ".\\data_base\\immagini\\ID_".$row["ticket_ID"];
			
			if(!is_dir($cartella))
				$immag = './img/img.png';
			else
			{
				$risorsa = opendir($cartella);
				$esci = false;
				while(($file = readdir($risorsa)) && $esci!=true)
				{
					if($file != "." && $file != "..")
					{
						$immag = $cartella."\\".$file;
						$esci=true;
					}
				}
			}
?>