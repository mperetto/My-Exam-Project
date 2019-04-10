<?php
  session_start();
?>
<HTML>
<HEAD><TITLE>Area Riservata</TITLE></HEAD>
<BODY>
<?php

include('./include/connetti.php');//includo codice necessario per la connessione al DB

$user=mysqli_real_escape_string($conn,$_POST["user"]);
$passw=mysqli_real_escape_string($conn,$_POST["passw"]);

$sql = "SELECT * FROM utenti WHERE username='".$user."' AND password=md5('".$passw."')";
$result = mysqli_query($conn, $sql);

//if(isset($_SESSION["ID"]) && $_SESSION["ID"]!='-1' && $_SESSION["ID"]!='-2')
	//header("location: area_lavoro.php"); 

//controllo se l'utente è presente nel DB
if(mysqli_num_rows($result) > 0)
{	
	$row = $result->fetch_assoc();
	
	//setto la sessione
	$_SESSION["ID"] = $row["ID"];
	header("location: area_lavoro.php"); 
}
else//se i dati sono errati controllo se almeno l'username o la password sono giuste
{
	
	echo"accesso errato<br>";
	$sql = "SELECT * FROM utenti WHERE username='".$user."'";
	$result = mysqli_query($conn, $sql);
	
	echo"<form action='login.php' method='POST' name='dati_err'>";
	if(mysqli_num_rows($result) == 0)//vedo se l'user è giusto o meno
	{
		echo"<input type='hidden' name='usern' value='err'>";
		$_SESSION["ID"] = '-1';
	}
	else
	{
		$_SESSION["ID"] = '-2';
		echo"<input type='hidden' name='usern' value='".$_POST["user"]."'>";
	}
	echo"</form>";
	echo "<script>document.forms.dati_err.submit()</script>";
}
//chiudo la connessione
mysqli_close($conn);
?>
</BODY>
</HTML>