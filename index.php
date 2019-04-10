<?php include('./include/head_foot.php'); ?>
<HTML>
<HEAD>
<TITLE>Pagina Iniziale</TITLE>
<link href="./stile_css/style2.css" rel="stylesheet" type="text/css"/>
<link href="./stile_css/menu.css" rel="stylesheet" type="text/css"/>
<link href="./stile_css/main_index.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="./scripts/j_control_search.js"></script>
<script>

	var i = 0;
	var timer = 2000;
	var images = [];
	
	//immages list
	images[0] = "./img/index_slide.jpg";
	images[1] = "./img/index_slide1.jpg";
	images[2] = "./img/index_slide2.jpg";
	
	function cambia()
	{
		document.slide.src = images[i];
		
		if(i < images.length - 1)
		{
			i++;
		}
		else
			i = 0;
			
		setTimeout("cambia()", timer);
	}
	window.onload = cambia;
	
</script>
</HEAD>
<BODY>
<div id="container">

<?php
	head();
	menu();
?>
<div id="main">

	<img src="./img/img.png" id="img_main" name="slide">

<center><p class="titleh3">Le nostre Ultime Aggiunte</p></center>
<?php
	include("./data_base/include/connetti.php");//includo codice necessario per la connessione
	
	$sql = "SELECT * FROM ticket ORDER BY ticket_ID DESC LIMIT 3";
	$result = mysqli_query($conn, $sql);
	
	
?>
<div class="divcontainer">
<?php
if(mysqli_num_rows($result) > 0)
{
	$immag = "";
	while($row = $result->fetch_assoc())
	{	
		include("./include/rec_img.php");//recupero l'immagine da visualizzare
			
		include("./include/vis_divform.php");//visualizzo i dettagli del record
	}
}
?>
	<!--<div class="divform">
		<img src="./img/img.png" class="img_divf">
		<p> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
		<p><b>Indirizzo: </b>consectetur adipisci elit</p>
		<p><b>Metri Quadri: </b>89</p>
		<p><b>Provincia: </b>BI</p>
		<p><b>Prezzo: </b>160000</p>
		<form action="#">
			<center><input type="submit" value="maggiori dettagli" class="btn_dett"></center>
		</form>
	</div>-->
</div>
<?php
	$sql = "SELECT * FROM ticket ORDER BY prezzo LIMIT 3";
	$result = mysqli_query($conn, $sql);
?>
<div class="divcontainer">
<center><p class="titleh3">Le nostre Migliori Offerte</p></center>
<?php
if(mysqli_num_rows($result) > 0)
{
	$immag = "";
	while($row = $result->fetch_assoc())
	{	
		include("./include/rec_img.php");//recupero l'immagine da visualizzare
			
		include("./include/vis_divform.php");//visualizzo i dettagli del record
	}
}
?>
</div>
</div>
<?php
	mysqli_close($conn);//chiudo la connessione
	footer();
?>

</div>
</BODY>
</HTML>