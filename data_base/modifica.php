<?php
  session_start();
?>
<HTML>
<HEAD>
<TITLE>Modifica Ticket</TITLE>
</HEAD>
<BODY>
<?php

include('./include/connetti.php');//includo codice necessario per la connessione

$user_id = $_SESSION["ID"];
###-------------------------------------sezione modifica-------------------------------------###

//controllo se l'utente voleva modificare il record
if(isset($_POST["mod"]))
{
	$sql = "SELECT * FROM ticket WHERE ticket_ID='".$_POST["ID"]."'";
	$result = mysqli_query($conn, $sql);
	//controllo se l'interrgogazione è avvenuta nel modo corretto 
	if (mysqli_num_rows($result) > 0)
	{
		//creo il form per modificare il record
		$row = $result->fetch_assoc();
		echo"<form action='modifica.php' method='POST'>";
		echo"<input type='hidden' name='user_id' value='".$user_id."'>";
		echo"<input type='hidden' name='ID' value='".$row["ticket_ID"]."'>";
		echo"<table border=1>";
		echo"<tr>";
		echo"<td colspan=2>Modifica</td>";
		echo"</tr>";
		echo"<tr>";
		echo"<td>Provincia</td><td><input type='text' value='".$row["provincia"]."' name='prov' id='p'></td>";
		echo"</tr>";
		echo"<tr>";
		echo"<td>Via</td><td><input type='text' value='".$row["via"]."' name='via' id='v'></td>";
		echo"</tr>";
		echo"<tr>";
		echo"<td>Metri quadri</td><td><input type='text' value='".$row["mq"]."' name='mq' id='m'></td>";
		echo"</tr>";
		echo"<tr>";
		echo"<td>Prezzo</td><td><input type='text' value='".$row["prezzo"]."' name='price' id='prez'></td>";
		echo"</tr>";
		echo"<tr>";
		echo"<td>Descrizione</td><td><textarea rows='4' cols='40' name='desc' id='descriz'>".$row["Descrizione"]."</textarea></td>";
		echo"</tr>";
		echo"</table>";
		echo"<input type='submit' value='Salva' name='modifica'>";
		echo"<input type='submit' value='Annulla' name='annull'>";
		echo"</form>";
	}
}

###-------------------------------------------------fine sezione---------------------------------###

###------------------------------------------sezione cancellazione-------------------------------###

//controllo se l'utente voleva cancellare il record
if(isset($_POST["canc"]))
{
	$sql = "DELETE FROM ticket WHERE ticket_ID='".$_POST["ID"]."'";
	if ($conn->query($sql) == TRUE)//controllo se l'azione è andata a buon fine
		echo"ticket cancellato correttamente<br>";
	else
		echo"Errore di cancellazione<br>";
	
	echo"<form action='area_lavoro.php' method='POST'>";
	echo"<input type='hidden' value='".$user_id."' name='user_id'>";
	echo"<input type='submit' value='indietro'>";
	echo"</form>";
}

###------------------------------------------fine sezione---------------------------------###

###-----------------------------------------sezione aggiunta immagine---------------------------###

if(isset($_POST["img"]))
{
	echo"<form action='index.php' method='POST' name='immag'>";
	echo"<input type='hidden' value='".$_POST["ID"]."' name='tick_id'>";
	echo"</form>";
	echo "<script>document.forms.immag.submit()</script>";
}

###------------------------------------------fine sezione---------------------------------###

###-----------------------------------------sezione salvataggio---------------------------###

//controllo se l'utente aveva scelto di salvare le modifiche
if(isset($_POST["modifica"]))
{
	//controllo se i dati sono stati inseriti nel modo corretto
	if($_POST["prov"]=="" || $_POST["via"]=="" || $_POST["mq"]=="" || $_POST["desc"]=="" || $_POST["price"]=="")
		echo"&egrave; necessario compilare tutti i campi per modificare i dati<br>";
	else
	{
		$sql = "UPDATE ticket SET provincia='".$_POST["prov"]."', via='".$_POST["via"]."', mq='".$_POST["mq"]."', prezzo='".$_POST["price"]."', Descrizione='".$_POST["desc"]."' WHERE ticket_ID='".$_POST["ID"]."'";
		echo$sql."<br>";
		if ($conn->query($sql) === TRUE) 
			echo "Record modificato";
		 else 
			echo "Errore di modifica: " . $conn->error;
	}
	echo"<form action='area_lavoro.php' method='POST'>";
	echo"<input type='hidden' value='".$user_id."' name='user_id'>";
	echo"<input type='submit' value='indietro'>";
	echo"</form>";
}

###------------------------------------------fine sezione---------------------------------###

###-----------------------------------------sezione salvataggio---------------------------###

if(isset($_POST["annull"]))
{
	header("location: area_lavoro.php");
}

###------------------------------------------fine sezione---------------------------------###

//chiudo la connessione
mysqli_close($conn);
?>
</BODY>
</HTML>