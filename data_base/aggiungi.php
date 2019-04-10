<?php
  session_start();
?>
<HTML>
<HEAD><TITLE>Aggiungi Ticket</TITLE></HEAD>
<BODY>
<?php
	
include('./include/connetti.php');//includo codice necessario per la connessione
	
$prov = $_POST["prov"];
$via = $_POST["via"];
$mq = $_POST["mq"];
$id_user = $_SESSION["ID"];
$desc = $_POST["desc"];
$price = $_POST["price"];

echo$prov."<br>".$via."<br>".$mq."<br>".$id_user."<br>".$desc."<br>".$price."<br>";
	
$sql = "SELECT * FROM ticket WHERE ID='".$id_user."' AND provincia='".$prov."' AND via='".$via."' AND mq='".$mq."' AND prezzo='".$price."' AND Descrizione='".mysqli_real_escape_string($conn,$_POST["desc"])."'";
$result = mysqli_query($conn, $sql);

//controllo se i dati sono già presenti nel DB
if(mysqli_num_rows($result) > 0)
	echo"ticket gi&agrave; presente<br>";
else
{
	$sql = "INSERT INTO ticket (ID,provincia,via,mq,Descrizione,prezzo) VALUES ('".$id_user."', '".$prov."', '".$via."', '".$mq."', '".mysqli_real_escape_string($conn,$_POST["desc"])."', '".$price."')";
	echo$sql."<br>";
	if (!mysqli_query($conn, $sql)) 
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	else
	{
		echo"ticket aggiunto correttamente<br>";
		$id = mysqli_insert_id($conn);
		echo$id;
		echo"<form action='index.php' method='POST' name='immag'>";
		echo"<input type='hidden' value='".$id."' name='tick_id'>";
		echo"</form>";
		echo "<script>document.forms.immag.submit()</script>";
	}
}
	echo"<form action='area_lavoro.php' method='POST'>";
	//echo"<input type='hidden' value='".$id_user."' name='user_id'>";
	echo"<input type='submit' value='indietro'>";
	echo"</form>";
mysqli_close($conn);
?>
</BODY>
</HTML>