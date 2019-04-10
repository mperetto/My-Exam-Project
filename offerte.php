<?php include('./include/head_foot.php'); ?>
<HTML>
<HEAD>
<TITLE>Le Nostre Offerte</TITLE>
<link href="./stile_css/style2.css" rel="stylesheet" type="text/css"/>
<link href="./stile_css/menu.css" rel="stylesheet" type="text/css"/>
<link href="./stile_css/main_index.css" rel="stylesheet" type="text/css"/>
<link href="./stile_css/offerte.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="./scripts/j_control_search.js"></script>
</HEAD>
<BODY>
<div id="container">

<?php
	head();
	menu();
?>

<div id="main">

	<!--<img src="./img/img.png" id="img_main" name="slide">-->

<center><p class="titleh3">Scorri il Catalogo</p></center>
<?php
	include("./data_base/include/connetti.php");//includo codice necessario per la connessione
	
	if(isset($_POST["last"]) && isset($_POST["pag_succ"]))
		$sql = "SELECT * FROM ticket WHERE ticket_ID<".$_POST["last"]." ORDER BY ticket_ID DESC LIMIT 9";
	else if(isset($_POST["first"]) && isset($_POST["pag_prec"]))
		$sql = "SELECT * FROM ticket WHERE ticket_ID>=".$_POST["first"]." ORDER BY ticket_ID DESC LIMIT 9";
	else
		$sql = "SELECT * FROM ticket ORDER BY ticket_ID DESC LIMIT 9";
	
	
	$result = mysqli_query($conn, $sql);
	
	
?>
<!--<div class="divcontainer">-->
<?php
	if(mysqli_num_rows($result) > 0)
	{
		$primo = 0;
		$cont = 0;
		while($row = $result->fetch_assoc())
		{	
			if($primo == 0)
				$primo = $row["ticket_ID"];
			
			if($cont==0)
				echo"<div class='divcontainer'>";
			else if($cont%3==0)
				echo"<div class='divcontainer'>";
			
			include("./include/rec_img.php");//recupero l'immagine da visualizzare
			
			include("./include/vis_divform.php");//visualizzo i dettagli del record
			
			$ultimo = $row["ticket_ID"];
			$cont++;
			
			if($cont%3==0)
				echo"</div>";
		}
	}
	else
		$ultimo = 0;
?>
<div class="navig">
	<form method="POST" action="offerte.php">
		<center>
		<?php
			echo"<input type='hidden' value='".$ultimo."' name='last'>";
			
			if(isset($_POST["pag_succ"]))
				echo"<input type='submit' class='cambio_pag' value='Pagina precedente' name='pag_prec'>";
			else if(!isset($_POST["first"]))
				echo"<input type='submit' disabled='true' style='background-color: #cccc; border-color: #999999' class='cambio_pag' value='Pagina precedente' name='pag_prec'>";
			else
			{
				$sql = "SELECT * FROM ticket ORDER BY ticket_ID DESC LIMIT 1";
				$result = mysqli_query($conn, $sql);
				
				$row = $result->fetch_assoc();
				if($primo==$row["ticket_ID"])
					echo"<input type='submit' disabled='true' style='background-color: #cccc; border-color: #999999' class='cambio_pag' value='Pagina precedente' name='pag_prec'>";
				else
					echo"<input type='submit' class='cambio_pag' value='Pagina precedente' name='pag_prec'>";
			}
			
			if($cont<9)//controllo se sono terminati i ticket da mostrare in caso positivo disabilito il tasto pagina successiva
				echo"<input type='submit' disabled='true' style='background-color: #cccc; border-color: #999999' class='cambio_pag' value='Pagina successiva' name='pag_succ'>";
			else
				echo"<input type='submit' class='cambio_pag' value='Pagina successiva' name='pag_succ'>";
		?>
			<!--<input type="submit" disabled="true" style="background-color: #cccc; border-color: #999999" class="cambio_pag" value="Pagina precedente" name="pag_prec">-->
			<!--<input type="submit" class="cambio_pag" value="Pagina successiva" name="pag_succ">-->
			<?php
			echo"<input type='hidden' value='".$ultimo."' name='last'>";
			echo"<input type='hidden' value='".$primo."' name='first'>";
			?>
		</center>
	</form>
</div>
</div>
<!--<div id="sidebar"></div>-->

<?php
	mysqli_close($conn);//chiudo la connessione
	footer();
?>

</div>
</BODY>
</HTML>