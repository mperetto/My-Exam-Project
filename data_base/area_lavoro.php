<?php
  session_start();
?>
<HTML>
<HEAD>
<TITLE>Area Lavoro</TITLE>
<script>
function controllo()//controllo i dati inseriti
{
	var prov = document.getElementById('p').value;
	var via = document.getElementById('v').value;
	var mq = document.getElementById('m').value;
	var desc = document.getElementById('descriz').value;
	var prezzo = document.getElementById('prez').value;
	if(prov == '' || via == '' || mq == '' || desc == '' || prezzo == '')
		alert("dati inseriti errati");
	else
	{
		document.forms.send.action = "aggiungi.php";
		document.forms.send.submit();
	}
}
</script>
<style type="text/css">
.sbm_mod{
	background-image: url('./img/modifica.png');
	height: 50px;
	width: 50px;
	cursor: pointer;
}
.sbm_canc{
	background-image: url('./img/cancella.png');
	height: 50px;
	width: 50px;
	cursor: pointer;
}
.sbm_img{
	background-image: url('./img/immag.gif');
	height: 50px;
	width: 120px;
	cursor: pointer;
}
</style>
</HEAD>
<BODY>
<?php

include('./include/connetti.php');//includo codice necessario per la connessione

if(isset($_SESSION["ID"]))
{
	###----------sezione aggiunta lavori----------###
	
	if(isset($_POST["logout"]))
	{
		session_destroy();
		header("location: login.php");
	}
	
	echo"<form action='#' method='POST'>";
	echo"<div style='background-color: #004d80; width: 100%; height: 30px;'>";
	echo"<input type='submit' style='float:right; margin-right:50px; background-color: #00394d; border: none; color: white; font-size:18px' name='logout' value='logout'>";
	echo"</div>";
	echo"</form>";
	//creo il form per inserire i dati
	echo"<form action='aggiungi.php' method='POST' name='send'>";
	echo"<input type='hidden' value='".$_SESSION["ID"]."' name='user_id'>";
	echo"<table border=1>";
	echo"<tr>";
	echo"<td colspan=2>Aggiungi un nuovo lavoro</td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td>Provincia</td><td><input type='text' value='' name='prov' id='p'></td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td>Via</td><td><input type='text' value='' name='via' id='v'></td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td>Metri quadri</td><td><input type='text' value='' name='mq' id='m'></td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td>Prezzo</td><td><input type='text' value='' name='price' id='prez'></td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td>Descrizione</td><td><textarea rows='4' cols='40' name='desc' id='descriz'></textarea></td>";
	echo"</tr>";
	echo"</table>";
	echo"<input type='button' value='invia' name='invia' onClick='controllo()'>";
	echo"</form>";

	###----------fine sezione---------------------###
		
	###----------sezione lavori attivi----------###

	//cerco tutti i lavori attivi per l'utente loggato
	$sql = "SELECT * FROM ticket WHERE ID='".$_SESSION["ID"]."'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0)//controllo se ci sono lavori attivi
	{
		//scrivo i dati di tutti i lavori
		echo"<table border=1>";
		echo"<tr><td colspan=9><center>Ticket attivi</center></td></tr>";
		echo"<tr><td>Ticket_ID</td><td>Provincia</td><td>Metri Quadrati</td><td>Via</td><td>Prezzo</td><td>Descrizione</td><td>Modifica</td><td>Elimina</td><td>Aggiungi Immagine</td></tr>";
		while($row = $result->fetch_assoc())
		{
			echo"<tr>";
			echo"<form action='modifica.php' method='POST'>";
			echo"<input type='hidden' value='".$_SESSION["ID"]."' name='user_id'>";
			echo"<td><input type='hidden' name='ID' value='".$row["ticket_ID"]."'>".$row["ticket_ID"]."</td>";
			echo"<td>".$row["provincia"]."</td>";
			echo"<td>".$row["mq"]."</td>";
			echo"<td>".$row["via"]."</td>";
			echo"<td>".$row["prezzo"]."</td>";
			echo"<td><textarea cols='35' rows='3'>".$row["Descrizione"]."</textarea></td>";
			echo"<td><center><div class='sbm_mod'><input type='submit' value='' class='sbm_mod' name='mod'></div></center></td>";
			echo"<td><center><div class='sbm_canc'><input type='submit' value='' class='sbm_canc' name='canc'></div></center></td>";
			echo"<td><center><div class='sbm_img'><input type='submit' value='' class='sbm_img' name='img'></div></center></td>";
			echo"</form>";
			echo"</tr>";
		}
		echo"</table>";
	}
	else
	{
		echo"non sono presenti ticket attivi.<br>";
	}

	###----------fine sezione-------------------###
}
else
{
	header("location: login.php"); 
}
mysqli_close($conn);//chiudo la connessione
?>
</BODY>
</HTML>