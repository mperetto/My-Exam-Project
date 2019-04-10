<?php
	session_start();
?>
<HTML>
<HEAD>
<TITLE>Login</TITLE>
<link rel="stylesheet" type="text/css" href="./style/login.css"/>
<script>
function controllo()//controllo i dati inseriti
{
	var nome_utente = document.getElementById('n_utente').value;
	var passw = document.getElementById('passwd').value;
	if(nome_utente == '' || passw == '')
		alert("dati inseriti errati");
	else
	{
		document.forms.login.action = "area_ris.php";
		document.forms.login.submit();
	}
}
</script>
</HEAD>
<BODY>
<form name="login" method="POST">
<div id="contenuto">
<table border=0 >

	<tr>
		<td colspan=2><center>Accedi</center></td>
	</tr>
	<?php
		//controllo se l'utente era stato inserito correttamente
		if(isset($_SESSION["ID"]) && $_SESSION["ID"]=='-1')
		{
			echo"<tr>";
			echo"<td colspan=2 id='err'>Nome Utente o password Errati!</td>";
			echo"</tr>";
		}
	?>
	<tr>
		<td>User Name</td><td><?php
		//controllo se l'utente era stato inserito correttamente
		if(!isset($_SESSION["ID"]) || $_SESSION["ID"]!='-2')
			echo"<input type='text' name='user' id='n_utente'>";
		else if(isset($_SESSION["ID"]) && $_SESSION["ID"]=='-2')
			echo"<input type='text' name='user' id='n_utente' value='".$_POST["usern"]."'>";
		?>
		</td>
	</tr>
	<?php
	//controllo se la password era stata inserita correttamente
		if(isset($_SESSION["ID"]) && $_SESSION["ID"]=='-2')
		{
			echo"<tr>";
			echo"<td colspan=2 id='err'>Password Errata!</td>";
			echo"</tr>";
		}
		unset($_SESSION["ID"]);
	?>
	<tr>
		<td>Password</td><td><input type="password" name="passw" id="passwd"></td>
	</tr>
	<tr>
		<td colspan=2><center><input type="button" name="invia" value="Accedi" onClick="controllo()"></center></td>
	</tr>
</table>
</div>
</form>
</BODY>
</HTML>