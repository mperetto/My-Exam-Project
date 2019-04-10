<?php
			echo"<div class='divform'>";
			echo"<img src='".$immag."' class='img_divf'>";
			echo"<p><b>Descrizione: </b>".$row["Descrizione"]."</p>";
			echo"<p><b>Indirizzo: </b>".$row["via"]."</p>";
			echo"<p><b>Metri Quadri: </b>".$row["mq"]." mc<sup>2</sup> </p>";
			echo"<p><b>Provincia: </b>".$row["provincia"]."</p>";
			echo"<p><b>Prezzo: </b>".$row["prezzo"]." &euro;</p>";
			echo"<form action='dettagli.php' method='POST'>";
			echo"<input type='hidden' value='".$row["ticket_ID"]."' name='tick_id'>";
			echo"<center><input type='submit' value='maggiori dettagli' class='btn_dett'></center>";
			echo"</form>";
			echo"</div>";
?>